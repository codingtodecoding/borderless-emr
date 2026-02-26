<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get India, Maharashtra
        $india = Country::where('code', 'IN')->first();
        $maharashtra = State::where('code', 'MH')->first();

        // Seed Amravati District Villages
        $this->seedAmravatiVillages($india, $maharashtra);

        // Seed Nagpur District Villages
        $this->seedNagpurVillages($india, $maharashtra);

        // Seed Sambhaji Nagar District Villages
        $this->seedSambhajinagarVillages($india, $maharashtra);
    }

    /**
     * Seed villages for Amravati district
     */
    private function seedAmravatiVillages($country, $state): void
    {
        $district = District::where('name', 'Amravati')->where('state_id', $state->id)->first();

        $villages = [
            'Chandur bazar' => [
                'Sirasgaon kasba',
                'Deurwada',
                'Kharwadi',
                'Sirasgaon band',
                'Karjgaon',
                'Kurha',
                'Hirul purna',
                'Asegaon purna',
                'Ghatladki',
                'Brhman wada thadii',
                'Kural /chandur bazar',
                'Belora',
            ],
            'Achalpur' => [
                'Chamak budruk',
                'Kakda',
                'Partwada',
                'Malhara',
                'Gaurkheda',
                'Salepura pandhari',
                'Kandali',
                'Dhamangon gadhi',
                'Sawali dhatura',
            ],
        ];

        foreach ($villages as $talukaName => $villageNames) {
            $taluka = Taluka::where('name', $talukaName)
                ->where('district_id', $district->id)
                ->first();

            if (!$taluka) continue;

            foreach ($villageNames as $villageName) {
                Village::firstOrCreate(
                    [
                        'taluka_id' => $taluka->id,
                        'name' => trim($villageName),
                    ],
                    [
                        'country_id' => $country->id,
                        'state_id' => $state->id,
                        'district_id' => $district->id,
                        'is_active' => true,
                    ]
                );
            }
        }
    }

    /**
     * Seed villages for Nagpur district
     */
    private function seedNagpurVillages($country, $state): void
    {
        $district = District::where('name', 'Nagpur')->where('state_id', $state->id)->first();

        $villages = [
            'Hingna' => [
                'Gaurala',
                'Devli kalpande',
                'Bibee',
                'Lakhmapur',
                'Degma pinjari',
                'Kokardi',
                'Digdoh pandey',
                'Khapanipani',
                'Mathni',
                'Itewahi',
                'Mandwa marwadi',
            ],
            'Umred' => [
                'Keslapur',
                'Kohla',
                'Dudha',
                'Umra',
                'Thombra',
                'Borimanjra',
                'Borgaon',
                'Muradpur',
                'Kuhiphata',
                'Sonpuri',
                'Nirva',
                'Khapri',
                'Khairi ( nagoba )',
                'Khairi',
                'Pukeshwar',
                'Masala',
                'Chikaldhokda',
                'Digdoh pandey',
                'Chanoda',
                'Junoni',
                'Nandra',
            ],
            'Kuhi' => [
                'Bhatara',
            ],
        ];

        foreach ($villages as $talukaName => $villageNames) {
            $taluka = Taluka::where('name', $talukaName)
                ->where('district_id', $district->id)
                ->first();

            if (!$taluka) continue;

            foreach ($villageNames as $villageName) {
                Village::firstOrCreate(
                    [
                        'taluka_id' => $taluka->id,
                        'name' => trim($villageName),
                    ],
                    [
                        'country_id' => $country->id,
                        'state_id' => $state->id,
                        'district_id' => $district->id,
                        'is_active' => true,
                    ]
                );
            }
        }
    }

    /**
     * Seed villages for Sambhaji Nagar district
     */
    private function seedSambhajinagarVillages($country, $state): void
    {
        $district = District::where('name', 'Sambhaji Nagar')->where('state_id', $state->id)->first();

        $villages = [
            'Kannad' => [
                'Umbarkheda',
                'Mehun',
                'Jamdi',
                'Jamdi Ghat',
                'Sitanaik Tanda',
                'Kolwadi',
                'Rampurwadi',
                'Puranwadi',
                'Hasta',
                'Kolaswadi',
                'Shipghat',
                'Kholapur',
                'Langda Tanda',
                'Tikaram Tanda',
                'Bhambarwadi',
                'Ambala',
                'Bipkheda',
                'Sherodi',
                'Amba',
                'Ambatanda',
                'Rail',
                'Nawadi',
                'Satkund',
                'Thakurwadi',
                'Jehur',
            ],
            'Khultabad' => [
                'Dhamangaon',
                'Tisgaon',
                'Loni',
                'Gandheshwar',
                'Padali',
                'Wadgaon',
                'Talyachiwadi',
                'Aakhatwada',
                'Palaswadi',
                'Shekhapuri',
                'Chincholi',
                'Nirgudi',
                'Lamangaon',
                'Mhaismal',
                'Bodkha',
                'Zari',
                'Salukheda',
                'Devlana',
                'Sonkheda',
                'Mamnapur',
                'Bhadji',
                'Viramgaon',
                'Matargaon',
                'Mawsala',
                'Khirdi',
            ],
            'Gangapur' => [
                'Pratappurwadi',
                'Fulshivara',
                'Zodegaon',
                'Waghlgaon',
                'Talpimpri',
                'Manegaon',
                'Malunja',
                'Shirasgaon',
                'Khojewadi',
                'Toki',
                'Bhoyegaon',
                'Pendapur',
                'Pakhora',
                'Lakhmapur',
                'Asegaon',
                'Ambegaon',
                'Bhalgaon',
                'Shingi',
                'Pratappur',
                'Dighi',
                'Yesgaon',
                'Khadak Waghgaon',
                'Ambelohal',
                'Turkabad',
            ],
            'Vaijapur' => [
                'Jambargaon',
                'Ghayegaon',
                'Raghunathpurwadi',
                'Sudamwadi',
                'Kharaj',
                'Nimgaon',
                'Bhaggaon',
                'Belgaon',
                'Wadaji',
                'Parala',
                'Biloni',
                'Jarul',
                'Sakegaon',
                'Babhulgaon',
                'Rahegaon',
                'Bhaygaon',
                'Parsoda',
                'Shivari',
                'Hajipurwadi',
                'Nalegaon',
                'Tidhi',
                'Undirwadi',
            ],
        ];

        foreach ($villages as $talukaName => $villageNames) {
            $taluka = Taluka::where('name', $talukaName)
                ->where('district_id', $district->id)
                ->first();

            if (!$taluka) continue;

            foreach ($villageNames as $villageName) {
                Village::firstOrCreate(
                    [
                        'taluka_id' => $taluka->id,
                        'name' => trim($villageName),
                    ],
                    [
                        'country_id' => $country->id,
                        'state_id' => $state->id,
                        'district_id' => $district->id,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
