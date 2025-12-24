<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job; // 모델 이름이 JobPost라면 JobPost로 변경
use Illuminate\Support\Facades\File;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 팩토리로 랜덤 작업 200개 생성 (문제 조건)
        Job::factory()->count(200)->create(); //

        // 2. JSON 파일 읽어서 기본 작업 추가
        $json = File::get(database_path('seeders/jobs.json'));
        $jobs = json_decode($json, true);

        foreach ($jobs as $job) {
            Job::create([
                'title' => $job['title'],
                'company' => $job['company'],
                'description' => $job['description'],
                'location' => $job['location'],
                'type' => $job['type'],
                'salary' => $job['salary'],
                'application_deadline' => $job['application_deadline'], // 날짜 형식 주의
            ]);
        }
    }
}