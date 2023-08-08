<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        DB::table('roles')->insert([
            ['name' => 'administrador', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'usuario', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
