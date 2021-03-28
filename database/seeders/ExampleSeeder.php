<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Tracker;
use App\Models\Location;
use App\Models\Race;
use App\Models\Racer;
use App\Models\TrackerMovement;
use App\Models\Flag;

class ExampleSeeder extends Seeder
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
            'name' => 'Эверест',
            'latitude' => 27.988056,
            'longitude' => 86.925278,
            'zoom_index' => 12,
        ];
        $race_data = [
            'title' => 'Отслеживание Эвереста',
            'started_at' => '2021-03-11 14:30:00',
            'duration' => 120,
        ];
        $location = Location::factory(1)->create($location_data)->first();
        $race = Race::factory(1)->create(
            array_merge(
                $race_data,
                ['location_id' => $location->id],
            )
        )->first();

        // STEP 2 - RACER
        $racer_tracker_data = ['color_hex' => 'ff0000'];
        $racer_data = ['name' => 'test'];
        $racer_movements = [
            [
                'latitude' => 27.981056,
                'longitude' =>  86.895278,
                'altitude' => 6500,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:01',
            ],
            [
                'latitude' => 27.981,
                'longitude' =>  86.892,
                'altitude' => 6400,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:03',
            ],
            [
                'latitude' => 27.983,
                'longitude' => 86.887,
                'altitude' => 6400,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:05',
            ],
            [
                'latitude' => 27.983,
                'longitude' =>  86.881,
                'altitude' => 6200,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:07',
            ],
            [
                'latitude' => 27.995,
                'longitude' =>  86.875,
                'altitude' => 5900,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:09',
            ],
            [
                'latitude' => 27.999,
                'longitude' =>  86.865,
                'altitude' => 5500,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:11',
            ],
            [
                'latitude' => 27.999,
                'longitude' =>  86.86,
                'altitude' => 5300,
                'battery' => 80,
                'speed' => 200,
                'bearing' => 160,
                'generated_at' => '2021-03-11 14:30:13',
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
        $flag_1_tracker_data = ['color_hex' => 'd28900'];
        $flag_2_tracker_data = ['color_hex' => '00d219'];

        $flag_1_data = [
            'label' => 'Старт',
            'type' => 'start',
        ];
        $flag_2_data = [
            'label' => 'Финиш',
            'type' => 'finish',
        ];

        $flag_1_movement = [
            'latitude' => 27.981056,
            'longitude' =>  86.895478,
            'altitude' => 6500,
            'battery' => 100,
            'speed' => 0,
            'bearing' => 0,
            'generated_at' => '2021-03-11 14:30:00',
        ];

        $flag_2_movement = [
            'latitude' => 27.99925,
            'longitude' =>  86.858,
            'altitude' => 5300,
            'battery' => 80,
            'speed' => 0,
            'bearing' => 0,
            'generated_at' => '2021-03-11 14:30:00',
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
