<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        foreach (range(1,100) as $index)
        {
            $gender=$faker->randomElement(['male','female']);
            $age=$faker->numberBetween(1,20);
            \App\Cat::create([
                'name'=>$faker->name($gender),
                'gender'=>$gender,
                'age'=>$age,
                'color'=>$faker->safeColorName,
                'about'=>$faker->realText(),
                'hometown'=>$faker->city,
                'registered'=>$faker->dateTimeBetween("-{$age} years","now")->format('Y-m-d')
            ]);
        }
    }
}
