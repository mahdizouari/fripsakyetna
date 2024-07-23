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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('Catégorie');// If necessary, modify this to be nullable or have a default value
            $table->string('Référence');
            $table->boolean('is_active')->default(1); // Ensures default is true
            $table->timestamps();
            $table->decimal('prix', 8, 2)->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn('prix');
        });
    }
};
