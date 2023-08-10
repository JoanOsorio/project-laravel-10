<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cell_number', 10)->nullable();
            $table->string('cedula', 11)->nullable();
            $table->date('birthdate')->nullable();
            $table->unsignedBigInteger('city_code')->nullable();
            $table->foreign('city_id')->references('id')->on('municipios');
            $table->dropUnique('users_email_unique');
            $table->unique('email', 'users_email_unique')->whereNotNull('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('cell_number');
            $table->dropColumn('cedula');
            $table->dropColumn('birthdate');
            $table->dropColumn('city_code');
            $table->dropUnique('users_email_unique');
            $table->unique('email');
        });
    }
};
