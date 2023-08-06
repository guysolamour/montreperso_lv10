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
         Schema::create('designs', function (Blueprint $table) {
           $table->id();

           $table->string('name');
           $table->text('description')->nullable();
            $table->foreignId('type_id')->nullable()->constrained('types','id')->onDelete('cascade');
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
        Schema::dropIfExists('designs');
    }
};
