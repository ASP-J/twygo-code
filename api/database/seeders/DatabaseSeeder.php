<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $courses = Course::factory()->count(20)->create();

        foreach ($courses as $course) {
            $course->copyMedia(database_path('seeders/files/course_test.png'))
                ->usingFileName("course-image-$course->id.png")
                ->toMediaCollection('course_images');

            for ($i = 1; $i <= 10; $i++) {
                $video = Video::factory()->create([
                    'course_id' => $course->id,
                    'title' => "Video $i",
                    'description' => "Video teste $i"
                ]);

                $video->copyMedia(database_path('seeders/files/imagem_exemplo.png'))
                    ->usingFileName("video-image-$course->id-$i.png")
                    ->toMediaCollection('video_images');

                $video->copyMedia(database_path('seeders/files/video_exemplo.mp4'))
                    ->usingFileName("video-$course->id-$i.mp4")
                    ->toMediaCollection('video_files');
            }
        }
    }
}
