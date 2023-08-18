<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Channel;


class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for($i=0; $i<=20; $i++){
            Channel::create([
                'ChannelID'=>$i+1,
                'ChannelName'=>$faker->word,
                'Description'=>$faker->sentence(5,true),
                'SubscribersCount'=>$faker->numberBetween(1, 20),
                'Url'=>$faker->Url,
            ]);
        }
    }
}
