@extends('Layout.layout')

@section('title', 'Student List')

@section('css')
    <style>
        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .student-table th,
        .student-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .student-table th {
            background-color: #f4f4f4;
        }

        .student-table tr:hover {
            background-color: #f9f9f9;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
        }

        .success-message {
            color: green;
            margin: 10px 0;
        }

        .error-message {
            color: red;
            margin: 10px 0;
        }
    </style>
@endsection

@section('content')
    <h1>Student List</h1>

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
        <p>No students found.</p>
    @else
        <table class="student-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>
                        {{ $student->firstname }}
                        {{ $student->middlename ? $student->middlename . ' ' : '' }}
                        {{ $student->lastname }}
                        {{ $student->extension ? $student->extension : '' }}
                    </td>
                    <td>{{ ucfirst($student->gender) }}</td>
                    <td>{{ $student->age}}</td>
                    <td>{{ $student->address }}</td>
                    <td class="actions">
                        <a href="{{ route('student.show', $student->id) }}">View</a>
                        <a href="{{ route('student.edit', $student->id) }}">Edit</a>
                        <a href="{{ route('student.confirm', $student->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <div>
        <a href="{{ route('student.create') }}" class="btn">Add New Student</a>
    </div>
@endsection

@section('js')
    {{-- js goes here --}}
    <script>
        // You could add JavaScript here for additional interactivity if needed
    </script>
@endsection
