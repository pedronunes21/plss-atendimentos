<?php

use Carbon\Carbon;
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
        Schema::dropIfExists('call');
        Schema::create('call', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 90);
            $table->text('description')->charset('binary');
            $table->date('solution_deadline')->default(Carbon::now()->addDays(3));
            $table->date('solution_date')->nullable();
            $table->timestamps();
        });

        // Foreign keys
        Schema::table('call', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('call_category')->onDelete('cascade');

            $table->unsignedBigInteger('situation_id');

            $table->foreign('situation_id')->references('id')->on('situation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call');
    }
};
