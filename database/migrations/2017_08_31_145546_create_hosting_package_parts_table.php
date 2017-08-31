<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostingPackagePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting_package_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('drop_id');
            $table->nullableMorphs('related');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosting_package_parts');
    }
}
