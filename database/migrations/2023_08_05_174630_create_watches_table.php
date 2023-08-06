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
         Schema::create('watches', function (Blueprint $table) {
           $table->id();

           $table->string('name');
           $table->text('description')->nullable();
            $table->foreignId('form_id')->nullable()->constrained('designs','id')->onDelete('cascade');
            $table->foreignId('index_id')->nullable()->constrained('indices','id')->onDelete('cascade');
           $table->integer('index_image_id')->nullable();
            $table->foreignId('indicator_id')->nullable()->constrained('indicators','id')->onDelete('cascade');
            $table->foreignId('background_id')->nullable()->constrained('backgrounds','id')->onDelete('cascade');
           $table->integer('background_image_id')->nullable();
            $table->foreignId('bracelet_id')->nullable()->constrained('bracelets','id')->onDelete('cascade');
            $table->foreignId('design_id')->nullable()->constrained('designs','id')->onDelete('cascade');
            $table->foreignId('design_category_id')->nullable()->constrained('design_categories','id')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users','id')->onDelete('cascade');
           $table->text('text')->nullable();
           $table->longText('background_image')->nullable();
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
        Schema::dropIfExists('watches');
    }
};
