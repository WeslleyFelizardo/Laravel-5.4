<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        DB::table('users')->insert([
        	[
            'name' => 'Weslley Felizardo',
            'email' => 'weslleyfelizardo1996@gmail.com',
            'password' => bcrypt('w10felizardo'),
            'endereco' => 'Avenida das Castanheiras, 243 - Jardim Samambaia'
            
            ]
        ]);
    }
}
