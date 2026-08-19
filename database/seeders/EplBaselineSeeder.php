<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Club;
use App\Models\Player;

class EplBaselineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/epl_baseline.json'));
        $clubs = json_decode($json, true);

        foreach ($clubs as $clubData) {
            $club = Club::updateOrCreate(
                ['short_code' => $clubData['short_code']],
                ['name' => $clubData['name']]
            );

            foreach ($clubData['players'] as $playerData) {
                Player::updateOrCreate(
                    [
                        'club_id' => $club->id,
                        'first_name' => $playerData['first_name'],
                        'last_name' => $playerData['last_name'],
                    ],
                    [
                        'position' => $playerData['position'],
                        'cost_cents' => $playerData['cost_cents'],
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
