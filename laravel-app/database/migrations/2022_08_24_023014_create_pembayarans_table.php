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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_id')->unique();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->string('nama', 100)->nullable();
            $table->string('no_telpon', 16);
            $table->enum('payment_status', ['1','2','3'])->comment('1 = Belum Di Bayar, 2 = Pembayaran Berhasil , 3 = Konfirmasi');
            $table->string('payment_type', 50)->nullable();
            $table->string('pdf_url', 200)->nullable();
            $table->date('tgl_transaksi');
            $table->string('item_details',1000);
            $table->enum('metode_pengiriman',['1', '2'])->comment('1 = Ongkir, 2= Ambil Sendiri');
            $table->decimal('total_price', 10, 2);
            $table->softDeletes();
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
        Schema::dropIfExists('pembayarans');
    }
};
