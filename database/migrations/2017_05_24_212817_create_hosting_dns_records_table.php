<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostingDnsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting_dns_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dns_zone_id');
            $table->unsignedInteger('external_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->text('content');
            $table->integer('ttl')->default(120);
            $table->smallInteger('prio');

            $table->foreign('dns_zone_id')
                  ->references('id')
                  ->on('hosting_dns_zones')
                  ->onDelete('cascade');


            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosting_dns_records');
    }
}
