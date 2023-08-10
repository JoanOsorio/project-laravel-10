try {
    $.ajax({
        url: '/obtener-paises', // Ruta definida en tu archivo de rutas
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var selectPais = $('#pais');
            var paisData = $('#paisData').data('pais'); // Obtener el valor de data-pais

            selectPais.empty(); // Limpiamos el select antes de agregar las opciones

            $.each(data, function(key, value) {
                var option = $('<option>', {
                    value: value.id,
                    text: value.nombre
                });

                if (value.id == paisData) {
                    option.attr('selected', 'selected'); // Seleccionar la opción correspondiente
                }

                selectPais.append(option);
            });
        }
    });
} catch (error) {
    // Manejo de errores
}


function cargarDepartamentos() {
    var paisId = document.getElementById("pais").value;
    var url = '/obtener-departamentos/' + paisId + '/';
    $.ajax({
        url: url, 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var departamentoSelect = $('#departamento');
            var ciudadSelect = $('#ciudad');
            
            departamentoSelect.html('<option value="">Seleccione un departamento</option>');
            ciudadSelect.html('<option value="">Seleccione una ciudad</option>');

            var departamentoData = $('#departamentoData').data('departamento');
            var ciudadData = $('#ciudadData').data('ciudad');

            $.each(data, function(key, value) {
                var option = $('<option>', {
                    value: value.id,
                    text: value.nombre
                });

                if (value.id == departamentoData) {
                    option.attr('selected', 'selected');
                }

                departamentoSelect.append(option);
            });

            if (ciudadData) {
                cargarCiudades(ciudadData);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }
    });
}

function cargarCiudades(ciudadId = null) {
    var departamentoSelect = document.getElementById("departamento");
    var departamentoId = departamentoSelect.value;

    if (departamentoId) {
        var url = '/obtener-municipios/' + departamentoId + '/';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var ciudadSelect = $('#ciudad');
                
                ciudadSelect.html('<option value="">Seleccione una ciudad</option>');
    
                $.each(data, function(key, value) {
                    var option = $('<option>', {
                        value: value.id,
                        text: value.nombre
                    });
    
                    if (value.id == ciudadId) {
                        option.attr('selected', 'selected');
                    }
    
                    ciudadSelect.append(option);
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error:", errorThrown);
            }
        });
    } else {
        // Si no se seleccionó ningún departamento, limpiar el select de ciudades
        var ciudadSelect = $('#ciudad');
        ciudadSelect.html('<option value="">Seleccione una ciudad</option>');
    }
}



function cuadroAlerta(estado, mensaje){
    var alertDiv = document.createElement("div");
    alertDiv.className = 'alert alert-' + estado + ' alert-dismissible fade show';
    alertDiv.role = "alert";
    alertDiv.innerHTML = mensaje+`
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    document.body.appendChild(alertDiv);
}

function validarFormulario(){
    var estado = 'danger';
    var mensaje = 'Por favor, complete todos los campos requeridos.'
    var correo = document.getElementById("correo").value;
    var nombre = document.getElementById("nombre").value;
    var cedula = document.getElementById("cedula").value;
    var fechaNacimiento = document.getElementById("fechaNacimiento").value;
    var ciudad = document.getElementById("ciudad").value;
    
    if (correo.trim() === "" || nombre.trim() === "" || cedula.trim() === "" || fechaNacimiento.trim() === "" || ciudad.trim() === "") {
        cuadroAlerta(estado, mensaje);
        return false;
    }
     
    return true;
}

function validarPassword() {
    var estado = 'danger';
    var mensaje = 'Las contraseñas no coinciden, revisar!'
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    
    if (password !== confirmPassword) {  
        cuadroAlerta(estado, mensaje);
        return false;
    }
     
    return true;  
}



