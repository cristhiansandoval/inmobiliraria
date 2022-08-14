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
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('image')->default('default.png');
            $table->string('about')->nullable();
            $table->string('whatsapp')->nullable();
            $table->double('amount', 10, 2)->default(0);
            $table->double('cuota', 10, 2)->default(0);
            $table->double('cost', 10, 2)->default(1);
            $table->integer('views')->default(0);
            $table->integer('images')->default(0);
            $table->date('cerca_fin')->default(date('Y-m-d', time()));
            $table->date('fin_cuota')->default(date('Y-m-d', time()));
            $table->date('fin_plan')->default(date('Y-m-d', time()));
            $table->string('password');
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
