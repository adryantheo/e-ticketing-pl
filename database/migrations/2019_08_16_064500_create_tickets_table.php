<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->String('email');
            $table->double('price');
            // $table->String('qr_code');
            $table->integer('quantity');
            $table->boolean('is_vip');
            $table->unsignedInteger('product_id');
            // $table->boolean('is_checkin')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
