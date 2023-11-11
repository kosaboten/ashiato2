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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('image')->nullable(true);
            $table->string('affiliation')->nullable(true);
            $table->text('self_introduction')->nullable(true);
            $table->text('work_experience')->nullable(true);
            $table->string('region')->nullable(true);
            $table->string('twitter')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('instagram')->nullable(true);
            $table->integer('public_status')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
