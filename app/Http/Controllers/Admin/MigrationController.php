<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    /**
     * Run all pending migrations
     */
    public function runMigrations()
    {
        try {
            // Execute migrations
            Artisan::call('migrate', ['--force' => true]);

            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'message' => 'Migrations completed successfully!',
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error running migrations: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get migration status
     */
    public function getMigrationStatus()
    {
        try {
            Artisan::call('migrate:status');
            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error getting migration status: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Rollback last migration batch
     */
    public function rollbackMigrations()
    {
        try {
            Artisan::call('migrate:rollback', ['--force' => true]);

            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'message' => 'Rollback completed successfully!',
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error rolling back migrations: ' . $e->getMessage()
            ], 500);
        }
    }
}
