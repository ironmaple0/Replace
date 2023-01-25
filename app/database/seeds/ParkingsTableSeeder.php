<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parkings')->insert([
            'user_id' => 1,
            'address' => '東京都世田谷区',
            'number' => 1,
            'size' => '普通車',
            'term' => '1ヶ月',
            'Start_date' => Carbon::now()->format('Y-m-d'),
            'picture_id' => 1,
            'memo' => '1ヶ月5000円で考えています。',
            'status' => 0,
            'partner_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
