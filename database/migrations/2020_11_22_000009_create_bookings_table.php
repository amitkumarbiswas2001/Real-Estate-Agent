<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('type');
            $table->decimal('paid_amount', 15, 2);
            $table->decimal('payable_amount', 15, 2);
            $table->date('booking_until')->nullable();
            $table->string('booking_status')->nullable();
            $table->date('booking_form')->nullable();
            $table->string('document_number')->nullable();
            $table->boolean('document_verified')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
