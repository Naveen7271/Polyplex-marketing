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
            $table->string('benefits_overline')->nullable()->after('brochure_url');
            $table->string('benefits_title')->nullable()->after('benefits_overline');
            $table->text('benefits_description')->nullable()->after('benefits_title');
            $table->string('impact_title')->nullable()->after('benefits_description');
            $table->text('impact_description')->nullable()->after('impact_title');
            $table->string('impact_banner')->nullable()->after('impact_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'benefits_overline',
                'benefits_title',
                'benefits_description',
                'impact_title',
                'impact_description',
                'impact_banner',
            ]);
        });
    }
};
