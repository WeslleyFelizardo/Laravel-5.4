<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->delete();
        DB::statement('ALTER TABLE categorias AUTO_INCREMENT = 1;');
        DB::table('categorias')->insert([
        	[
            'nome' => 'Tecnologia'            
            ],
            [
            'nome' => 'Romance'
            ],
            [
            'nome' => 'Suspense'
            ]
        ]);
    }
}
