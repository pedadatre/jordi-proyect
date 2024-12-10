<?php
// database/migrations/xxxx_xx_xx_add_details_to_crews_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('main_activities')->nullable();
            $table->string('leader')->nullable();
            $table->integer('events_count')->default(0);
            $table->string('contact_email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('location');
            $table->dropColumn('main_activities');
            $table->dropColumn('leader');
            $table->dropColumn('events_count');
            $table->dropColumn('contact_email');
        });
    }
};