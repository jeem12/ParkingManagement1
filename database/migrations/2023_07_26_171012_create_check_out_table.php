<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_out', function (Blueprint $table) {
            $table->id();
            $table->string('plate');
            $table->date('checkindate')->nullable();
            $table->time('checkintime')->nullable();
            $table->date('checkoutdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('checkouttime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_out');
    }
};
