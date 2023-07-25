<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat', function (Blueprint $table) { 
            $table->id();
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('address')->nullable();//cos cung dc k co k sao
            $table->date('date_of_birth')->nullable();
            $table->integer('status')->default(1);//gia tri khoi tao la 1
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
        Schema::dropIfExists('cat');
    }
};
