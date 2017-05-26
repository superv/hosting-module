<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingDnsZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting_dns_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('external_id')->nullable();
            $table->string('domain');
            $table->string('zone_type');
            $table->nullableTimestamps();

            $table->foreign('service_id')
                  ->references('id')
                  ->on('supreme_services')
                  ->onDelete('cascade');

            $table->unique(['service_id', 'domain']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosting_dns_zones');
    }
}
