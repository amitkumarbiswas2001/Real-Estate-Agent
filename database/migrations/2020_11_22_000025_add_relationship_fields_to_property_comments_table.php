<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPropertyCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('property_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2636701')->references('id')->on('users');
        });
    }
}
