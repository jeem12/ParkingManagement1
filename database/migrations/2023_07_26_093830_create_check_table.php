<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check', function (Blueprint $table) {
            $table->id();
            $table->string('plate');
            $table->date('checkindate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('checkintime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('checkoutdate')->nullable();
            $table->time('checkouttime')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check');
    }
};
