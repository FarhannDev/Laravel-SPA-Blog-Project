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
    Schema::enableForeignKeyConstraints();
    Schema::create('post_comments', function (Blueprint $table) {
      $table->id();
      $table->string('comment_name', 100)->nullable();
      $table->longText('comment_description')->nullable();

      $table->foreignId('user_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
      $table->foreignId('post_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('post_comments');
  }
};
