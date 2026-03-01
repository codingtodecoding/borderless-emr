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
        Schema::table('patients', function (Blueprint $table) {
            if (!Schema::hasColumn('patients', 'bmi')) {
                $table->decimal('bmi', 5, 2)->nullable();
            }
            if (!Schema::hasColumn('patients', 'investigation')) {
                $table->text('investigation')->nullable();
            }
            if (!Schema::hasColumn('patients', 'advice')) {
                $table->text('advice')->nullable();
            }
            if (!Schema::hasColumn('patients', 'lab_tests')) {
                $table->text('lab_tests')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumnIfExists('bmi');
            $table->dropColumnIfExists('investigation');
            $table->dropColumnIfExists('advice');
            $table->dropColumnIfExists('lab_tests');
        });
    }
};
