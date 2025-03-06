<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Instructor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="student-information mb-2">
                        <h4>Firstname: {{ $instructor->fullname }}</h4>
                        <h4>Employee ID: {{ $instructor->employee_id  }}</h4>
                        <h4>Created At: {{ $instructor->created_at?->format('F j, Y g:i a') }}</h4>
                        <h4>Update At: {{ $instructor->updated_at?->format('F j, Y g:i a') }}</h4>
                    </div>

                    <a href="{{ route('instructor.index')  }}" class="bg-blue-600 text-white rounded p-2 mt-2
                    cursor-pointer">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
