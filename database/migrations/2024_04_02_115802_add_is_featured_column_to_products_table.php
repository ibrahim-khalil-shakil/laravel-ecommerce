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
        Schema::table('products', function (Blueprint $table) {
            // Add the new column after the quantity_in_stock column
            $table->boolean('is_featured')->default(0)->after('quantity_in_stock')->comment('0 => Not Featured, 1 => Featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the newly added column
            $table->dropColumn('is_featured');
        });
    }
};
