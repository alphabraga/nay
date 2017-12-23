<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSystemRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $usuarioOperador =  \App\User::create(
                                            [ 
                                            'name'          => 'Operador do Sistema',
                                            'email'         => 'operador@sistema.com.br',
                                            'password'      => \Hash::make('123456'),
                                            'username'      => 'operador',
                                            'activated'     => 'on',
                                            'validity'      => \Carbon\Carbon::now()->addYears(4)
                                            ]
        );

        $usuarioCaixa =  \App\User::create(
                                            [ 
                                            'name'          => 'Caixa do Sistema',
                                            'email'         => 'caixa@sistema.com.br',
                                            'password'      => \Hash::make('123456'),
                                            'username'      => 'caixa',
                                            'activated'     => 'on',
                                            'validity'      => \Carbon\Carbon::now()->addYears(4)
                                            ]
        );


        $admin = new \App\Nay\Model\Role();
        $admin->name         = 'administrador';
        $admin->display_name = 'Administrador do Sistema';
        $admin->description  = 'Esse usuário possui acesso total ao sistema desde configurações, cadastros realização de transações emissão de relatórios';

        $admin->save();

        $user = \App\User::where('name', '=', 'admin')->first();

        $user->attachRole($admin);

        $caixa = new \App\Nay\Model\Role();
        $caixa->name         = 'caixa';
        $caixa->display_name = 'Caixa';
        $caixa->description  = 'Esse usuário possui permissão para abrir e fechar o caixa, registrar vendas'; 

        $caixa->save();

        $usuarioCaixa->attachRole($caixa);

        $operador = new \App\Nay\Model\Role();
        $operador->name         = 'operador';
        $operador->display_name = 'Operador';
        $operador->description  = 'Realiza cadastros, realiza orçamentos'; 

        $operador->save();

        $usuarioOperador->attachRole($operador);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
