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
        Schema::table('homepages', function (Blueprint $table) {
            $table->string('iad_image')->nullable()->after('success_stories');
            $table->string('iad_link')->nullable()->after('success_stories');
            $table->string('iad_button')->nullable()->after('success_stories');
            $table->longText('iad_description')->nullable()->after('success_stories');
            $table->string('iad_subtitle')->nullable()->after('success_stories');
            $table->string('iad_title')->nullable()->after('success_stories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepages', function (Blueprint $table) {
            $table->dropColumn('iad_image');
            $table->dropColumn('iad_description');
            $table->dropColumn('iad_link');
            $table->dropColumn('iad_button');
            $table->dropColumn('iad_subtitle');
            $table->dropColumn('iad_title');
        });
    }
};
