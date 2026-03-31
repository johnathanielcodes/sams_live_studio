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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('bank')->nullable()->after('amount');
            $table->string('country_code')->nullable()->after('bank');
            $table->string('brand')->nullable()->after('country_code');
            $table->string('card_type')->nullable()->after('brand');
            $table->string('phone_number')->nullable()->after('card_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
