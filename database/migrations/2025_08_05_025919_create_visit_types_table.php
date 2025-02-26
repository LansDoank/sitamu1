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
        Schema::create('visit_types', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code');
            $table->string('name');
            $table->string('slug')->unique();

            // Tambahkan kolom dulu sebelum foreign key
            $table->string('province_code', 10);
            $table->string('district_code', 10);
            $table->string('sub_district_code', 10);
            $table->string('village_code', 10);

            // Foreign Keys
            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('cascade');
            $table->foreign('district_code')->references('code')->on('districts')->onDelete('cascade');
            $table->foreign('sub_district_code')->references('code')->on('sub_districts')->onDelete('cascade');
            $table->foreign('village_code')->references('code')->on('villages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_types');
    }
};
