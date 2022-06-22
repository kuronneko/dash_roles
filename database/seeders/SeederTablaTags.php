<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class SeederTablaTags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //lista de permisos
        $tags = [
            'Hierba',
            'Medicinal',
            'Semillas',
            'Planta Entera',
            'Flores',
            'Frutos',
            'Temperatura ',
            'Lesiones',
            'Tierra',
            'In-Door',
            'Aromatica',
            'Relajante',
            'Estimulante',
            'Verde',
            'Rojo',
            'Amarillo',
            'Ansiedad',
            'Depresión',
            'Insomnio',
            'Gripa',
            'Tos',
            'Asma',
            'Nervios',
        ];

        foreach($tags as $tag){
            //creación de permisos
            Tag::create(['nombre' => $tag]);
        }
    }
}
