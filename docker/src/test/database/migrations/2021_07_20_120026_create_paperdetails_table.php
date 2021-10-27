<?php

use App\Models\paperbasics;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperdetailsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  // https://readouble.com/laravel/7.x/ja/migrations.html
  public function up()
  {
    Schema::enableForeignKeyConstraints();
    Schema::create('paperdetails', function (Blueprint $table) {
      // $table->foreignId('paperid')->constrained('paperbasics');
      //   $table->unsignedbigInteger('paperid')->unique();
      $table->bigIncrements('paperid');
      $table->string('papername', 100);
      $table->string('author', 250);
      $table->string('journal', 100);
      $table->integer('yearofpublic');
      $table->integer('volume')->nullable();
      $table->string('pages', 10)->nullable();
      $table->string('publisher', 50)->nullable();
      // $table->string('paperpdf');
      $table->string('paperpdf', 200);

      // PK 設定
      // $table->dropPrimary();
      //   $table->primary(['paperid']);
      // FK
      $table->foreign('paperid')->references('paperid')->on('paperbasic')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('paperdetails');
  }
}
