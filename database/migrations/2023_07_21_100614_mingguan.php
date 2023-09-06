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
        Schema::create('mingguan', function (Blueprint $table) {
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
            $table->string('question12')->nullable();
            $table->integer('kemajuan1')->nullable();
            $table->integer('kemajuan2')->nullable();
            $table->integer('kemajuan3')->nullable();
            $table->integer('kemajuan4')->nullable();
            $table->integer('kemajuan5')->nullable();
            $table->integer('kemajuan6')->nullable();
            $table->integer('kemajuan7')->nullable();
            $table->integer('kemajuan8')->nullable();
            $table->integer('kemajuan9')->nullable();
            $table->integer('kemajuan10')->nullable();
            $table->integer('pupuk1')->nullable();
            $table->integer('pupuk2')->nullable();
            $table->integer('pupuk3')->nullable();
            $table->integer('pupuk4')->nullable();
            $table->integer('pupuk5')->nullable();
            $table->integer('pupuk6')->nullable();
            $table->integer('pupuk7')->nullable();
            $table->integer('pupuk8')->nullable();
            $table->integer('pupuk9')->nullable();
            $table->integer('pupuk10')->nullable();
            $table->integer('npk1')->nullable();
            $table->integer('npk2')->nullable();
            $table->integer('npk3')->nullable();
            $table->integer('npk4')->nullable();
            $table->integer('npk5')->nullable();
            $table->integer('npk6')->nullable();
            $table->integer('npk7')->nullable();
            $table->integer('npk8')->nullable();
            $table->integer('npk9')->nullable();
            $table->integer('npk10')->nullable();
            $table->integer('hidrogel1')->nullable();
            $table->integer('hidrogel2')->nullable();
            $table->integer('hidrogel3')->nullable();
            $table->integer('hidrogel4')->nullable();
            $table->integer('hidrogel5')->nullable();
            $table->integer('hidrogel6')->nullable();
            $table->integer('hidrogel7')->nullable();
            $table->integer('hidrogel8')->nullable();
            $table->integer('hidrogel9')->nullable();
            $table->integer('hidrogel10')->nullable();
            $table->integer('sulam1')->nullable();
            $table->integer('sulam2')->nullable();
            $table->integer('sulam3')->nullable();
            $table->integer('sulam4')->nullable();
            $table->integer('sulam5')->nullable();
            $table->integer('sulam6')->nullable();
            $table->integer('sulam7')->nullable();
            $table->integer('sulam8')->nullable();
            $table->integer('sulam9')->nullable();
            $table->integer('sulam10')->nullable();
            $table->text('problem1')->nullable();
            $table->text('problem2')->nullable();
            $table->text('problem3')->nullable();
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
        Schema::dropIfExists('mingguan');
    }
};
