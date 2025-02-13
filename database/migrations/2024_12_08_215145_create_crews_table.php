<?php
// database/migrations/xxxx_xx_xx_create_crews_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->string('slogan');
            $table->string('color');
            $table->integer('capacity');
            $table->date('fondation_date');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('main_activities')->nullable();
            $table->string('leader')->nullable();
            $table->integer('events_count')->default(0);
            $table->string('contact_email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crews');
    }
};