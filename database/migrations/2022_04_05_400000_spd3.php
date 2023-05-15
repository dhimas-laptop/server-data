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
        Schema::create('spd3', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spt')->nullable();
            $table->date('tgl_spt')->nullable();
            $table->string('no_spm')->nullable();
            $table->string('nomor_spd')->nullable();
            $table->date('tgl_spd')->nullable();
            $table->string('tujuan')->nullable();
            $table->date('berangkat')->nullable();
            $table->date('pulang')->nullable();
            $table->integer('total')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('nama_lain')->nullable();
            $table->string('no_lain')->nullable();
            $table->string('status_lain')->nullable();
            $table->string('kode')->nullable();
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
        Schema::dropIfExists('spd3');
    }
};
