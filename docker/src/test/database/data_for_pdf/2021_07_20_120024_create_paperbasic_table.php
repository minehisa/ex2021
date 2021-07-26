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
    Schema::create('paperbasic', function (Blueprint $table) {
      $table->bigIncrements('paperid');
      $table->id();
      $table->string('papername', 50);
      $table->string('author', 50);
      $table->string('journal', 50);
      $table->string('yearofpublic', 50);
      // $table->foreignId('id')->constrained('users');
      $table->timestamps();

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
