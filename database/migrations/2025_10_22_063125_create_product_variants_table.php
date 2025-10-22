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
        Schema::create('product_variants', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('attribute_name')->nullable();   // e.g. "Weight"
            $table->string('attribute_value');             // e.g. "1 kg"
            $table->decimal('price', 10, 2);               // selling price for this variant
            $table->decimal('original_price', 10, 2)->nullable(); // optional MRP
            $table->integer('stock')->default(0);
            $table->json('meta')->nullable();              // optional JSON for extra info (images, etc.)
            $table->timestamps();
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variants');
    }
};
