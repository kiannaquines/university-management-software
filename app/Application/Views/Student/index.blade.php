@extends('Layout.layout')

@section('title', 'Student List')

@section('css')

@endsection

@section('content')

    <div class="flex justify-between items-center mb-2">
        <h1 class="text-3xl font-semibold mb-2">Student List</h1>
        <a href="{{ route('students.create') }}" class="btn text-white bg-blue-600 rounded p-2">Add New Student</a>
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

    @if ($students->isEmpty())
        <p class="text-gray-500">No students found.</p>
    @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 text-left text-sm">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border-b border-gray-300 px-4 py-2">ID</th>
                    <th class="border-b border-gray-300 px-4 py-2">Student ID</th>
                    <th class="border-b border-gray-300 px-4 py-2">Name</th>
                    <th class="border-b border-gray-300 px-4 py-2">Gender</th>
                    <th class="border-b border-gray-300 px-4 py-2">Age</th>
                    <th class="border-b border-gray-300 px-4 py-2">Address</th>
                    <th class="border-b border-gray-300 px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr class="hover:bg-gray-100">
                        <td class="border-b border-gray-300 px-4 py-2">{{ $student->id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $student->student_id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">
                            {{ $student->firstname }}
                            {{ $student->middlename ? $student->middlename . ' ' : '' }}
                            {{ $student->lastname }}
                            {{ $student->extension ? $student->extension : '' }}
                        </td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ ucfirst($student->gender) }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $student->age }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $student->address }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 flex space-x-2">
                            <a href="{{ route('students.show', $student->id) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

@section('js')
    <script>
        {{-- js goes here --}}
    </script>
@endsection
