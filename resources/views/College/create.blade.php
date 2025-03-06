@extends('Layout.layout')

@section('title', 'Create College')

@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <form method="POST" action="{{ route('colleges.store') }}">
        @method('POST')
        @csrf
        <h3 class="text-2xl font-semibold mb-2">Create College Information</h3>
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="address" class="text-gray-500 text-sm">College</label>
            <textarea class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="college" id="college"
                      placeholder="College"></textarea>
            <input type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3" value="Submit">
        </div>
    </form>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
