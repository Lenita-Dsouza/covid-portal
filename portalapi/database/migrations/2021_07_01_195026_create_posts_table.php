<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('age');
            $table->date('dob');
            $table->unsignedBigInteger('adharno')->unique();
            $table->string('address');
            $table->enum('vaccinated', ['yes', 'no'])->default('no');
            $table->date('dose1date');
            $table->date('dose2date');
            $table->enum('result', ['positive', 'negative', 'recovered']);
            $table->enum('isolation', ['home', 'hospital']);
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
}
