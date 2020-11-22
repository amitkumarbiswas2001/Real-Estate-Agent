<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('property_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->unique();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
