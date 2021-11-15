<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'login' => 'admin',
            'crm' => '000000/SP',
            'password' => Hash::make('admin'),
        ]);

        $this->call(LaratrustSeeder::class);

        User::find(1)->attachRole('admin'); // usuário administrador do sistema

        \App\Models\Role::find(1)->update([
            'display_name' => 'Administrador'
        ]);
        \App\Models\Role::find(2)->update([
            'display_name' => 'Médico'
        ]);
    }
}
