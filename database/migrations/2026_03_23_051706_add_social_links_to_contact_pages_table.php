<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_pages', function (Blueprint $table) {

            // Social Links
            $table->string('facebook')->nullable()->after('map_iframe');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('youtube')->nullable()->after('instagram');

        });
    }

    public function down(): void
    {
        Schema::table('contact_pages', function (Blueprint $table) {

            $table->dropColumn([
                'facebook',
                'instagram',
                'youtube',
            ]);
        });
    }
};