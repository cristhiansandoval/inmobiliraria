<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price', 10, 2)->nullable();
            $table->enum('purpose', ['sale', 'rent'])->nullable();
            $table->enum('type', ['house', 'apartment'])->nullable();
            $table->integer('bedroom')->nullable();
            $table->string('city')->nullable();
            $table->integer('agent_id')->nullable();
            $table->text('mail')->nullable();
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
        Schema::dropIfExists('searches');
    }
}
