<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    public function start($examId)
    {
        $exam = Exam::find($examId);
        $questions = Question::where('exam_id', $examId)->get();
        return view('exams.start', compact('exam', 'questions'));
    }

    public function submit(Request $request, $examId)
    {
        $studentId = auth()->id();

        // prevent multiple submissions
        if (Answer::where('student_id', $studentId)->where('exam_id', $examId)->exists()) {
            return redirect()->route('exams.index')->with('error', 'You already submitted this exam!');
        }

        foreach ($request->answers as $questionId => $selected) {
            Answer::create([
                'student_id' => $studentId,
                'exam_id' => $examId,
                'question_id' => $questionId,
                'selected_option' => $selected,
            ]);
        }

        return redirect()->route('exams.scorecard', $examId);
    }

    public function scorecard($examId)
    {
        $studentId = auth()->id();
        $answers = Answer::where('student_id', $studentId)->get();
        $questions = Question::where('exam_id', $examId)->get();

        $total = $questions->count();
        $correct = 0;

        foreach ($answers as $ans) {
            $question = $questions->firstWhere('_id', $ans->question_id);
            if ($question && $question->correct_answer == $ans->selected_option) {
                $correct++;
            }
        }
        $wrong = $total - $correct;
        $score = ($correct / $total) * 100;

        return view('exams.scorecard', compact('total', 'correct', 'wrong', 'score'));
    }

    public function allScores()
    {
        $studentId = auth()->id();

        // सभी answers fetch करें
        $answers = Answer::where('student_id', $studentId)->get();

        // अलग-अलग exams
        $examScores = [];

        foreach ($answers->groupBy('exam_id') as $examId => $examAnswers) {
            $exam = Exam::find($examId);
            $questions = Question::where('exam_id', $examId)->get();
            $total = $questions->count();
            $correct = 0;

            foreach ($examAnswers as $ans) {
                $question = $questions->firstWhere('_id', $ans->question_id);
                if ($question && $question->correct_answer == $ans->selected_option) {
                    $correct++;
                }
            }

            $score = ($total > 0) ? round(($correct / $total) * 100, 2) : 0;

            $examScores[] = [
                'exam_name' => $exam->name,
                'total' => $total,
                'correct' => $correct,
                'wrong' => $total - $correct,
                'score' => $score,
            ];
        }
        return view('exams.all_scores', compact('examScores'));
    }
}
