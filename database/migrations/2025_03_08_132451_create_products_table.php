<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedDecimal('price',10,2);
            $table->unsignedInteger('quantity')->default(0);
            $table->text('description');
            // Adding the foreign key column 'category_id' referencing 'id' in the 'categories' table
            $table->unsignedBigInteger('category_id');  // This column will store the foreign key

            // Foreign key constraint
            $table->foreign('category_id') // The column in the current table
                  ->references('id')       // The referenced column in the related table
                  ->on('categories')       // The related table
                  ->onDelete('cascade');   // Optional: Define what happens when a category is deleted

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
