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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->index()->constrained('workers');
            $table->foreignId('product_id')->index()->constrained('products');
            $table->foreignId('buyer_id')->nullable()->index()->constrained('buyers');
            $table->unsignedInteger('count_buy');// Сколько купил
            $table->unsignedInteger('cost_buy');// По какой стоимости
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
