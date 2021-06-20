<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Tracker;
use App\Models\Location;
use App\Models\Race;
use App\Models\Racer;
use App\Models\TrackerMovement;
use App\Models\Flag;

class Example2Seeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // STEP 1 - RACE
        $location_data = [
            'name' => 'Colorado River',
            'latitude' => 36.2058,
            'longitude' => -112.443,
            'zoom_index' => 14,
        ];
        $race_data = [
            'title' => 'Colorado River Racing #1',
            'started_at' => '2021-06-20 14:00:00',
            'duration' => 20,
        ];
        $location = Location::factory(1)->create($location_data)->first();
        $race = Race::factory(1)->create(
            array_merge(
                $race_data,
                ['location_id' => $location->id],
            )
        )->first();

        // STEP 2 - RACER 1
        $racer_tracker_data = ['color_hex' => '52bff6'];
        $racer_data = ['name' => 'Первый участник'];
        $racer_movements = [
            [
                'latitude' => 36.2168,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 94,
                'speed' => 13,
                'bearing' => 110,
                'generated_at' => '2021-06-20 14:00:00',
            ],
            [
                'latitude' => 36.2162,
                'longitude' =>  -112.4565,
                'altitude' => 705,
                'battery' => 93,
                'speed' => 173,
                'bearing' => 128,
                'generated_at' => '2021-06-20 14:00:01',
            ],
            [
                'latitude' => 36.2157,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 93,
                'speed' => 156,
                'bearing' => 120,
                'generated_at' => '2021-06-20 14:00:02',
            ],
            [
                'latitude' => 36.2151,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 92,
                'speed' => 156,
                'bearing' => 210,
                'generated_at' => '2021-06-20 14:00:03',
            ],
            [
                'latitude' => 36.2145,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 92,
                'speed' => 170,
                'bearing' => 147,
                'generated_at' => '2021-06-20 14:00:04',
            ],
            [
                'latitude' => 36.2140,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 92,
                'speed' => 56,
                'bearing' => 94,
                'generated_at' => '2021-06-20 14:00:05',
            ],
            [
                'latitude' => 36.2134,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 92,
                'speed' => 98,
                'bearing' => 113,
                'generated_at' => '2021-06-20 14:00:06',
            ],
            [
                'latitude' => 36.2129,
                'longitude' =>  -112.456,
                'altitude' => 700,
                'battery' => 92,
                'speed' => 160,
                'bearing' => 160,
                'generated_at' => '2021-06-20 14:00:07',
            ],
            [
                'latitude' => 36.2125,
                'longitude' =>  -112.456,
                'altitude' => 660,
                'battery' => 92,
                'speed' => 120,
                'bearing' => 24,
                'generated_at' => '2021-06-20 14:00:08',
            ],
            [
                'latitude' => 36.2121,
                'longitude' =>  -112.455,
                'altitude' => 650,
                'battery' => 92,
                'speed' => 98,
                'bearing' => 78,
                'generated_at' => '2021-06-20 14:00:09',
            ],
            [
                'latitude' => 36.2119,
                'longitude' =>  -112.4545,
                'altitude' => 665,
                'battery' => 92,
                'speed' => 116,
                'bearing' => 140,
                'generated_at' => '2021-06-20 14:00:10',
            ],
            [
                'latitude' => 36.2121,
                'longitude' =>  -112.4545,
                'altitude' => 670,
                'battery' => 92,
                'speed' => 146,
                'bearing' => 113,
                'generated_at' => '2021-06-20 14:00:11',
            ],
            [
                'latitude' => 36.2114,
                'longitude' => -112.4545,
                'altitude' => 700,
                'battery' => 91,
                'speed' => 154,
                'bearing' => 144,
                'generated_at' => '2021-06-20 14:00:12',
            ],
            [
                'latitude' => 36.2109,
                'longitude' =>  -112.4540,
                'altitude' => 700,
                'battery' => 91,
                'speed' => 100,
                'bearing' => 175,
                'generated_at' => '2021-06-20 14:00:13',
            ],
            [
                'latitude' => 36.2096,
                'longitude' =>  -112.4540,
                'altitude' => 700,
                'battery' => 91,
                'speed' => 97,
                'bearing' => 113,
                'generated_at' => '2021-06-20 14:00:14',
            ],
            [
                'latitude' => 36.2085,
                'longitude' =>  -112.4546,
                'altitude' => 690,
                'battery' => 90,
                'speed' => 112,
                'bearing' => 113,
                'generated_at' => '2021-06-20 14:00:15',
            ],
            [
                'latitude' => 36.2064,
                'longitude' =>  -112.4545,
                'altitude' => 685,
                'battery' => 90,
                'speed' => 140,
                'bearing' => 133,
                'generated_at' => '2021-06-20 14:00:16',
            ],
            [
                'latitude' => 36.2058,
                'longitude' =>  -112.4547,
                'altitude' => 680,
                'battery' => 90,
                'speed' => 139,
                'bearing' => 24,
                'generated_at' => '2021-06-20 14:00:17',
            ],
            [
                'latitude' => 36.2052,
                'longitude' =>  -112.4542,
                'altitude' => 690,
                'battery' => 89,
                'speed' => 137,
                'bearing' => 70,
                'generated_at' => '2021-06-20 14:00:18',
            ],
            [
                'latitude' => 36.2046,
                'longitude' =>  -112.4543,
                'altitude' => 690,
                'battery' => 88,
                'speed' => 120,
                'bearing' => 13,
                'generated_at' => '2021-06-20 14:00:19',
            ],
            [
                'latitude' => 36.2037,
                'longitude' =>  -112.4545,
                'altitude' => 685,
                'battery' => 88,
                'speed' => 122,
                'bearing' => 26,
                'generated_at' => '2021-06-20 14:00:20',
            ],
        ];

        $racer_tracker = Tracker::factory(1)->create($racer_tracker_data)->first();

        Racer::factory(1)->create(
            array_merge(
                $racer_data,
                ['tracker_id' => $racer_tracker->id, 'race_id' => $race->id]
            )
        );

        foreach ($racer_movements as $movement) {
            TrackerMovement::factory(1)->create(array_merge(
                $movement,
                ['tracker_id' => $racer_tracker->id],
            ));
        }

        // STEP 3 - RACER 2
        $racer_tracker_data = ['color_hex' => 'f68752'];
        $racer_data = ['name' => 'Второй участник'];
        $racer_movements = [
            [
                'latitude' => 36.2169,
                'longitude' =>  -112.452,
                'altitude' => 715,
                'battery' => 98,
                'speed' => 142,
                'bearing' => 120,
                'generated_at' => '2021-06-20 14:00:00',
            ],
            [
                'latitude' => 36.2163,
                'longitude' =>  -112.451,
                'altitude' => 750,
                'battery' => 98,
                'speed' => 120,
                'bearing' => 140,
                'generated_at' => '2021-06-20 14:00:01',
            ],
            [
                'latitude' => 36.2156,
                'longitude' =>  -112.452,
                'altitude' => 730,
                'battery' => 97,
                'speed' => 118,
                'bearing' => 0,
                'generated_at' => '2021-06-20 14:00:02',
            ],
            [
                'latitude' => 36.2151,
                'longitude' =>  -112.4515,
                'altitude' => 710,
                'battery' => 97,
                'speed' => 94,
                'bearing' => 25,
                'generated_at' => '2021-06-20 14:00:03',
            ],
            [
                'latitude' => 36.2147,
                'longitude' =>  -112.4522,
                'altitude' => 710,
                'battery' => 96,
                'speed' => 50,
                'bearing' => 17,
                'generated_at' => '2021-06-20 14:00:04',
            ],
            [
                'latitude' => 36.2142,
                'longitude' =>  -112.4527,
                'altitude' => 710,
                'battery' => 95,
                'speed' => 75,
                'bearing' => 90,
                'generated_at' => '2021-06-20 14:00:05',
            ],
            [
                'latitude' => 36.2136,
                'longitude' =>  -112.4534,
                'altitude' => 710,
                'battery' => 95,
                'speed' => 98,
                'bearing' => 67,
                'generated_at' => '2021-06-20 14:00:06',
            ],
            [
                'latitude' => 36.2132,
                'longitude' =>  -112.4535,
                'altitude' => 710,
                'battery' => 95,
                'speed' => 130,
                'bearing' => 10,
                'generated_at' => '2021-06-20 14:00:07',
            ],
            [
                'latitude' => 36.2128,
                'longitude' =>  -112.4534,
                'altitude' => 710,
                'battery' => 94,
                'speed' => 120,
                'bearing' => 156,
                'generated_at' => '2021-06-20 14:00:08',
            ],
            [
                'latitude' => 36.2121,
                'longitude' =>  -112.4532,
                'altitude' => 710,
                'battery' => 94,
                'speed' => 118,
                'bearing' => 27,
                'generated_at' => '2021-06-20 14:00:09',
            ],
            [
                'latitude' => 36.2116,
                'longitude' =>  -112.4537,
                'altitude' => 710,
                'battery' => 93,
                'speed' => 123,
                'bearing' => 39,
                'generated_at' => '2021-06-20 14:00:10',
            ],
            [
                'latitude' => 36.2109,
                'longitude' =>  -112.4541,
                'altitude' => 710,
                'battery' => 93,
                'speed' => 170,
                'bearing' => 71,
                'generated_at' => '2021-06-20 14:00:11',
            ],
            [
                'latitude' => 36.2095,
                'longitude' =>  -112.4543,
                'altitude' => 710,
                'battery' => 93,
                'speed' => 174,
                'bearing' => 78,
                'generated_at' => '2021-06-20 14:00:12',
            ],
            [
                'latitude' => 36.2088,
                'longitude' =>  -112.4545,
                'altitude' => 710,
                'battery' => 92,
                'speed' => 120,
                'bearing' => 4,
                'generated_at' => '2021-06-20 14:00:13',
            ],
            [
                'latitude' => 36.2081,
                'longitude' =>  -112.4545,
                'altitude' => 710,
                'battery' => 92,
                'speed' => 124,
                'bearing' => 27,
                'generated_at' => '2021-06-20 14:00:14',
            ],
            [
                'latitude' => 36.2072,
                'longitude' =>  -112.4546,
                'altitude' => 710,
                'battery' => 91,
                'speed' => 137,
                'bearing' => 165,
                'generated_at' => '2021-06-20 14:00:15',
            ],
            [
                'latitude' => 36.2065,
                'longitude' =>  -112.4542,
                'altitude' => 710,
                'battery' => 91,
                'speed' => 140,
                'bearing' => 110,
                'generated_at' => '2021-06-20 14:00:16',
            ],
            [
                'latitude' => 36.2060,
                'longitude' =>  -112.4544,
                'altitude' => 710,
                'battery' => 90,
                'speed' => 110,
                'bearing' => 58,
                'generated_at' => '2021-06-20 14:00:17',
            ],
            [
                'latitude' => 36.2053,
                'longitude' =>  -112.4543,
                'altitude' => 710,
                'battery' => 89,
                'speed' => 120,
                'bearing' => 12,
                'generated_at' => '2021-06-20 14:00:18',
            ],
            [
                'latitude' => 36.2046,
                'longitude' =>  -112.4543,
                'altitude' => 710,
                'battery' => 89,
                'speed' => 97,
                'bearing' => 120,
                'generated_at' => '2021-06-20 14:00:19',
            ],
            [
                'latitude' => 36.2039,
                'longitude' =>  -112.4545,
                'altitude' => 710,
                'battery' => 89,
                'speed' => 134,
                'bearing' => 79,
                'generated_at' => '2021-06-20 14:00:20',
            ],
        ];

        $racer_tracker = Tracker::factory(1)->create($racer_tracker_data)->first();

        Racer::factory(1)->create(
            array_merge(
                $racer_data,
                ['tracker_id' => $racer_tracker->id, 'race_id' => $race->id]
            )
        );

        foreach ($racer_movements as $movement) {
            TrackerMovement::factory(1)->create(array_merge(
                $movement,
                ['tracker_id' => $racer_tracker->id],
            ));
        }

        // STEP 3 - FLAGS
        $flag_1_tracker_data = ['color_hex' => 'fed560'];
        $flag_2_tracker_data = ['color_hex' => '54e01a'];

        $flag_1_data = [
            'label' => 'Старт',
            'type' => 'start',
        ];
        $flag_2_data = [
            'label' => 'Финиш',
            'type' => 'finish',
        ];

        $flag_1_movement = [
            'latitude' => 36.2169,
            'longitude' =>  -112.453,
            'altitude' => 700,
            'battery' => 100,
            'speed' => 0,
            'bearing' => 0,
            'generated_at' => '2021-06-20 14:00:00',
        ];

        $flag_2_movement = [
            'latitude' => 36.2028,
            'longitude' =>  -112.4575,
            'altitude' => 700,
            'battery' => 100,
            'speed' => 0,
            'bearing' => 0,
            'generated_at' => '2021-06-20 14:00:00',
        ];

        $flag_1_tracker = Tracker::factory(1)->create($flag_1_tracker_data)->first();
        $flag_2_tracker = Tracker::factory(1)->create($flag_2_tracker_data)->first();

        Flag::factory(1)->create(
            array_merge(
                $flag_1_data,
                ['tracker_id' => $flag_1_tracker->id, 'race_id' => $race->id]
            )
        );
        Flag::factory(1)->create(
            array_merge(
                $flag_2_data,
                ['tracker_id' => $flag_2_tracker->id, 'race_id' => $race->id]
            )
        );

        TrackerMovement::factory(1)->create(array_merge(
            $flag_1_movement,
            ['tracker_id' => $flag_1_tracker->id],
        ));
        TrackerMovement::factory(1)->create(array_merge(
            $flag_2_movement,
            ['tracker_id' => $flag_2_tracker->id],
        ));
    }
}
