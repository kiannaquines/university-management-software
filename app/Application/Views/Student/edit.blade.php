@extends('Layout.layout')

@section('title', 'Edit Student Information')

@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <form method="POST" action="{{ route('students.update', $student->student_id) }}">
        @method('PUT')
        @csrf
        <h3 class="text-2xl font-semibold mb-2">Edit Student Information</h3>
        <div class="w-full max-w-sm min-w-[200px]">
            <input type="hidden" name="id" value="{{ $student->id }}">
            <label for="firstname" class="text-gray-500 text-sm">Firstname</label>
            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="firstname"
                   id="firstname" value="{{ $student->firstname }}" placeholder="Firstname...">
            <label for="lastname" class="text-gray-500 text-sm">Lastname</label>
            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="lastname" id="lastname"
                   value="{{ $student->lastname  }}" placeholder="Lastname...">

            <label for="middlename" class="text-gray-500 text-sm">Middlename</label>
            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="middlename"
                   id="middlename" value="{{ $student->middlename }}" placeholder="Middlename...">

            <label for="age" class="text-gray-500 text-sm">Age</label>
            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" type="number" name="age"
                   id="age" value="{{ $student->age }}"
                   placeholder="Age...">

            <label for="address" class="text-gray-500 text-sm">Permanent Address</label>
            <textarea class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="address" id="address"
                      placeholder="Address">{{ $student->address }}</textarea>

            <label for="gender" class="text-gray-500 text-sm">Gender</label>
            <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="gender" id="gender">
                <option value="Male" @if($student->gender === 'Male') selected @endif>Male</option>
                <option value="Female" @if($student->gender === 'Female') selected @endif>Female</option>
            </select>

            <label for="extension" class="text-gray-500 text-sm">Extension</label>
            <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="extension" id="extension">
                <option value="" @if($student->extension === 'None') selected @endif>None.</option>
                <option value="Jr" @if($student->extension === 'Jr') selected @endif>Jr.</option>
                <option value="Sr" @if($student->extension === 'Sr') selected @endif>Sr.</option>
            </select>

            <label for="student_id" class="text-gray-500 text-sm">Student ID</label>
            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="student_id"
                   id="student_id" value="{{ $student->student_id }}" placeholder="Student ID" readonly>
            <input type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3" value="Submit">
        </div>
    </form>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
