<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 64)->nullable();
            $table->string('user_agent', 1024)->nullable();
            $table->string('device_type', 50)->nullable(); // desktop, mobile, tablet, bot
            $table->string('platform', 100)->nullable(); // OS
            $table->string('browser', 100)->nullable();
            $table->string('browser_version', 50)->nullable();
            $table->string('referer', 1024)->nullable();
            $table->string('url', 700);
            $table->string('route_name', 255)->nullable();
            $table->string('method', 10)->nullable();
            $table->string('accept_language', 255)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->boolean('is_bot')->default(false);
            $table->string('session_id', 100)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();

            $table->index(['ip_address', 'created_at']);
            $table->index('route_name');
            $table->index('url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};


