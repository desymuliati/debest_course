<x-app-layout>
    <x-slot name="title">Landing Page</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Kursus Terbaru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($kursus as $kursusItem)
                    <div class="p-4 border rounded-lg shadow-md bg-white">
                        <h3 class="text-lg font-semibold">{{ $kursusItem->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $kursusItem->description }}</p>
                        <a href="{{ route('kursus.show', $kursusItem->id) }}" class="mt-2 text-blue-500 hover:underline">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
