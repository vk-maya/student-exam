@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Available Exams</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach($exams as $exam)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $exam->name }}</h5>
                        <p class="card-text">{{ $exam->description }}</p>
                        <a href="{{ route('exams.start', $exam->_id) }}" class="btn btn-primary">Start Exam</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
