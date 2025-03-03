@extends('Layout.layout')

@section('title', 'Confirm Removal')

@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <h1 class="mb-2">Are you sure you want to remove <b>{{ $student->fullname }}</b>?</h1>
    <form method="POST" action="{{ route('students.destroy', $student->student_id) }}">
        @method('DELETE')
        @csrf
        <input type="submit" class="bg-red-600 p-2 text-white rounded cursor-pointer" value="Confirm">
        <button type="button" onclick="history.back()" class="bg-blue-600 p-2 text-white
        rounded cursor-pointer">Cancel</button>
    </form>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
