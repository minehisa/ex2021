<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperbasicTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::enableForeignKeyConstraints();
    Schema::create('paperbasic', function (Blueprint $table) {

      // $table->unsignedBigInteger('paperid');
      $table->bigIncrements('paperid');
      $table->unsignedBigInteger('id');
      // $table->foreignId('id')->constrained('users');
      // $table->dateTime('updatetime');
      // $table->dateTime('regittime');
      $table->timestampTz('updatetime')->nullable();
      $table->timestampTz('regittime')->nullable();

      // PK 設定
      $table->dropPrimary();
      $table->primary(['paperid']);
      // FK
      $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('paperbasic');
  }
}
