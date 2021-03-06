<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPost extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_posts', function (Blueprint $table) {
            $table->id();
            $table->string('posttitle');
            $table->string('postcontent');
            $table->timestamp('post_publish');
            $table->string('author_name');
            $table->string('catogory');
            $table->rememberToken();
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
        Schema::dropIfExists('addpost');
    }
}
