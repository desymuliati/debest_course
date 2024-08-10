<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        <a href="#!" onclick="window.history.go(-1); return false;">
          ←
        </a>
        {!! __('Kursus &raquo; Buat') !!}
      </h2>
    </x-slot>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          @if ($errors->any())
            <div class="mb-5" role="alert">
              <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                Ada kesalahan!
              </div>
              <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                <p>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                </p>
              </div>
            </div>
          @endif
          <form class="w-full" action="{{ route('admin.kursus.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="judul">
                  Judul*
                </label>
                <input value="{{ old('judul') }}" name="judul"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="judul" type="text" placeholder="Judul Kursus" required>
                <div class="mt-2 text-sm text-gray-500">
                  Judul kursus. Contoh: Matematika, Bahasa Inggris. Wajib diisi. Maksimal 255 karakter.
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="deskripsi">
                  Deskripsi
                </label>
                <textarea name="deskripsi" id="deskripsi"
                          class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                          placeholder="Deskripsi Kursus">{{ old('deskripsi') }}</textarea>
                <div class="mt-2 text-sm text-gray-500">
                  Deskripsi kursus. Opsional. Maksimal 1000 karakter.
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="durasi">
                  Durasi (dalam jam)*
                </label>
                <input value="{{ old('durasi') }}" name="durasi"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="durasi" type="number" placeholder="Durasi Kursus (jam)" required>
                <div class="mt-2 text-sm text-gray-500">
                  Durasi kursus dalam jam. Misalnya: 3, 10, 24. Wajib diisi.
                </div>
              </div>
            </div>

            <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3 text-right">
                <button type="submit"
                        class="px-4 py-2 font-bold text-white bg-indigo-500 rounded shadow-lg hover:bg-blue-800">
                    Simpan Kursus
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </x-app-layout>
