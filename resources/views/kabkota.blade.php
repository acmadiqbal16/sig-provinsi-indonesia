<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kabupaten/Kota</title>

    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <style>
        /* Styling untuk Navbar agar sticky */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000; /* Agar navbar selalu di atas */
            background-color: #004085;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important; /* Teks putih */
        }
        .navbar .nav-link:hover {
            color: #f8f9fa; /* Warna teks saat hover menjadi putih */
        }
        /* Menambahkan jarak antara navbar dan kontainer */
        .container {
            margin-top: 30px;
        }
        #map { 
            height: 600px; 
            width: 100%; 
            margin: 0 auto; 
            border-radius: 10px; 
        }
        /* Styling untuk teks penjelasan */
        .info-text {
            text-align: center;
            font-size: 1.1rem;
            color: #343a40;
            margin-top: 20px;
            margin-bottom: 100px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #343a40;
            margin-top: 20px;
        }
        h3 {
            font-size: 1.2rem;
            text-align: center;
            color: #6c757d;
        }
        footer {
            background-color: #004085;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Peta Kabkota</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- Menghapus Home -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost:8000/provinsi#">Peta Provinsi</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/kabkota#">Peta Kabupaten/kota</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/gempa#">Peta Gempa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/admin/login">Admin</a> <!-- Admin tetap putih -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Kontainer utama -->
    <div class="container">
        <h1>Peta Kabupaten/Kota</h1>
        <h3>Data Kabupaten/Kota di Indonesia</h3>

        <!-- Peta -->
        <div id="map"></div>
        <!-- Teks Penjelasan -->
<div class="info-text">
    <p>Informasi Kabupaten/Kota: Peta ini menyediakan informasi lengkap tentang lokasi dan data kabupaten/kota yang ada di Indonesia. Setiap titik pada peta menunjukkan kabupaten atau kota, disertai dengan informasi geografis yang mencakup koordinat (latitude dan longitude), nama daerah, serta beberapa atribut penting seperti luas wilayah, jumlah penduduk, kepadatan penduduk, dan potensi wilayah lainnya. Peta ini bertujuan untuk memberikan pandangan visual yang mudah dipahami terkait sebaran kabupaten/kota di seluruh Indonesia, yang dapat digunakan untuk analisis perencanaan wilayah, pembangunan infrastruktur, serta berbagai kebutuhan lainnya.</p>
    <p>Proyek ini dirancang untuk mempermudah akses informasi geospasial yang dapat digunakan oleh pemerintah, peneliti, perencana kota, hingga masyarakat umum. Dengan menggunakan peta interaktif ini, pengguna dapat mengeksplorasi setiap kabupaten/kota secara detail, mempelajari karakteristik dan data demografis yang relevan, serta mengambil keputusan berbasis informasi yang lebih akurat dan terkini.</p>
    <p>Selain itu, peta ini mendukung berbagai kegiatan pemetaan dalam konteks pembangunan dan analisis sosial-ekonomi daerah. Dengan adanya peta ini, diharapkan dapat tercipta kesadaran yang lebih baik mengenai potensi dan tantangan yang ada di setiap kabupaten/kota di Indonesia. Untuk informasi lebih lanjut mengenai kabupaten/kota atau cara membaca data yang ada di peta, kunjungi <a href="https://www.indonesia.go.id/" target="_blank">Portal Indonesia</a> atau sumber data resmi lainnya.</p>
</div>


        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            // Inisialisasi peta
            var map = L.map('map').setView([-2.5, 117], 5); // Fokus ke Indonesia
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 10,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Data kabupaten/kota dari server
            var kabkotaData = @json($kabkota);

            // Tambahkan marker untuk setiap kabupaten/kota
            kabkotaData.forEach(function (kabkota) {
                var popupContent = ` 
                    <b>Nama:</b> ${kabkota.name}<br> 
                    <b>Latitude:</b> ${kabkota.latitude}<br> 
                    <b>Longitude:</b> ${kabkota.longitude}<br>
                `;
                L.marker([kabkota.latitude, kabkota.longitude]).addTo(map)
                    .bindPopup(popupContent);
            });
        </script>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Provinsi Indonesia. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Bootstrap.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
