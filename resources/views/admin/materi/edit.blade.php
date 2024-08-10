<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        <a href="#!" onclick="window.history.go(-1); return false;">
          ←
        </a>
        {!! __('Materi &raquo; Sunting &raquo; #') . $materi->id . ' &middot; ' . $materi->judul !!}
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
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif
          <form class="w-full" action="{{ route('admin.materi.update', $materi->id) }}" method="post">
            @csrf
            @method('put')

            <!-- Bagian Judul Materi -->
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="judul">
                  Judul*
                </label>
                <input value="{{ old('judul', $materi->judul) }}" name="judul"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="judul" type="text" placeholder="Judul" required>
                <div class="mt-2 text-sm text-gray-500">
                  Judul Materi. Contoh: Kalkulus, Logaritma, dsb. Wajib diisi. Maksimal 255 karakter.
                </div>
              </div>
            </div>

            <!-- Bagian Kursus -->
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="kursus_id">
                  Kursus*
                </label>
                <select class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        name="kursus_id" id="kursus_id" required>
                  <option value="{{ $materi->kursus_id }}" selected>{{ $materi->kursus->name }}</option>
                  <option disabled>------</option>
                  @foreach ($kursus as $kursusItem)
                    <option value="{{ $kursusItem->id }}">{{ $kursusItem->name }}</option>
                  @endforeach
                </select>
                <div class="mt-2 text-sm text-gray-500">
                  Judul Kursus. Contoh: Matematika. Wajib diisi.
                </div>
              </div>
            </div>

            <!-- Bagian Deskripsi -->
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="deskripsi">
                  Deskripsi
                </label>
                <input value="{{ old('deskripsi', $materi->deskripsi) }}" name="deskripsi"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="deskripsi" type="text" placeholder="Deskripsi">
                <div class="mt-2 text-sm text-gray-500">
                  Deskripsi. Opsional. Maksimal 1000 karakter.
                </div>
              </div>
            </div>

            <!-- Bagian Link Embed Materi -->
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="link_embed_materi">
                  Link Embed Materi
                </label>
                @foreach($links as $index => $link)
                    <input value="{{ old('link_embed_materi.' . $index, $link) }}" name="link_embed_materi[]"
                          class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                          id="link_embed_materi_{{ $index }}" type="url" placeholder="https://contoh.com/video">
                @endforeach
                <div class="mt-2 text-sm text-gray-500">
                  Link embed materi. Lebih dari satu link dapat diinput. Opsional.
                </div>
              </div>
            </div>


            <!-- Tombol Simpan -->
            <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3 text-right">
                <button type="submit"
                        class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                  Simpan Materi
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>
