<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
                'id' => 1,
                'name' => '山田太郎',
                'email' => 'test@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
            [
                'id' => 2,
                'name' => '阿部礼二',
                'email' => 'test2@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
            [
                'id' => 3,
                'name' => '松岡修三',
                'email' => 'test3@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
            [
                'id' => 4,
                'name' => 'ロジャー・フェデラー',
                'email' => 'test4@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
            [
                'id' => 5,
                'name' => 'ジョン・マッケンロー',
                'email' => 'test5@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
            [
                'id' => 6,
                'name' => 'ベン・テニスン',
                'email' => 'test6@test.com',
                'password' => 'password',
                'is_wanting' => false,
                'url' => '',
            ],
        ];

        foreach ($dataSet as $data) {
            User::create($data);
        }
    }
}