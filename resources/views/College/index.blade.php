@extends('Layout.layout')

@section('title', 'College List')

@section('css')

@endsection

@section('content')

    <div class="flex justify-between items-center mb-2">
        <h1 class="text-3xl font-semibold mb-2">College List</h1>
        <a href="{{ route('colleges.create') }}" class="btn text-white bg-blue-600 rounded p-2">Add College</a>
    </div>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300 text-left text-sm">
            <thead>
            <tr class="bg-gray-100">
                <th class="border-b border-gray-300 px-4 py-2">College</th>
                <th class="border-b border-gray-300 px-4 py-2">Date Added</th>
                <th class="border-b border-gray-300 px-4 py-2">Date Updated</th>
                <th class="border-b border-gray-300 px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($colleges as $college)
                <tr class="hover:bg-gray-100">
                    <td class="border-b border-gray-300 px-4 py-2">{{ $college->college }}</td>
                    <td class="border-b border-gray-300 px-5 py-2">{{ $college->created_at?->format('F j, Y g:i a')  }}</td>
                    <td class="border-b border-gray-300 px-5 py-2">{{ $college->updated_at?->format('F j, Y g:i a')
                    }}</td>

                    <td class="border-b border-gray-300 px-4 py-2 flex space-x-2">
                        <a href="{{ route('colleges.show', $college->id) }}" class="text-blue-600
                        hover:underline">View</a>
                        <a href="{{ route('colleges.edit', $college->id) }}" class="text-yellow-600
                        hover:underline">Edit</a>
                        <a href="{{ route('colleges.confirm', $college->id) }}" class="text-red-600
                        hover:underline">Delete</a>
                    </td>
                </tr>
            @empty
                <tr class="p-2">
                    <td colspan="2" class="text-center p-2">No College Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        {{-- js goes here --}}
    </script>
@endsection
