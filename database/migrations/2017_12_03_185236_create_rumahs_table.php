<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rumah_type_id');
            $table->integer('perumahan_id');
            $table->string('block');
            $table->integer('no');
            $table->boolean('subsidi')->nullable()->default(false);
            $table->integer('harga');
            $table->integer('booked_by')->nullable();
            $table->string('location')->nullable();
            $table->boolean('document_approved')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumahs');
    }
}
