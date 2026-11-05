<?php
$movies = [
    [
        "title" => "Dune: Part Two",
        "quality" => "HD",
        "rating" => "8.8",
        "year" => "2024",
        "genre" => "Sci-Fi",
        "image" => "https://image.tmdb.org/t/p/w500/xOMo8BRK7PfcJv9JCnx7s5hj0PX.jpg",
        "backdrop" => "https://image.tmdb.org/t/p/original/xOMo8BRK7PfcJv9JCnx7s5hj0PX.jpg"
    ],
    [
        "title" => "Kung Fu Panda 4",
        "quality" => "CAM",
        "rating" => "7.5",
        "year" => "2024",
        "genre" => "Animasi",
        "image" => "https://image.tmdb.org/t/p/w500/kDp1vUBnMpe8ak4rjgl3cLELqjU.jpg",
        "backdrop" => "https://image.tmdb.org/t/p/original/1ZNOOMmILNUzVYbzG1j7GYb5bEV.jpg"
    ],
    [
        "title" => "Godzilla x Kong",
        "quality" => "HD",
        "rating" => "7.2",
        "year" => "2024",
        "genre" => "Aksi",
        "image" => "https://image.tmdb.org/t/p/w500/z1p34vh7dEOnLDmyCrlUVLuoDzd.jpg",
        "backdrop" => "https://image.tmdb.org/t/p/original/j3Z3XktmWB1VhsS8iXNcrR86PXi.jpg"
    ],
    [
        "title" => "Oppenheimer",
        "quality" => "HD",
        "rating" => "8.9",
        "year" => "2023",
        "genre" => "Drama",
        "image" => "https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg",
        "backdrop" => "https://image.tmdb.org/t/p/original/fm6KqXpk3M2wi3DipgTn9T9Lq4i.jpg"
    ]
];
$featuredMovie = $movies[0];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#09090b">
    <meta name="description" content="Temukan rekomendasi film pilihan di CRACKLIX.">
    <title>CRACKLIX — Temukan Film Favoritmu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <a class="logo" href="#home" aria-label="CRACKLIX Beranda">CRACK<span>LIX</span></a>
        <nav class="primary-nav" aria-label="Navigasi utama">
            <ul>
                <li><a class="active" href="#home">Beranda</a></li>
                <li><a href="#movies">Koleksi</a></li>
                <li><a href="#genres">Genre</a></li>
            </ul>
        </nav>
        <form class="search-box" role="search">
            <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path></svg>
            <input type="search" id="searchInput" placeholder="Cari film..." aria-label="Cari judul atau genre film">
            <kbd>/</kbd>
        </form>
    </header>

    <main id="home">
        <section class="hero" aria-labelledby="hero-title" style="--hero-image: url('<?= htmlspecialchars($featuredMovie['backdrop'], ENT_QUOTES, 'UTF-8') ?>')">
            <div class="hero-content">
                <p class="eyebrow"><span class="eyebrow-dot"></span> Pilihan editor <span class="eyebrow-divider">/</span> Film unggulan</p>
                <h1 id="hero-title">Dune: <span>Part Two</span></h1>
                <div class="hero-meta">
                    <span class="hero-rating"><span aria-hidden="true">★</span> <?= htmlspecialchars($featuredMovie['rating'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><?= htmlspecialchars($featuredMovie['year'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><?= htmlspecialchars($featuredMovie['genre'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="quality-pill"><?= htmlspecialchars($featuredMovie['quality'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <p class="hero-description">Perjalanan Paul Atreides berlanjut di Arrakis. Bergabung dengan Chani dan Fremen, ia menghadapi pilihan yang akan menentukan masa depan semesta.</p>
                <a class="primary-button" href="#movies"><span aria-hidden="true">▶</span> Jelajahi film</a>
            </div>
            <div class="hero-pagination" aria-hidden="true"><span class="current"></span><span></span><span></span><span></span></div>
            <span class="hero-index" aria-hidden="true">01 <span>/</span> 04</span>
        </section>

        <section class="catalog-section" id="movies" aria-labelledby="movies-title">
            <div class="section-heading">
                <div>
                    <p class="section-kicker">Pilih tontonanmu</p>
                    <h2 id="movies-title">Sedang ramai <span>ditonton</span></h2>
                </div>
                <a class="text-link" href="#movies">Jelajahi koleksi <span aria-hidden="true">↗</span></a>
            </div>

            <div class="genre-list" id="genres" aria-label="Filter genre">
                <button class="genre-chip active" type="button" data-genre="all" aria-pressed="true">Semua</button>
                <button class="genre-chip" type="button" data-genre="Sci-Fi" aria-pressed="false">Sci-Fi</button>
                <button class="genre-chip" type="button" data-genre="Aksi" aria-pressed="false">Aksi</button>
                <button class="genre-chip" type="button" data-genre="Animasi" aria-pressed="false">Animasi</button>
                <button class="genre-chip" type="button" data-genre="Drama" aria-pressed="false">Drama</button>
            </div>

            <div class="movie-grid" id="movieGrid">
                <?php foreach ($movies as $index => $movie): ?>
                    <?php
                    $title = htmlspecialchars($movie['title'], ENT_QUOTES, 'UTF-8');
                    $genre = htmlspecialchars($movie['genre'], ENT_QUOTES, 'UTF-8');
                    ?>
                    <article class="movie-card" data-genre="<?= $genre ?>" style="--card-index: <?= (int) $index ?>">
                        <div class="movie-poster">
                            <img src="<?= htmlspecialchars($movie['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Poster <?= $title ?>" loading="lazy">
                            <div class="poster-shade"></div>
                            <span class="quality"><?= htmlspecialchars($movie['quality'], ENT_QUOTES, 'UTF-8') ?></span>
                            <span class="rating"><span aria-hidden="true">★</span> <?= htmlspecialchars($movie['rating'], ENT_QUOTES, 'UTF-8') ?></span>
                            <span class="poster-play" aria-hidden="true">▶</span>
                        </div>
                        <div class="movie-info">
                            <div class="movie-title-row">
                                <h3 class="movie-title"><?= $title ?></h3>
                                <span class="movie-year"><?= htmlspecialchars($movie['year'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <p class="movie-genre"><?= $genre ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="empty-state" id="emptyState" hidden>Tidak ada film yang cocok. Coba kata kunci atau genre lain.</p>
        </section>
    </main>

    <nav class="mobile-nav" aria-label="Navigasi bawah">
        <a class="active" href="#home"><span aria-hidden="true">⌂</span>Beranda</a>
        <a href="#movies"><span aria-hidden="true">▦</span>Film</a>
        <a href="#genres"><span aria-hidden="true">⌕</span>Genre</a>
        <button class="mobile-search" id="mobileSearch" type="button"><span aria-hidden="true">⌕</span>Cari</button>
    </nav>

    <script src="script.js"></script>
</body>
</html>