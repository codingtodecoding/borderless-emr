<?php

namespace Database\Seeders;

use App\Models\CampaignType;
use Illuminate\Database\Seeder;

class CampaignTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaignTypes = [
            [
                'name' => 'General Health Screening',
                'description' => 'Regular health screening and checkup campaign with complete patient data collection',
                'is_active' => true,
            ],
            [
                'name' => 'Swatch Bharat',
                'description' => 'Swachh Bharat health initiative - Basic patient information and location data only',
                'is_active' => true,
            ],
            [
                'name' => 'Special HC. Beneficiary',
                'description' => 'Special Health Centre Beneficiary scheme - Selective health data collection',
                'is_active' => true,
            ],
            [
                'name' => 'Awareness Camp',
                'description' => 'Health awareness and educational campaign - Focused on awareness and basic metrics',
                'is_active' => true,
            ],
        ];

        foreach ($campaignTypes as $type) {
            CampaignType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}
