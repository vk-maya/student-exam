<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $exams = Exam::all();
        return view('dashboard', compact('exams'));
    }
}
