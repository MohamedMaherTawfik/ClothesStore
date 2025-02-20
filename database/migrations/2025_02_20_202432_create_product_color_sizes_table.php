<?php

use App\Models\productColors;
use App\Models\products;
use App\Models\productSizes;
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
        Schema::create('product_color_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(products::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(productColors::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(productSizes::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color_sizes');
    }
};
