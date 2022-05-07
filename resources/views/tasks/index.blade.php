<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href={{ route('tasks.create') }} type="button"
                    class="focus:outline-none text-gray-600 text-sm py-2.5 px-5 rounded-full border border-gray-600 hover:border-white hover:bg-indigo-400 hover:text-white transition-all duration-300 ease-linear">New
                    Task</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        @if (count($tasks) < 1)
                            <h3 class="text-lg w-full text-center">There are no Tasks</h3>
                        @else
                        <div class="flex-grow overflow-auto">
                            <table class="relative w-full border table-fixed">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Name</th>
                                        <th class="px-6 py-3 w-1/2 text-gray-900 bg-gray-100">Priority</th>
                                        <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="px-6 py-4 text-left">
                                                <h2 class="font-bold">{{ $task->title }}</h2>
                                                <span class="text-sm font-light text-gray-400">Updated
                                                    {{ $task->created_at }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-center">{{ $task->priority }}</td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="inline-flex focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}"
                                                    method="POST" class="inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>