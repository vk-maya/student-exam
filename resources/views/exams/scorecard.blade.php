@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Exam Result</h3>
        <p>Total Questions: {{ $total }}</p>
        <p>Correct Answers: {{ $correct }}</p>
        <p>Wrong Answers: {{ $wrong }}</p>
        <p>Score: {{ $score }}%</p>
        <a href="{{ route('dashboard') }}" class="btn btn-success">Back to Dashboard</a>
    </div>
@endsection
