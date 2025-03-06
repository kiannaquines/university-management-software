<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('students.store') }}">
                        @method('POST')
                        @csrf
                        <div class="w-full max-w-sm min-w-[200px]">
                            <label for="firstname" class="text-gray-500 text-sm">Firstname</label>
                            <input
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="firstname" id="firstname" placeholder="Firstname...">

                            <label for="lastname" class="text-gray-500 text-sm">Lastname</label>
                            <input
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="lastname" id="lastname" placeholder="Lastname...">

                            <label for="middlename" class="text-gray-500 text-sm">Middlename</label>
                            <input
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="middlename" id="middlename" placeholder="Middlename...">

                            <label for="age" class="text-gray-500 text-sm">Age</label>
                            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border
            border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none
            focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2" type="number" name="age"
                                   id="age"
                                   placeholder="Age...">

                            <label for="address" class="text-gray-500 text-sm">Permanent Address</label>
                            <textarea
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="address" id="address" placeholder="Address"></textarea>

                            <label for="gender" class="text-gray-500 text-sm">Gender</label>
                            <select
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                            <label for="extension" class="text-gray-500 text-sm">Extension</label>
                            <select
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="extension" id="extension">
                                <option value="">None.</option>
                                <option value="Jr">Jr.</option>
                                <option value="Sr">Sr.</option>
                            </select>

                            <label for="student_id" class="text-gray-500 text-sm">Student ID</label>
                            <input
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2"
                                name="student_id" id="student_id" placeholder="Student ID">
                            <input type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3"
                                   value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
