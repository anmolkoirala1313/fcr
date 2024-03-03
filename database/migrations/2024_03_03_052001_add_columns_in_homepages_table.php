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
            $table->longText('ss_description')->nullable()->after('success_stories');
            $table->string('ss_subtitle')->nullable()->after('success_stories');
            $table->string('ss_title')->nullable()->after('success_stories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepages', function (Blueprint $table) {
            $table->dropColumn('ss_description');
            $table->dropColumn('ss_subtitle');
            $table->dropColumn('ss_title');
        });
    }
};
