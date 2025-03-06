<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create College') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('colleges.store') }}">
                        @method('POST')
                        @csrf
                        <div class="w-full max-w-sm min-w-[200px]">
                            <label for="address" class="text-gray-500 text-sm">College</label>
                            <textarea class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" name="college" id="college"
                                      placeholder="College"></textarea>
                            <input type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3"
                                   value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

