<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Profile;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
    Student::factory(10)->create();
    Course::factory(10)->create();
    Enrollment::factory(10)->create();

    User::factory(10)->create()->each(function ($user) {
        $user->profile()->create(
            Profile::factory()->make()->toArray()
            );
        });
    }
}