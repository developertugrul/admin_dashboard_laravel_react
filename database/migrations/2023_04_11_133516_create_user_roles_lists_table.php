<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_roles_lists', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("is_active")->default(false);
            $table->unsignedBigInteger("assigned_by")->nullable();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
                '--class' => 'UserRoleSeeder',
                '--force' => true
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles_lists');
    }
};
