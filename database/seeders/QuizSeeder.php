<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Quiz::create([
             'question' => "Do you have too many friends?",
             'answers' => json_encode(['a'=>'yes','b'=>'no']),
             'correct_answer' => "b",
             'question' => "Do you have any friends that you didn’t meet via work or school?",
             'answer' => json_encode(['a'=>'yes','b'=>'no']),
             'correct_answer' => "b",
             'question' => "Do you have any friends that you didn’t meet through your life partner or children?",
             'answer' => json_encode(['a'=>'yes','b'=>'no']),
             'correct_answer' => "b"
        ]);
    }
}
