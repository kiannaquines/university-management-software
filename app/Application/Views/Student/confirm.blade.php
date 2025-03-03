@extends('Layout.layout')

@section('title', 'Confirm Removal')

@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <h1 class="mb-2">Are you sure you want to remove <b>{{ $student->fullname }}</b>?</h1>
    <a href="{{ route('students.destroy', $student->student_id) }}" class="bg-red-600 p-2 text-white
    rounded">Remove</a>
    <a href="{{ route('students.index') }}" class="bg-blue-600 p-2 text-white
    rounded">Cancel</a>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
