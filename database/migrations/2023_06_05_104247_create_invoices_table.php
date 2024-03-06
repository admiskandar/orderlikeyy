<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('kiosk_id');
            $table->foreign('kiosk_id')->references('id')->on('kiosks')->onDelete('cascade');
            $table->date('invoice_date');
            $table->decimal('total_amount', 8, 2);
            $table->decimal('total_paid', 8, 2);
            $table->decimal('total_balance', 8, 2);
            $table->string('reference_number');
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
