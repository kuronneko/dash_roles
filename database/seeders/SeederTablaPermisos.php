<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //lista de permisos
        $permisos = [
            'ver-role',
            'crear-role',
            'editar-role',
            'borrar-role',
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            'ver-tag',
            'crear-tag',
            'editar-tag',
            'borrar-tag',
        ];

        foreach($permisos as $permiso){
            //creación de permisos
            Permission::create(['name' => $permiso]);
        }
    }
}
