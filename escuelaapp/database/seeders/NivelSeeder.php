<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $niveles = ['Primero','Segundo','Tercero','Cuarto','Quinto','Sexto,','Septimo','Octavo','Noveno','Decimo','Undecimo'];

       foreach($niveles as $nivel)
       {
        DB::table('niveles')->insert(['nombre' =>$nivel]);
       }
    }
}
