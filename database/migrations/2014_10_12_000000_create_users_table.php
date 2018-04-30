<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('name'); // encrypted;
            $table->string('ref_id'); // SAP/STUDENT/USERNAME encrypted
            $table->string('email'); // encrypted
            $table->string('full_name', 512); // encrypted
            $table->string('division_id');
            $table->boolean('gender');
            $table->string('pln')->nullable(); // encrypted - professional licence no
            $table->tinyInteger('role_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
