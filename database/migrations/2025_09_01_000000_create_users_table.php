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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->foreignId('role_id')->constrained('roles', 'id')->index('user_role_id');
            $table->string('province_code');
            $table->string('district_code');
            $table->string('sub_district_code');
            $table->string('village_code');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('province_code')->references('code')->on('provinces');
            $table->foreign('district_code')->references('code')->on('districts');
            $table->foreign('sub_district_code')->references('code')->on('sub_districts');
            $table->foreign('village_code')->references('code')->on('villages');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
