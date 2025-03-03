@extends('Layout.layout')

@section('title', $student->firstname . ' Information')
@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <div class="student-information mb-2">
        <h1>Show Student</h1>
        <h4>Firstname: {{ $student->fullname  }}</h4>
        <h4>Address: {{ $student->address  }}</h4>
        <h4>Gender: {{ $student->gender  }}</h4>
        <h4>Student ID: {{ $student->student_id  }}</h4>
    </div>

    <a href="{{ route('students.index')  }}" class="bg-blue-600 text-white rounded p-2 mt-2">Back</a>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
