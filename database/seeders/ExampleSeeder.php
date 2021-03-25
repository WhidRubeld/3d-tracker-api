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
        $tracker_data = [
            'password' => '123123123',
            'color_hex' => 'FF0000',
            'description' => 'Test',
        ];

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

        $racer_data = [
            'name' => 'test',
        ];

        // 27.981056, 86.895278, 6500
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
        ];

        $tracker = Tracker::factory(1)->create($tracker_data)->first();

        $location = Location::factory(1)->create($location_data)->first();

        $race = Race::factory(1)->create(
            array_merge(
                $race_data,
                ['location_id' => $location->id],
            )
        )->first();

        Racer::factory(1)->create(
            array_merge(
                $racer_data,
                ['tracker_id' => $tracker->id, 'race_id' => $race->id]
            )
        );

        foreach ($racer_movements as $movement) {
            TrackerMovement::factory(1)->create(array_merge(
                $movement,
                ['tracker_id' => $tracker->id],
            ));
        }
    }
}
