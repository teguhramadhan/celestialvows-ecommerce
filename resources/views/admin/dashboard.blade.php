<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white w-full flex justify-center items-center py-12 mt-6 rounded shadow">
            <p class="text-lg text-gray-700">
                Selamat datang, kamu login sebagai
                <span class="text-emerald-600 font-bold">{{ Auth::user()->name }}</span>.
            </p>
        </div>
    </div>
</x-app-layout>
