<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminCorrectFieldValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = \App\User::where('name', '=', 'admin')->first();

        $admin->name     = 'Administrador';
        $admin->username = 'admin';
        $admin->validity = \Carbon\Carbon::now()->addYears(4);

        $admin->save();

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
