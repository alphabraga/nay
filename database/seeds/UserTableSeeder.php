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

    	/*
            Agora faço isso direto no migration ja que o usuario admin é essencial para o sistema
            Vou colcoar aqui outros usuarios de diferentes niveis de acesso assim que o controle e acesso
            estiver funcionando

        \App\User::create([

    						'name' => 'alphabraga', 
    						'email' => 'alfredorodruguesbraga@gmail.com', 
    						'password' => \Hash::make('123456')
    					]);
        */
    }
}
