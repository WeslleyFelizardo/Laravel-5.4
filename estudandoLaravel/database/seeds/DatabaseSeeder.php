<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Weslley Felizardo',
            'email' => 'weslleyfelizardo1996@gmail.com',
            'password' => bcrypt('w10felizardo'),
            'endereco' => 'Avenida das Castanheiras, 243 - Jardim Samambaia',
            'endereco_entrega' => 'Avenida das Castanheiras, 243 - Jardim Samambaia'
        ]);
    }
}
