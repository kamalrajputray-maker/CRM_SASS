<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->id();

            $table->ulid('public_id')->unique();

            $table->string('name',150);

            $table->string('slug',150)->unique();

            $table->string('email')->nullable();

            $table->string('phone',20)->nullable();

            $table->string('website')->nullable();

            $table->string('logo')->nullable();

            $table->text('address')->nullable();

            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->string('country')->nullable();

            $table->string('postal_code',20)->nullable();

            $table->string('timezone')->default('Asia/Kolkata');

            $table->string('currency',10)->default('INR');

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};