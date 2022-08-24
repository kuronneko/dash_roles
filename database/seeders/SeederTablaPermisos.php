<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use spatie
use Spatie\Permission\Models\Role;
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
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
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

        $SuperUserDemo= Role::create(['name' => 'SuperUserDemo']);
        foreach($permisos as $permiso){
            //creación de permisos
            Permission::create(['name' => $permiso])->assignRole($SuperUserDemo);
        }

    }
}
