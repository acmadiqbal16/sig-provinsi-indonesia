<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
      <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Peta Tematik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="http://localhost:8000/">Tentang</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost:8000/Guru">Peta Tematik Guru</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/Sekolah">Peta Tematik Sekolah</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/KepulauanSeribu">Peta Tematik Populasi</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/gempa">Peta Distribusi Gempa</a></li>
                        </ul>
                    </li>
                    <!-- Admin -->
                    <li class="nav-item"><a class="nav-link" href="http://localhost:8000/provinsi#">Provinsi</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost:8000/kabkota#">Kabupaten</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost:8000/admin/login">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <Main>
     <div>
        <div>
            <div>
                <section>
                    <div class="hero-container">
                        <!-- Bagian Teks -->
                        <div class="hero">
                            <h1>Peta Provinsi DKI Jakarta</h1>
                            <p>Peta Tematik ini dirancang untuk menampilkan data terkait wilayah Jakarta dengan fokus pada tema populasi, jumlah guru, dan jumlah sekolah. Selain itu, peta ini juga menyajikan titik marker untuk setiap provinsi di Indonesia, yang dilengkapi dengan pop-up informasi seperti luas wilayah, kepadatan penduduk, dan jumlah suku yang ada di 38 provinsi.</p>
                            <p>Peta ini tidak hanya mencakup informasi administratif hingga tingkat kabupaten/kota, tetapi juga menyajikan peta terbaru mengenai kejadian gempa yang bersumber langsung dari BMKG. Dengan integrasi data yang akurat dan terkini, peta ini menjadi alat yang berguna untuk penelitian, perencanaan pembangunan, serta memperluas wawasan tentang berbagai potensi yang dimiliki oleh setiap wilayah di Indonesia.</p>
                            <button style="background-color:#004085;color:#ffffff;padding:0.75rem 1.5rem;border-radius:0.5rem;border:none;cursor:pointer">
                                Get Started
                            </button>

                        </div>

                        <!-- Bagian Gambar -->
                        <div class="hero-img">
                            <img src="{{ asset('img/photo2.jpg') }}" alt="Photo 1">
                        </div>
                    </div>
                </section>
            </div>
        </div>
        </div>
    </Main>
       
    <section class="landing-section">
            <div class="box">
                <img src="{{ asset('img/jakarta1.jpg') }}" alt="Foto di Tengah">
            </div>
     </section>

    <Main>
        <div>
            <div>
                <section id="tentang">
                    <div class="title text-center">
                        <h1 class="my-3 text-3x1 font-bold">Tim Pengembang</h1>
                    </div>
                    <div class="card-container">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/photo5.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Achmad Iqbal</h5>
                                <h6 class="card-title">Frontend Developer</h6>
                                <p class="card-text">Mengembangkan antarmuka pengguna yang interaktif dengan menggunakan HTML, CSS, dan JavaScript. Fokus pada tampilan dan interaksi yang responsif serta pengalaman pengguna yang menyenangkan.</p>
                            </div>
                            <div class="card-body">
                            <a href="https://www.instagram.com" class="card-link" target="_blank">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="https://github.com" class="card-link" target="_blank">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/photo6.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Kamiliya Latifah Prasmaisya </h5>
                                <h6 class="card-title">Back-End Developer</h6>
                                <p class="card-text">Mengelola server, basis data, dan API untuk memastikan aplikasi berfungsi dengan baik di balik layar. Menyediakan data dan logika yang mendukung antarmuka pengguna.</p>
                            </div>
                            <div class="card-body">
                            <a href="https://www.instagram.com" class="card-link" target="_blank">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="https://github.com" class="card-link" target="_blank">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/photo7.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Muhamad Yusuf Samputra</h5>
                                <h6 class="card-title">UI/UX Developer</h6>
                                <p class="card-text">Mendesain pengalaman pengguna yang intuitif dan estetis. UI fokus pada tampilan antarmuka, sementara UX memastikan navigasi dan interaksi yang efisien dan mudah dipahami.</p>
                            </div>
                            <div class="card-body">
                            <a href="https://www.instagram.com" class="card-link" target="_blank">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="https://github.com" class="card-link" target="_blank">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </Main>

       



    <footer>
        <p>&copy; 2025 Peta Gempa Bumi. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Leaflet.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>