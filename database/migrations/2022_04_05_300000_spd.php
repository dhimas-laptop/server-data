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
        Schema::create('spd', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spt')->nullable();
            $table->date('tgl_spt')->nullable();
            $table->string('nomor_spd')->nullable();
            $table->date('tgl_spd')->nullable();
            $table->string('tujuan')->nullable();
            $table->date('berangkat')->nullable();
            $table->date('pulang')->nullable(); 
            $table->integer('uang_harian')->nullable();
            $table->text('pesawat')->nullable();
            $table->text('no_penerbangan')->nullable();
            $table->text('no_tiket')->nullable();
            $table->text('kode_booking')->nullable();
            $table->integer('harga_pesawat')->nullable();
            $table->integer('taxi')->nullable();
            $table->text('hotel')->nullable();
            $table->integer('harga_hotel')->nullable();
            $table->text('no_telp')->nullable();
            $table->text('provinsi')->nullable();
            $table->integer('total')->nullable();
            $table->foreignId('bagian_id')->constrained('bagian');
            $table->string('scan_spd')->nullable();
            $table->string('scan_spt')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
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
        Schema::dropIfExists('sppd');
    }
};
