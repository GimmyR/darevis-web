<?php

use App\Models\Entry;
use App\Models\Parameter;
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
        Schema::create('entry_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Entry::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Parameter::class)->constrained()->cascadeOnDelete();
            $table->double("value")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_details');
    }
};
