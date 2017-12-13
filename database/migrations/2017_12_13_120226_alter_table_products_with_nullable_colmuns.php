<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductsWithNullableColmuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('ALTER TABLE `products` MODIFY `barcode` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `external_code` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field1` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field2` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field3` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field4` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field5` VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE `products` MODIFY `custom_field6` VARCHAR(255) NULL;');
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
