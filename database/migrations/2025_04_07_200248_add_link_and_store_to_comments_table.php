<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_add_link_and_store_to_comments_table.php
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('store')->nullable()->after('content');
            $table->string('link')->nullable()->after('store');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
