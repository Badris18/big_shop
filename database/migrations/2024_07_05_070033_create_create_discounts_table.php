<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\DiscountType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('create_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(DiscountType::COUPON_CODE);
            $table->timestamp('start_date')->useCurrent()->nullable();
            $table->timestamp('end_date')->useCurrent()->nullable();
            $table->boolean('never_experired')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_discounts');
    }
};
