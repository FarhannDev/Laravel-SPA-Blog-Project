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
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('post_title', 120);
      $table->string('post_slug', 255)->unique();
      $table->longText('post_description')->nullable();
      $table->string('post_cover', 255)->nullable();
      $table->enum('status', ['publish', 'unpublish'])->default('unpublish');
      $table->timestamp('publish_date')->nullable();
      $table->timestamp('unpublish_date')->nullable();
      $table->string('publish_by')->nullable();

      $table->foreignId('user_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
      $table->foreignId('post_categorie_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('posts');
  }
};
