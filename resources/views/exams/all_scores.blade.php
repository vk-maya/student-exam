@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (count($examScores) > 0)
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Exam Name</th>
                                <th>Total Questions</th>
                                <th>Correct</th>
                                <th>Wrong</th>
                                <th>Score (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examScores as $index => $exam)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $exam['exam_name'] }}</td>
                                    <td>{{ $exam['total'] }}</td>
                                    <td>{{ $exam['correct'] }}</td>
                                    <td>{{ $exam['wrong'] }}</td>
                                    <td>{{ $exam['score'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No exam scores available.</p>
                @endif

            </div>

        </div>
    </div>
@endsection
