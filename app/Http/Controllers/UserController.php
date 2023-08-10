<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\UserActionEvent;
use App\Models\UserActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserController extends Controller
{
    public function showUserForm()
    {
        return view('users.createUser');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'email', 'unique:users,email'],
            'nombre' => ['required', 'string', 'max:100'],
            'cedula' => ['required', 'string', 'max:11'],
            'fechaNacimiento' => ['required', 'date'],
            'ciudad' => ['required','numeric'],
        ]);
     
        $userData = [
            'name' => $request->input('nombre'),
            'email' => $request->input('correo'),
            'password' => Hash::make($request->input('password')),
            'role' => 2,
            'cell_number' => $request->input('telefono'),
            'cedula' => $request->input('cedula'),
            'birthdate' => $request->input('fechaNacimiento'),
            'city_code' => $request->input('ciudad'),
            'created_at' => Carbon::now(), // Establece la fecha y hora de creación
            'updated_at' => Carbon::now(), // Establece la fecha y hora de actualización
        ];
        
        // Use a transaction to ensure data consistency
        DB::beginTransaction();
        
        try {
            $user = DB::table('users')->insertGetId($userData);
        
            if ($user) {
                // Usuario creado exitosamente, puedes agregar un log
                $usera = Auth::user(); // Asegúrate de que el usuario autenticado esté disponible
                event(new UserActionEvent($usera, 'Creó'));
        
                // Commit the transaction
                DB::commit();
        
                return redirect()->back()->with('success', 'Usuario creado exitosamente.');
            } else {
                // Error al crear el usuario, maneja el error según tus necesidades
                // Rollback the transaction
                DB::rollBack();
        
                return redirect()->back()->with('error', 'Hubo un problema al crear el usuario.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occurred during the transaction
            // Rollback the transaction
            DB::rollBack();
        
            return redirect()->back()->with('error', 'Hubo un problema al crear el usuario.');
        }
        
    }

    public function showAllUsers()
    {
        $users = User::select('users.*', 'municipios.municipio as nombre_municipio')
            ->leftJoin('municipios', 'users.city_code', '=', 'municipios.id')
            ->get();

        $user = Auth::user();    
        event(new UserActionEvent($user, 'Visualizó'));

        return view('users.adminUser', compact('users'));
    }

    public function deleteUser($userId)
    {
        DB::table('users')->where('id', $userId)->delete();

        $user = Auth::user(); // Obtén el usuario autenticado
        event(new UserActionEvent($user, 'Eliminó'));   

        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');        
    }

    public function editUser($userId)
    {
        $usuario = User::findOrFail($userId); 

        $countryAndDept = DB::table('users')
            ->join('municipios', 'users.city_code', '=', 'municipios.id')
            ->join('departamentos', 'municipios.departamento', '=', 'departamentos.id')
            ->where('users.id', $userId)
            ->select('departamentos.pais', 'departamentos.id as depto_id')
            ->first();

        return view('users.updateUser', ['datosUsuario' => $usuario, 'countryAndDept' => $countryAndDept]);


    }


    public function updateUser(Request $request)
    {
        $usuario = User::where('email', $request->correo)->first();

        // Validate the form data
        $validatedData =       $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'fechaNacimiento' => ['required', 'date'],
            'ciudad' => ['required','numeric'],
        ]);

        // Update the user information using DB::update
        DB::table('users')
            ->where('id', $usuario->id)
            ->update([
                'name' => $validatedData['nombre'],
                'cell_number' => $request->telefono,
                'birthdate' => $validatedData['fechaNacimiento'],
                'city_code' => $validatedData['ciudad'],
                // Update other fields as needed
            ]);

            $user = Auth::user(); // Obtén el usuario autenticado
            event(new UserActionEvent($user, 'Actualizó'));   

        return redirect()->back()->with('success', 'User information updated successfully');
    }

    public function showLogsUsers()
    {
        $userLogs = UserActionLog::orderBy('created_at', 'desc')->get();

        return view('users.logsUsers', compact('userLogs'));
    }

    
}



