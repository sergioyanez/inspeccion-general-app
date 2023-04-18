<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->usuario = 'tudai';
        $usuario->tipo_permiso_id = 1;
        $usuario->email = 'tudai@gmail.com';
        $usuario->email_verified_at = now();
        $usuario->password = '$2y$10$DARcFZo7WO41ir3SIHwCeuh3Tp6PIo7YZuCWdPmPo/yk6BDdaAbBa';
        $usuario->remember_token = Str::random(10);
        $usuario->save();
    }
}
