<?php

use Illuminate\Database\Seeder;

class LivroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('livros')->delete();
        DB::statement('ALTER TABLE livros AUTO_INCREMENT = 1;');
        DB::table('livros')->insert([
        	[
            'nome' => 'Java EE',
            'valor' => 70.0,
            'quantidade' => 10,
            'categoria_id' => 1,
            'imagem' => 'img/javaee.jpg',
            'descricao' => 'Aprendendo a linguagem java para web'
            ],
            [
            'nome' => 'Laravel 5.4',
            'valor' => 100.0,
            'quantidade' => 10,
            'categoria_id' => 1,
            'imagem' => 'img/laravel5-4.png',
            'descricao' => 'Aprendendo o framework php'
            ],
            [
            'nome' => 'Angular 4',
            'valor' => 120.0,
            'quantidade' => 10,
            'categoria_id' => 1,
            'imagem' => 'img/angular.png',
            'descricao' => 'Aprendendo o framework angular 4 para o front-end'
            ]
        ]);
    }
}
