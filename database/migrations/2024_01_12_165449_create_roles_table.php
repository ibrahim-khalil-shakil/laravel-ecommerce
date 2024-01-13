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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('identity', 30);
            $table->timestamps();
        });
        DB::table('roles')->insert([
            [
                'type' => 'Super Admin',
                'identity' => 'superadmin',
                'created_at' => Carbon::now()
            ], [
                'type' => 'Admin',
                'identity' => 'admin',
                'created_at' => Carbon::now()
            ], [
                'type' => 'Manager',
                'identity' => 'manager',
                'created_at' => Carbon::now()
            ], [
                'type' => 'Seller',
                'identity' => 'seller',
                'created_at' => Carbon::now()
            ], [
                'type' => 'Customer',
                'identity' => 'customer',
                'created_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
