<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Flash dikit -->
                    @if(session('success'))
                        <div id="successMessage" class="mb-3 bg-pink-300 text-white p-3 rounded mt-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Start of Modal-->
                        <!-- Overlay -->
                        <div id="modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm z-40"></div>

                        <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="mb-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Tambah
                    </button>


                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
                        <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow-sm dark:bg-gray-700">

                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Projek Baru
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Modal body -->
                                <form method="POST" action="{{ route('store') }}" class="p-4 md:p-5">
                                    @csrf
                                    @method('POST')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                📌 Name
                                            </label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketik Nama Project" required>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                🚦 Status
                                            </label>
                                            <select name="status" id="status" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option disabled selected="">Pilih Status</option>
                                                <option value="Archived">❓ Archived</option>
                                                <option value="Pending">⏳ Pending</option>
                                                <option value="Published">✅ Published</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                📂 Kategori
                                            </label>
                                            <select name="category" id="category" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option  disabled selected="">Pilih Kategori</option>
                                                <option value="Desktop">🖥️ Desktop</option>
                                                <option value="Website">🌍 Website</option>
                                                <option value="Mobile">📱 Mobile</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                📝 Deskripsi Projek
                                            </label>
                                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                      placeholder="Ketik Deskripsi Projek di sini" required></textarea>
                                        </div>
                                    </div>
                                        <div class="flex space-x-3">
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Simpan
                                            </button>
                                            <button type="button" id="cancelButton" class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                                Cancel
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End of Modal-->

                    <!-- Start of Table-->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Project
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $projects as $project )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <span class="inline-flex items-center justify-center gap-2 px-4 py-1 text-sm font-medium border rounded-full shadow-sm bg-blue-100 text-blue-700 border-blue-300 min-w-[150px] text-center">
                                                {{ $project->name }}
                                            </span>
                                        </th>

                                        <td class="px-6 py-4">
                                            @php
                                                $categories = [
                                                    'Desktop' => ['🖥️', 'bg-blue-100 text-blue-700 border-blue-300'],
                                                    'Website' => ['🌍', 'bg-purple-100 text-purple-700 border-purple-300'],
                                                    'Mobile' => ['📱', 'bg-pink-100 text-pink-700 border-pink-300'],
                                                ];
                                                $category = $categories[$project->category] ?? ['❓', 'bg-gray-100 text-gray-700 border-gray-300'];
                                            @endphp

                                            <span class="inline-flex items-center gap-2 px-3 py-1 text-sm font-medium border rounded-full shadow-sm {{ $category[1] }}">
                                                {{ $category[0] }} {{ $project->category }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $statuses = [
                                                    'Published' => ['✅', 'bg-green-100 text-green-700 border-green-300'],
                                                    'Pending' => ['⏳', 'bg-yellow-100 text-yellow-700 border-yellow-300'],
                                                    'Draft' => ['📝', 'bg-gray-100 text-gray-700 border-gray-300'],
                                                ];
                                                $status = $statuses[$project->status] ?? ['❓', 'bg-red-100 text-red-700 border-red-300'];
                                            @endphp

                                            <span class="inline-flex items-center gap-2 px-3 py-1 text-sm font-medium border rounded-full shadow-sm {{ $status[1] }}">
                                                {{ $status[0] }} {{ $project->status }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center justify-center gap-2 px-4 py-1 text-sm font-medium border rounded-full shadow-sm bg-purple-100 text-purple-700 border-purple-300 min-w-[200px] text-center">
                                                {{ $project->description }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-center"> <!-- Gunakan text-center untuk mengatur tombol di tengah -->
                                            <div class="flex justify-center space-x-2"> <!-- Gunakan justify-center untuk memastikan tombol ada di tengah -->
                                                <!-- Delete Button -->
                                                <form action="{{ route('destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus project ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Delete
                                                    </button>
                                                </form>
                                                <!-- Edit Button -->
                                                <a href="{{ route('edit', $project->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                    <!-- End of Table-->

                    <!-- Modal Konfirmasi Pembatalan -->
                    <div id="confirmCancelModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden dark:bg-gray-700 dark:bg-opacity-60 z-50">
                        <div class="relative p-4 w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Konfirmasi Pembatalan</h3>
                            <p class="text-gray-700 dark:text-gray-300">Apakah Anda yakin ingin membatalkan? Semua data yang belum disimpan akan hilang.</p>
                            <div class="mt-4 flex justify-end">
                                <button id="cancelConfirmButton" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded mr-2">Batal</button>
                                <button id="confirmCancelButton" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Ya, Batalkan</button>
                            </div>
                        </div>
                    </div>
                    <!-- End ofModal Konfirmasi Pembatalan -->

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Modal toggle
            const modalToggleButtons = document.querySelectorAll("[data-modal-toggle='crud-modal']");
            const modal = document.getElementById("crud-modal");
            const overlay = document.getElementById("modal-overlay");

            modalToggleButtons.forEach(button => {
                button.addEventListener("click", function () {
                    modal.classList.toggle("hidden");
                    overlay.classList.toggle("hidden");
                });
            });

            // Tutup modal saat overlay diklik
            overlay.addEventListener("click", function () {
                modal.classList.add("hidden");
                overlay.classList.add("hidden");
            });

            // Flash success message otomatis menghilang setelah 3 detik
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.transition = "opacity 0.5s ease";
                    successMessage.style.opacity = "0";
                    setTimeout(function() {
                        successMessage.style.display = "none";
                    }, 500); // Tunggu animasi selesai sebelum menghapus elemen
                }
            }, 3000); // 3000 ms = 3 detik
        });

        let isFormDirty = false;

        // Menandai form sebagai dirty jika ada perubahan
        const projectForm = document.querySelector('form[action="{{ route('store') }}"]');
        projectForm.addEventListener('input', () => {
            isFormDirty = true;
        });

        // Tampilkan modal konfirmasi jika ada perubahan
        document.getElementById('cancelButton').addEventListener('click', () => {
            if (isFormDirty) {
                document.getElementById('confirmCancelModal').classList.remove('hidden');
            } else {
                closeProjectModal();
            }
        });

        // Konfirmasi pembatalan
        document.getElementById('confirmCancelButton').addEventListener('click', () => {
            closeProjectModal();
            document.getElementById('confirmCancelModal').classList.add('hidden');
        });

        // Batal menutup modal konfirmasi
        document.getElementById('cancelConfirmButton').addEventListener('click', () => {
            document.getElementById('confirmCancelModal').classList.add('hidden');
        });

        function closeProjectModal() {
            document.getElementById('crud-modal').classList.add('hidden');
            document.getElementById('modal-overlay').classList.add('hidden');
            projectForm.reset();
            isFormDirty = false;
        }

        document.getElementById('cancelButton').addEventListener('click', function () {
        if (isFormDirty) {
            document.getElementById('confirmCancelModal').classList.remove('hidden');
        } else {
            document.getElementById('crud-modal').classList.add('hidden');
            document.getElementById('modal-overlay').classList.add('hidden');
        }
        });

        // Jika user konfirmasi batal
        document.getElementById('confirmCancelButton').addEventListener('click', function () {
            document.getElementById('crud-modal').classList.add('hidden');
            document.getElementById('modal-overlay').classList.add('hidden');
            document.getElementById('confirmCancelModal').classList.add('hidden');
            document.getElementById('createTodoForm').reset(); // Reset form
            isFormDirty = false;
        });

        // Jika user membatalkan konfirmasi
        document.getElementById('cancelConfirmButton').addEventListener('click', function () {
            document.getElementById('confirmCancelModal').classList.add('hidden');
        });
    </script>


</x-app-layout>
