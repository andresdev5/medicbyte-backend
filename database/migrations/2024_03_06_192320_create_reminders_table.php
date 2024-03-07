<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Medication;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Medication::class, 'medication_id');
            $table->dateTime('start_date')->default(DB::raw('NOW()'));
            $table->dateTime('end_date');
            $table->integer('interval_value');
            $table->enum('interval_unit', ['MINUTES', 'HOURS', 'DAYS', 'WEEKS']);
            $table->integer('interval_count')->default(0);
            $table->integer('max_intervals')->default(1);
            $table->text('notes')->nullable();
            $table->enum('status', ['ACTIVE', 'COMPLETED'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
