<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-xl font-semibold mb-4">Edit Project</h2>

                    <form method="POST" action="{{ route('update', $project->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" value="{{ $project->name }}" class="w-full p-2.5 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status" id="status" class="w-full p-2.5 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                <option value="Archived" {{ $project->status == 'Archived' ? 'selected' : '' }}>Archived</option>
                                <option value="Pending" {{ $project->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Published" {{ $project->status == 'Published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select name="category" id="category" class="w-full p-2.5 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                <option value="Desktop" {{ $project->category == 'Desktop' ? 'selected' : '' }}>Desktop</option>
                                <option value="Website" {{ $project->category == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Mobile" {{ $project->category == 'Mobile' ? 'selected' : '' }}>Mobile</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="w-full p-2.5 border rounded-lg dark:bg-gray-600 dark:text-white" required>{{ $project->description }}</textarea>
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update Project
                            </button>
                            <a href="{{ route('project') }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
