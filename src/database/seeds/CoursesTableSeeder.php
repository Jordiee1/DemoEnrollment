<?php

use App\Course;
use App\Discipline;
use App\Institution;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $courses = [
            [
                'name' => 'กิจกรรมจิตอาสา',
                'description' => $faker->paragraph,
                'institution_id' => 1,
                'price' => 'Free'
            ],
            [
                'name' => 'กิจกรรมให้ความรู้',
                'description' => $faker->paragraph,
                'institution_id' => 2,
                'price' => null
            ],
            [
                'name' => 'การแข่งขัน',
                'description' => $faker->paragraph,
                'institution_id' => 3,
                'price' => 'ตามประเภทการแข่งขัน'
            ],
        ];

        foreach($courses as $id=>$courses)
        {
            $id++;
            $course = Course::create($courses);
            $course->addMedia(public_path("img/course/course_$id.png"))->preservingOriginal()->toMediaCollection('photo');
            $course->disciplines()->sync([$id]);
        }
    }
}
