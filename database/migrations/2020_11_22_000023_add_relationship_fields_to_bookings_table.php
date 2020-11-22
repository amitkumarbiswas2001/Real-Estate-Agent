<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_2636668')->references('id')->on('users');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id', 'property_fk_2636669')->references('id')->on('properties');
        });
    }
}
