<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Provinsi</title>

    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        /* Styling untuk Navbar agar sticky */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1100;
            background-color: #004085;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            color: #343a40;
            margin-top: 20px;
        }

        h3 {
            font-size: 1.5rem;
            text-align: center;
            color: #6c757d;
        }

        #map {
            width: 100%;
            height: 600px;
            border-radius: 15px;
            margin-top: 20px;
        }
        .info-text {
            text-align: center;
            font-size: 1.1rem;
            color: #343a40;
            margin-top: 20px;
            margin-bottom: 100px;
        }


        /* Styling untuk tabel */
        #provinsiTable {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            text-align: center;
            padding: 10px;
            border: 1px solid #dee2e6;
        }
        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        /* Footer styling */
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
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Peta Provinsi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="http://localhost:8000/">Tentang</a></li>
                    <!-- Menu Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost:8000/Guru">Peta Tematik Guru</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/Sekolah">Peta Tematik Sekolah</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/KepulauanSeribu">Peta Tematik Populasi</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/gempa">Peta Distribusi Gempa</a></li>
                        </ul>
                    </li>
                    <!-- Admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/provinsi#">Provinsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/kabkota#">Kabupaten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/admin/login">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Kontainer utama -->
    <div class="container">
        <h1>Peta Provinsi Indonesia</h1>
        <h3>Sumber: Database Provinsi Indonesia, Menampilkan Data Provinsi secara Interaktif</h3>

        <!-- Map container -->
        <div id="map"></div>
        <!-- Teks Penjelasan -->
<div class="info-text">
    <p>Informasi Provinsi: Peta ini memberikan gambaran lengkap tentang seluruh provinsi di Indonesia, dengan fokus pada data geospasial yang penting untuk analisis dan pemetaan wilayah. Setiap titik pada peta menunjukkan lokasi provinsi yang diikuti dengan informasi geografis lainnya seperti koordinat (latitude dan longitude), jumlah penduduk, luas wilayah, kepadatan penduduk, serta berbagai data demografis lainnya yang relevan. Dengan menggunakan peta ini, pengguna dapat melihat secara visual distribusi provinsi-provinsi di Indonesia beserta atribut penting yang mendukung pengambilan keputusan di berbagai bidang, seperti perencanaan wilayah, pembangunan, dan penelitian.</p>
    <p>Proyek ini bertujuan untuk memberikan alat bantu visual yang berguna bagi pemerintahan, pengambil keputusan, dan masyarakat umum untuk memahami lebih dalam tentang karakteristik setiap provinsi di Indonesia. Peta ini diintegrasikan dengan teknologi web dan menggunakan sumber data terbuka yang dapat diakses secara bebas. Dengan peta interaktif ini, pengguna dapat lebih mudah mengakses informasi terkini tentang kondisi provinsi secara langsung dan detail.</p>
    <p>Untuk informasi lebih lanjut mengenai data provinsi atau cara membaca informasi yang ditampilkan di peta ini, kunjungi <a href="https://www.indonesia.go.id/" target="_blank">Portal Indonesia</a> atau akses data dari berbagai sumber resmi lainnya.</p>
</div>


        <!-- Tabel Provinsi -->
        <div id="provinsiTable" class="table-responsive">
            <h3>Data Provinsi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Provinsi</th>
                        <th>Kota</th>
                        <th>Luas Wilayah</th>
                        <th>Populasi</th>
                        <th>Kepadatan</th>
                        <th>Jumlah Suku</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Data Provinsi akan dimasukkan di sini -->
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            // Inisialisasi peta dengan posisi awal
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);

            // Menambahkan layer peta menggunakan OpenStreetMap
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 10,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Mengambil data provinsi dari server
            var provinsiData = @json($provinsi);

            // Menambahkan marker untuk setiap provinsi dan data ke tabel
            provinsiData.forEach(function(provinsi) {
                var lat = provinsi.latitude;
                var lng = provinsi.longitude;
                var popupContent = ` 
                    <b>Nama Provinsi:</b> ${provinsi.name}<br>
                    <b>Kota:</b> ${provinsi.kota}<br>
                    <b>Luas Wilayah:</b> ${provinsi.luas_wilayah} km²<br>
                    <b>Populasi:</b> ${provinsi.populasi}<br>
                    <b>Kepadatan:</b> ${provinsi.kepadatan} jiwa<br>
                    <b>Jumlah Suku:</b> ${provinsi.jumlah_suku}
                `;

                // Menambahkan marker dan popup untuk setiap provinsi
                L.marker([lat, lng]).addTo(map)
                    .bindPopup(popupContent);

                // Menambahkan data ke tabel
                var tableRow = ` 
                    <tr>
                        <td>${provinsi.name}</td>
                        <td>${provinsi.kota}</td>
                        <td>${provinsi.luas_wilayah}</td>
                        <td>${provinsi.populasi}</td>
                        <td>${provinsi.kepadatan}</td>
                        <td>${provinsi.jumlah_suku}</td>
                    </tr>
                `;
                document.getElementById('tableBody').innerHTML += tableRow;
            });
        </script>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Provinsi Indonesia. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Bootstrap. <br> Peta ini menyediakan data provinsi Indonesia untuk keperluan visualisasi dan analisis. </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
