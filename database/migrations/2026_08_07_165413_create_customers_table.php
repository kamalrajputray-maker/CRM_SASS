<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();

            $table->ulid('public_id')->unique();

            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('customer_code');

            $table->enum('customer_type', [
                'individual',
                'business'
            ])->default('individual');

            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->string('company_name')->nullable();

            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();

            $table->string('website')->nullable();

            $table->text('address')->nullable();

            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code', 20)->nullable();

            $table->foreignId('assigned_to')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->unique(['company_id', 'customer_code']);
            $table->index(['company_id', 'status']);
            $table->index(['company_id', 'email']);
            $table->index(['company_id', 'phone']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};