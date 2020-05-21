<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('pet_name');
            $table->string('gender');
            $table->bigInteger('age');
            $table->float('adoption_fee', 8,2);
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('stocks');
            $table->timestamps();

            // Foreign Key
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
