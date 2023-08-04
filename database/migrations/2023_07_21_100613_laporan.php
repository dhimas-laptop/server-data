<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('luas')->nullable();
            $table->string('das')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('total')->nullable();
            $table->string('jenis')->nullable();
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->string('question3')->nullable();
            $table->string('question4')->nullable();
            $table->string('question5')->nullable();
            $table->string('question6')->nullable();
            $table->string('question7')->nullable();
            $table->string('question8')->nullable();
            $table->string('question9')->nullable();
            $table->string('question10')->nullable();
            $table->string('question11')->nullable();
            $table->integer('pupuk1')->nullable();
            $table->integer('pupuk2')->nullable();
            $table->integer('pupuk3')->nullable();
            $table->integer('hidrogel1')->nullable();
            $table->integer('hidrogel2')->nullable();
            $table->integer('hidrogel3')->nullable();
            $table->integer('sulam1')->nullable();
            $table->integer('sulam2')->nullable();
            $table->integer('sulam13')->nullable();
            $table->integer('dolomit1')->nullable();
            $table->integer('dolomit2')->nullable();
            $table->integer('dolomit3')->nullable();
            $table->integer('penyiangan1')->nullable();
            $table->integer('penyiangan2')->nullable();
            $table->integer('penyiangan3')->nullable();
            $table->integer('pendangiran1')->nullable();
            $table->integer('pendangiran2')->nullable();
            $table->integer('pendangiran3')->nullable();
            $table->integer('pemupukan1')->nullable();
            $table->integer('pemupukan2')->nullable();
            $table->integer('pemupukan3')->nullable();
            $table->integer('penyulaman1')->nullable();
            $table->integer('penyulaman2')->nullable();
            $table->integer('penyulaman3')->nullable();
            $table->integer('pemberantasan1')->nullable();
            $table->integer('pemberantasan2')->nullable();
            $table->integer('pemberantasan3')->nullable();
            $table->text('problem1')->nullable();
            $table->text('problem2')->nullable();
            $table->text('problem3')->nullable();
            $table->text('problem4')->nullable();
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
        Schema::dropIfExists('laporan');
    }
};
