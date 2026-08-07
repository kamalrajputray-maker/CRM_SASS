<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('company_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->nullOnDelete();

            $table->ulid('public_id')
                ->unique()
                ->after('company_id');

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('phone',20)->nullable();

            $table->string('profile_photo')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamp('last_login_at')->nullable();

            $table->softDeletes();

            $table->index('company_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropConstrainedForeignId('company_id');

            $table->dropColumn([
                'public_id',
                'first_name',
                'last_name',
                'phone',
                'profile_photo',
                'status',
                'last_login_at',
                'deleted_at'
            ]);
        });
    }
};