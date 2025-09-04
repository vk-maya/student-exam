@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">Available Exams</h2>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            @if ($exams->count() > 0)
                @foreach ($exams as $exam)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $exam->name }}</h5>
                                <p class="card-text">{{ $exam->description }}</p>
                                <a href="{{ route('exams.start', $exam->_id) }}" class="btn btn-primary">Start
                                    Exam</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No exams available at the moment.</p>
            @endif
        </div>
    </div>
@endsection
