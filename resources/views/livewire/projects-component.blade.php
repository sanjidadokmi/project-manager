<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="flex items-center p-4 mb-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm-1-12a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V6zm0 6a1 1 0 1 1 2 0 1 1 0 0 1-2 0z" />
                </svg>
                <div>
                    <span class="font-medium">Success!</span> {{ session('message') }}
                </div>
            </div>
        @endif
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{-- form --}}
                <form wire:submit="create"  class="space-y-4 mb-8">
                    <div>
                        <label for="project_name" class="block text-sm font-medium text-gray-700">Project
                            Name</label>
                        <input id="project_name" type="text" wire:model="project_name" name="project_name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('project_name')
                            <span class="text-red-700 ">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        <label for="project_description"
                            class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="project_description" wire:model="project_description" name="project_description" rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        @error('project_description')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-700 mb-2">Project Status:</legend>
                            <ul class="space-y-2">
                                @foreach ($statuses as $key => $label)
                                    <li class="flex items-center">
                                        <input id="{{ $key }}" name="status" type="radio"
                                            value="{{ $key }}"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="{{ $key }}"
                                            class="ml-2 text-sm font-medium text-gray-700">{{ $label }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </div>


                    <div>
                        <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Add Project
                        </button>
                    </div>
                </form>
                <table class="w-full mx-auto border-collapse ">
                    <thead class="bg-gray-50 border-b-2 border-gray-100  ">
                        <th class="p-3 text-sm font-semibold">Serial</th>
                        <th class="p-3 text-sm font-semibold">Projects Name</th>
                        <th class="p-3 text-sm font-semibold">Project Description</th>
                        <th class="p-3 text-sm font-semibold">Status</th>
                        <th class="p-3 text-sm font-semibold">Action</th>
                    </thead>
                    <tbody>
                        @if ($projects->count())
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="text-center p-3 text-sm text-gray-700 ">{{ $projects->count() }}</td>
                                    <td class="text-center p-3 text-sm text-gray-700 ">{{ $project->project_name }}
                                    </td>
                                    <td class="text-center p-3 text-sm text-gray-700 ">
                                        {{ $project->project_description }}</td>
                                    <td class="text-center p-3 text-sm text-gray-700 ">{{ $project->status }}</td>
                                    <td
                                        class="text-center p-3 text-sm text-gray-700 flex items-center justify-center ">
                                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No Projects Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- paginate links --}}
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>

