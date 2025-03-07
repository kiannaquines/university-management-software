<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-2">Are you sure you want to remove <b>{{ $instructor->firstname }} {{
                    $instructor->lastname }}</b>?</h1>
                    <form method="POST" action="{{ route('instructor.destroy', $instructor->id) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="bg-red-600 p-2 text-white rounded cursor-pointer" value="Confirm">
                        <button type="button" onclick="history.back()" class="bg-blue-600 p-2 text-white
        rounded cursor-pointer">Cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
