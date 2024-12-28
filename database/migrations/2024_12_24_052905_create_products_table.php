<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->enum('model_type', ['glb', 'gltf']);
            $table->string('model_glb')->nullable(); 
            $table->string('scene_gltf')->nullable();
            $table->string('scene_bin')->nullable(); 
            $table->text('textures')->nullable(); 

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
