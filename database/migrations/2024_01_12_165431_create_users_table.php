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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('bio')->nullable();
            $table->string('social_links')->nullable();
            $table->string('language')->default('en');
            $table->boolean('full_access')->default(false)->comment('1=>yes, 0=>no');
            $table->boolean('status')->default(1)->comment('1=>active 0=>inactive');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
