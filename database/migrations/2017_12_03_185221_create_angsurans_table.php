<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('rumah_id');
            $table->string('kode',8);
            $table->integer('jumlah');
            $table->boolean('completed')->nullable()->default(false);
            $table->date('tanggal_bayar');
            $table->date('tanggal_tempo')->nullabel();
            $table->boolean('remainder_sent')->nullabel()->default(false);
            $table->string('location')->nullable();
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
        Schema::dropIfExists('angsurans');
    }
}
