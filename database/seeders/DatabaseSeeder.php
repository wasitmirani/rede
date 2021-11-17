<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        $quiz = [
            []
        ];
        DB::table('quizzes')->insert([
              [
                'question' => "Do you have too many friends?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "b"
              ],
              [
                'question' => "Do you have any friends that you didn’t meet via work or school?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "b",

              ],
              [
                'question' => "Do you have any friends that you didn’t meet through your life partner or children?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "b"
              ],
              [
                'question' => "	Are there things you’d like to do – games you’d like to play, sports you’d like to try, events you’d like to attend – that you can’t because you don’t know anyone who will do them with you?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => ""
              ],
              [
                'question' => "When you take chances or try new things, do you prefer to have a friend tag along?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Think back to when you met your friends? Were you doing some kind of activity together?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Have you ever done some fun (or not-so-fun) group event and found yourself making friends with the other participants?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Have you ever met a potential new friend but not known how to follow up?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Are you new to a city or job?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Did you recently get married or divorced or have children?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "	If you enjoy the same activities, would you be willing to spend time with someone of a different race/nationality/gender identity/etc.?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Do you feel like Americans are too divided and wish we could all find the common ground that is sure to exist among us?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Have you ever felt stress while using traditonal social media?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Have you ever tried to use a dating app to find companionship?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],
              [
                'question' => "Are you frustrated by superficial assumptions people make based on a brief glance at your photo, or felt that appearance is over-emphasized online?",
                'answers' => json_encode(['a'=>'yes','b'=>'no']),
                'correct_answer' => "a"
              ],






       ]);

    }
}
