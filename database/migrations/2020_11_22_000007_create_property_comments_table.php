<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('property_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rate');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
