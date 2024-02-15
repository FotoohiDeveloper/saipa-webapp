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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->tinyInteger('type')->comment('0 -> Saipa 1 -> ModiranKhodro');
            $table->tinyInteger('visibility')->default(1);
            $table->string('reception_number')->nullable();
            $table->string('application_number')->nullable();
            $table->string('national_code')->nullable();
            $table->string('id_number')->nullable();
            $table->string('car_name')->nullable();
            $table->string('owner_fullname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
