<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('username', 30)->unique();
            $table->string('password', 500);
            $table->string('phone', 50)->nullable();
            $table->string('email', 255)->unique();
            $table->string('avatar', 255)->nullable();
            $table->string('bio', 1000)->nullable();
            $table->string('website', 255)->nullable();
            $table->boolean('company_id')->nullable();
            $table->unsignedBigInteger('top_user_id')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('country')->nullable();
            $table->string('address_line1', 255)->nullable();
            $table->string('address_line2', 255)->nullable();
            $table->string('address_line3', 255)->nullable();
            $table->string('postal_code', 30)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('description', 1000)->nullable();
            $table->double('balance', 11, 2)->default(0);
            $table->string('currency', 3)->default("TRY");
            $table->double('discount', 11, 2)->default(0);
            $table->string('invoice_prefix', 10)->default("INV-");
            $table->double('default_tax_rate', 5, 2)->default(0);
            $table->string('timezone', 255)->default("Europe/Istanbul");
            $table->string('language', 7)->default("tr");
            $table->boolean('status')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string("user_roles", 1000)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
                '--class' => 'UserSeeder',
                '--force' => true
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
