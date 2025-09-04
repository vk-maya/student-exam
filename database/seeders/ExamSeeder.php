<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam1 = Exam::create([
            'name' => 'Math Exam',
            'description' => 'Basic Math Test'
        ]);

        $exam2 = Exam::create([
            'name' => 'Science Exam',
            'description' => 'General Science Test'
        ]);

        Question::insert([
            [
                'exam_id' => $exam1->_id,
                'question_text' => '2+2=?',
                'options' => ['3', '4', '5', '6'],
                'correct_answer' => '4',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => '5*3=?',
                'options' => ['15', '20', '25', '10'],
                'correct_answer' => '15',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => '2 + 2 = ?',
                'options' => ['3', '4', '5', '6'],
                'correct_answer' => '4',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => '5 * 3 = ?',
                'options' => ['15', '20', '25', '10'],
                'correct_answer' => '15',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => '10 / 2 = ?',
                'options' => ['2', '3', '4', '5'],
                'correct_answer' => '5',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Square root of 81 = ?',
                'options' => ['7', '8', '9', '10'],
                'correct_answer' => '9',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Which is the largest planet in our Solar System?',
                'options' => ['Earth', 'Jupiter', 'Mars', 'Saturn'],
                'correct_answer' => 'Jupiter',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Who is known as the "Father of Computers"?',
                'options' => ['Alan Turing', 'Charles Babbage', 'Bill Gates', 'Steve Jobs'],
                'correct_answer' => 'Charles Babbage',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'What is the capital of France?',
                'options' => ['London', 'Paris', 'Rome', 'Berlin'],
                'correct_answer' => 'Paris',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Which gas do plants release during photosynthesis?',
                'options' => ['Oxygen', 'Carbon dioxide', 'Nitrogen', 'Hydrogen'],
                'correct_answer' => 'Oxygen',
            ],
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Which language is used for web apps?',
                'options' => ['Python', 'PHP', 'JavaScript', 'All of these'],
                'correct_answer' => 'All of these',
            ],              
            [
                'exam_id' => $exam1->_id,
                'question_text' => 'Which country is called the Land of Rising Sun?',
                'options' => ['China', 'Japan', 'India', 'Thailand'],
                'correct_answer' => 'Japan',
            ],
            [
                'exam_id' => $exam2->_id,
                'question_text' => 'What is the chemical symbol for water?',
                'options' => ['O2', 'H2O', 'CO2', 'HO'],
                'correct_answer' => 'H2O',
            ],
            [
                'exam_id' => $exam2->_id,
                'question_text' => 'What planet is known as the Red Planet?',
                'options' => ['Earth', 'Mars', 'Jupiter', 'Venus'],
                'correct_answer' => 'Mars',
            ],
            [
                'exam_id' => $exam2->_id,
                'question_text' => 'Which gas do plants absorb from the atmosphere?',
                'options' => ['Oxygen', 'Nitrogen', 'Carbon Dioxide', 'Hydrogen'],
                'correct_answer' => 'Carbon Dioxide',
            ],
            [
                'exam_id' => $exam2->_id,
                'question_text' => 'What is the boiling point of water at sea level?',
                'options' => ['90°C', '100°C', '120°C', '80°C'],
                'correct_answer' => '100°C',
            ],
            [
                'exam_id' => $exam2->_id,
                'question_text' => 'What force keeps us on the ground?',
                'options' => ['Magnetism', 'Friction', 'Gravity', 'Inertia'],
                'correct_answer' => 'Gravity',
            ],
        ]);
    }
}
