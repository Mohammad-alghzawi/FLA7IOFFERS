<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   

  public function up(){Schema::create('payments', function (Blueprint $table) {
    $table->id();$table->unsignedBigInteger('user_id');
    $table->string('user_name');$table->string('user_email');
    $table->float('amount', 10, 2);$table->string('currency');
    $table->string('payment_status');
    $table->foreign('user_id')->references('id')->on('users');

        });
    }


    

  public function down(): void{Schema::dropIfExists('payments');}
};