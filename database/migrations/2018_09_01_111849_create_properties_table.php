<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('index');
            $table->integer('row');
            $table->enum('type', ['chance', 'start', 'prison', 'go_prison', 'street', 'parking']);
            $table->string('size')->default('small');
            $table->decimal('price', 6, 2);
            $table->string('color')->nullable();
            $table->string('border')->nullable();
            $table->string('classes')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
