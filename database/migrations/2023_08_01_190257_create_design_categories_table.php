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
         Schema::create('design_categories', function (Blueprint $table) {
           $table->id();

           $table->string('name');
           $table->string('price');
           $table->text('description')->nullable();
            $table->foreignId('design_id')->nullable()->constrained('designs','id')->onDelete('cascade');
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
        Schema::dropIfExists('design_categories');
    }
};
