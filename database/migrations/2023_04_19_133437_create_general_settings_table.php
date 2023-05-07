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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string("site_name");
            $table->string("site_logo");
            $table->string("site_favicon");
            $table->string("site_email");
            $table->string("site_phone");
            $table->string("site_address");
            $table->string("site_description");
            $table->string("site_keywords");
            $table->string("site_title");
            $table->string("site_footer");
            $table->string("site_status");
            $table->string("site_maintenance_message");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
