<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Date : 08-03-2020
     * Description : Create table user
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->string("email")->unique();
            $table->string("password");
            $table->string("token")->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
