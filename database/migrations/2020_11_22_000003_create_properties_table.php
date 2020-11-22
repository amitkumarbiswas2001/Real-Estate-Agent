<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 15, 2);
            $table->decimal('tax', 15, 2);
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('sqft');
            $table->longText('address');
            $table->string('city');
            $table->string('state');
            $table->integer('pincode');
            $table->boolean('featured')->default(0)->nullable();
            $table->longText('notes')->nullable();
            $table->longText('other_informations')->nullable();
            $table->longText('description')->nullable();
            $table->string('lankmark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
