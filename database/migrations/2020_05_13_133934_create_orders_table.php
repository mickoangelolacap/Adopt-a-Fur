<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('purchase_date')->nullable();
            $table->decimal('total_price', 8,2);
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            // Foreign Keys
            // user_id
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // status_id
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
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
        Schema::dropIfExists('orders');
    }
}
