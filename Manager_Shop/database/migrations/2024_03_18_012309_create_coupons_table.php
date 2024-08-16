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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('code')->unique();
            $table->unsignedInteger('discount_amount')->nullable();
            $table->unsignedInteger('discount_percentage')->nullable();
            $table->string('discount_type');
            $table->string('description');
            $table->dateTime('start_date'); // Ngày bắt đầu
            $table->dateTime('end_date'); // Ngày kết thúc
            $table->enum('status', ['active', 'expired'])->default('active'); // Trạng thái của mã giảm giá
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
