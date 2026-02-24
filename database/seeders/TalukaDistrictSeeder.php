<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use Illuminate\Database\Seeder;

class TalukaDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create India country
        $india = Country::firstOrCreate(
            ['code' => 'IN'],
            [
                'name' => 'India',
                'phone_code' => '+91',
                'is_active' => true,
            ]
        );

        // Get or create Maharashtra state
        $maharashtra = State::firstOrCreate(
            ['code' => 'MH', 'country_id' => $india->id],
            [
                'name' => 'Maharashtra',
                'is_active' => true,
            ]
        );

        // Create/Update Districts and their Talukas
        $this->seedAmravatiDistrict($maharashtra);
        $this->seedNagpurDistrict($maharashtra);
        $this->seedSambhajinagarDistrict($maharashtra);
    }

    /**
     * Seed Amravati district with its talukas
     */
    private function seedAmravatiDistrict($state): void
    {
        $district = District::firstOrCreate(
            ['state_id' => $state->id, 'name' => 'Amravati'],
            ['is_active' => true]
        );

        $talukas = [
            'Chandur bazar',
            'Achalpur',
        ];

        foreach ($talukas as $talukaName) {
            Taluka::firstOrCreate(
                ['district_id' => $district->id, 'name' => $talukaName],
                ['is_active' => true]
            );
        }
    }

    /**
     * Seed Nagpur district with its talukas
     */
    private function seedNagpurDistrict($state): void
    {
        $district = District::firstOrCreate(
            ['state_id' => $state->id, 'name' => 'Nagpur'],
            ['is_active' => true]
        );

        $talukas = [
            'Hingna',
            'Umred',
            'Kuhi',
        ];

        foreach ($talukas as $talukaName) {
            Taluka::firstOrCreate(
                ['district_id' => $district->id, 'name' => $talukaName],
                ['is_active' => true]
            );
        }
    }

    /**
     * Seed Sambhaji Nagar district with its talukas
     */
    private function seedSambhajinagarDistrict($state): void
    {
        $district = District::firstOrCreate(
            ['state_id' => $state->id, 'name' => 'Sambhaji Nagar'],
            ['is_active' => true]
        );

        $talukas = [
            'Kannad',
            'Khultabad',
            'Gangapur',
            'Vaijapur',
        ];

        foreach ($talukas as $talukaName) {
            Taluka::firstOrCreate(
                ['district_id' => $district->id, 'name' => $talukaName],
                ['is_active' => true]
            );
        }
    }
}
