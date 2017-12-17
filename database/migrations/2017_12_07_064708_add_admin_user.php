<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laravolt\Avatar\Avatar;

class AddAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $admin = \App\User::create([
                                        'name'     => 'admin', 
                                        'email'    => 'alfredorodruguesbraga@gmail.com', 
                                        'password' => \Hash::make('123456')
                                   ]);


        $avatar = new Avatar();

        $avatar->create('admin')->save('public/images/users/' . $admin->id . '.png');
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
