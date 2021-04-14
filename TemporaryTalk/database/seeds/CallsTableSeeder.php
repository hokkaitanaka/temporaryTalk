<?php

use Illuminate\Database\Seeder;
use App\Models\Call;

class CallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'user_id' => 2,
            ],
        ];

        foreach ($dataSet as $data) {
            Call::create($data);
        }
    }
}
