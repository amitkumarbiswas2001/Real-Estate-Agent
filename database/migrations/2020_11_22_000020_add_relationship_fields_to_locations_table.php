<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_fk_2636707')->references('id')->on('currencies');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_fk_2636708')->references('id')->on('countries');
        });
    }
}
