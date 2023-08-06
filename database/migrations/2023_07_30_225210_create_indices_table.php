<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('indices', function (Blueprint $table) {
           $table->id();

           $table->string('name');
           $table->foreignId('form_id')->nullable()->constrained('forms','id')->onDelete('cascade');

           $table->text('description')->nullable();

           $table->string('slug')->unique();
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
        Schema::dropIfExists('indices');
    }
};
