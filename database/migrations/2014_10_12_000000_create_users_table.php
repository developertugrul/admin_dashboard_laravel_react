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
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('username',30)->unique();
            $table->string('password');
            $table->string('phone',50)->nullable();
            $table->string('email',255)->unique();
            $table->string('avatar',255)->nullable();
            $table->string('bio',1000)->nullable();
            $table->string('website',255)->nullable();
            $table->boolean('company_id')->nullable();
            $table->unsignedBigInteger('top_user_id')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('address_line3')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('description')->nullable();
            $table->decimal('balance',11,2)->default(0);
            $table->decimal('currency',11,2)->default(0);
            $table->decimal('discount',11,2)->default(0);
            $table->string('invoice_prefix',10)->default("INV-");
            $table->string('timezone')->default("Europe/Istanbul");
            $table->boolean('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
