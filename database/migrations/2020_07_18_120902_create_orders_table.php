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
            $table->integer('user_id')->unsigned();
            $table->enum('status',['pending', 'paid','sent','done'])->default('pending');
            $table->string('email',64);
            $table->integer('price');
            $table->string('name',64);
            $table->string('secondname',64);
            $table->string('city',64);
            $table->string('street',64);
            $table->text('comment')->nullable();
            $table->string('phonenumber',9);
            $table->string('postalcode',10);
            $table->integer('shipping_id')->unsigned();

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
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
