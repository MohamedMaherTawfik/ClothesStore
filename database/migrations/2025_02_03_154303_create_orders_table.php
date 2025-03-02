<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->double('total_price');
            $table->enum('status', ['pending', 'delivered', 'cancelled'])->default('pending');
            $table->double('discount')->nullable();
            $table->double('total_quantity');
            $table->double('user_address');
            $table->double('taxes')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('notes')->nullable();
            $table->string('carrier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
