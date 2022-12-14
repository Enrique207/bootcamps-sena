<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use File;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1. Leer el archivo e datos
        $json=File::get('database/_data/users.json');
        //2.convertir los datos en un arreglo
        $arreglo_usuario= json_decode($json);
        //3. recorrer el arreglo
        //var_dump($arreglo_usuario);
        foreach($arreglo_usuario as $usuario){
            //4. registrar el usuario en bd
            // se utiliza el metodo ::create
            User::create([
                "name" => $usuario->name,
                "email"=> $usuario->email,
                "password" => Hash::make(
                                    $usuario->password
                                    )

            ]);
        }
        // un  <<entity>>
    }
}
