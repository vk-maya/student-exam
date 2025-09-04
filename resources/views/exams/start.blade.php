@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $exam->name }}</h3>
            </div>
            @if (count($questions) > 0)
                <div class="card-body">
                    <form method="POST" action="{{ route('exams.submit', $exam->_id) }}">
                        @csrf

                        @foreach ($questions as $index => $question)
                            <div class="mb-4 p-3 border rounded">
                                <p class="fw-bold">{{ $index + 1 }}. {{ $question->question_text }}</p>
                                @foreach ($question->options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->_id }}]"
                                            id="q{{ $question->_id }}_{{ $loop->index }}" value="{{ $option }}"
                                            required>
                                        <label class="form-check-label" for="q{{ $question->_id }}_{{ $loop->index }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success">
                            Submit Exam
                        </button>
                    </form>
                </div>
                @else
                <div class="text-center">

                    <h2>No Exams Available</h2>
                </div>
            @endif

        </div>
    </div>
@endsection
