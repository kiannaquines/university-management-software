@extends('Layouts.layout')

@section('title', $student->firstname . ' Information')
@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <div class="student-information mb-2">
        <h3 class="text-2xl font-semibold mb-2">Show Student</h3>
        <h4><b>Firstname:</b> {{ $student->firstname  }}</h4>
        <h4><b>Address:</b> {{ $student->address  }}</h4>
        <h4><b>Gender:</b> {{ $student->gender  }}</h4>
        <h4><b>Student ID:</b> {{ $student->student_id  }}</h4>
        <h4><b>Created At:</b> {{ $student->created_at?->format('F j, Y g:i a') }}</h4>
        <h4><b>Update At:</b> {{ $student->updated_at?->format('F j, Y g:i a') }}</h4>
    </div>

    <a href="{{ route('students.index')  }}" class="bg-blue-600 text-white rounded p-2 mt-2 cursor-pointer">Back</a>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
