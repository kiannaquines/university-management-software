<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="student-information mb-2">
                        <h4>Department: {{ $department->department  }}</h4>
                        <h4>Department Description: {{ $department->department_description  }}</h4>
                        <h4>Created At: {{ $department->created_at?->format('F j, Y g:i a') }}</h4>
                        <h4>Update At: {{ $department->updated_at?->format('F j, Y g:i a') }}</h4>
                    </div>

                    <a href="{{ route('department.index')  }}" class="bg-blue-600 text-white rounded p-2 mt-2
                    cursor-pointer">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
