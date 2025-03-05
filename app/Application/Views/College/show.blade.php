@extends('Layout.layout')

@section('title', 'College Information')
@section('css')
    {{-- css goes here --}}
@endsection

@section('content')
    <div class="college-information mb-2">
        <h3 class="text-2xl font-semibold mb-2" >Show College</h3>
        <h4><b>College:</b> {{ $college->college  }}</h4>
        <h4><b>Created At:</b> {{ $college->created_at?->format('F j, Y g:i a') }}</h4>
        <h4><b>Update At:</b> {{ $college->updated_at?->format('F j, Y g:i a') }}</h4>
    </div>

    <a href="{{ route('colleges.index')  }}" class="bg-blue-600 text-white rounded p-2 mt-2 cursor-pointer">Back</a>
@endsection

@section('js')
    {{-- js goes here --}}
@endsection
