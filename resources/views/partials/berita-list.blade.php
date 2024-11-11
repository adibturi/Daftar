@foreach($berita as $item)
    <div class="news-item">
        <img src="{{ asset('storage/gambar_berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
        <div class="news-details">
            <h3>{{ $item->judul }}</h3>
            <p>{{ Str::limit($item->konten, 100) }}</p>
            <a href="#" class="read-more">Baca Selengkapnya</a>
        </div>
    </div>
@endforeach
