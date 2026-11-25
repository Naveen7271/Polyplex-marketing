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
        Schema::table('brands', function (Blueprint $table) {
            $table->string('banner')->nullable()->after('logo');
            $table->text('badge_description')->nullable()->after('subtitle');
            $table->text('paragraphs')->nullable()->after('badge_description');
            $table->text('statement')->nullable()->after('paragraphs');
            $table->string('brochure_url')->nullable()->after('statement');
        });

        Schema::create('brand_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_features');

        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn(['banner', 'badge_description', 'paragraphs', 'statement', 'brochure_url']);
        });
    }
};
