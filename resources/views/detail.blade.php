<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $materi->judul }}</title>
    <!-- Tambahkan CSS dan JS sesuai kebutuhan -->
</head>
<body>
    <header>
        <h1>{{ $materi->judul }}</h1>
        <p>{{ $materi->deskripsi }}</p>
    </header>

    <section>
        <h2>Link Embed Materi</h2>
        @if($materi->link_embed_materi)
            @foreach(json_decode($materi->link_embed_materi, true) as $link)
                <div>
                    <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                </div>
            @endforeach
        @else
            <p>Belum ada link embed materi.</p>
        @endif
    </section>

    <footer>
        <!-- Tambahkan footer sesuai kebutuhan -->
    </footer>
</body>
</html>
