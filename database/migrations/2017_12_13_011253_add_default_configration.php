<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultConfigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = App\Nay\Model\ConfigurationsModel::first();

        $config->custom_field1_label = '1 - Edite o nome desse campo em configurações';
        $config->custom_field2_label = '2 - Edite o nome desse campo em configurações';
        $config->custom_field3_label = '3 - Edite o nome desse campo em configurações';
        $config->custom_field4_label = '4 - Edite o nome desse campo em configurações';
        $config->custom_field5_label = '5 - Edite o nome desse campo em configurações';
        $config->custom_field6_label = '6 - Edite o nome desse campo em configurações';

        $config->save();
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
