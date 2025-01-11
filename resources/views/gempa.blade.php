<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Gempa Bumi</title>

    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        /* Styling untuk Navbar agar sticky */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000; /* Menjaga navbar tetap di atas */
            background-color: #004085; /* Biru Tua */
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important; /* Teks putih */
        }

        /* Styling untuk teks judul */
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

        /* Styling untuk peta */
        #map {
            height: 600px;
            width: 100%;
            margin-top: 20px; /* Menambahkan jarak setelah navbar */
            border-radius: 30px;
            margin-bottom: 50px;
        }

        /* Styling untuk teks penjelasan */
        .info-text {
            text-align: center;
            font-size: 1.1rem;
            color: #343a40;
            margin-top: 20px;
            margin-bottom: 100px;
        }

        /* Tabel Gempa */
        #gempaTable {
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
            background-color: #004085; /* Biru Tua */
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
            <a class="navbar-brand" href="#">Peta Gempa Bumi</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost:8000/provinsi#">Peta Provinsi</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/kabkota#">Peta Kabupaten/Kota</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8000/gempa#">Peta Gempa</a></li>
                        </ul>
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
        <h1>Distribusi Gempa Bumi di Indonesia</h1>
        <h3>Sumber data: <strong>BMKG</strong></h3>

        <!-- Peta -->
        <div id="map"></div>

        <!-- Teks Penjelasan -->
        <div class="info-text">
            <p>Informasi Gempa: Peta ini menunjukkan lokasi gempa bumi terkini yang tercatat oleh BMKG di Indonesia. 
            Kekuatan gempa diukur dalam Skala Richter (SR), dan setiap titik menunjukkan lokasi dengan kekuatan dan potensi tertentu.</p>
            <p>Untuk informasi lebih lanjut mengenai data gempa atau cara membaca informasi gempa, kunjungi <a href="https://www.bmkg.go.id/" target="_blank">BMKG</a>.</p>
        </div>

        <!-- Tabel Gempa -->
        <div id="gempaTable" class="table-responsive">
            <h3>Data Gempa Terkini</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Wilayah</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kekuatan (SR)</th>
                        <th>Potensi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Data gempa akan dimasukkan di sini -->
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 10,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Mengambil data gempa menggunakan fetch
            fetch("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json")
                .then(response => response.json())
                .then(datas => {
                    let gempas = datas.Infogempa.gempa;
                    gempas.forEach(gempa => {
                        let titik = gempa.Coordinates.split(",");
                        let _lat = parseFloat(titik[0]);
                        let _lng = parseFloat(titik[1]);

                        // Membuat popup dengan informasi lengkap
                        let popupContent = ` 
                            <b>Wilayah:</b> ${gempa.Wilayah}<br>
                            <b>Tanggal:</b> ${gempa.Tanggal}<br>
                            <b>Jam:</b> ${gempa.Jam}<br>
                            <b>Kekuatan:</b> ${gempa.Magnitude} SR<br>
                            <b>Potensi:</b> ${gempa.Potensi}<br>
                        `;

                        // Menambahkan marker ke peta
                        L.marker([_lat, _lng]).addTo(map)
                            .bindPopup(popupContent);

                        // Menambahkan data ke tabel
                        let tableRow = `
                            <tr>
                                <td>${gempa.Wilayah}</td>
                                <td>${gempa.Tanggal}</td>
                                <td>${gempa.Jam}</td>
                                <td>${gempa.Magnitude}</td>
                                <td>${gempa.Potensi}</td>
                            </tr>
                        `;
                        document.getElementById('tableBody').innerHTML += tableRow;
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Peta Gempa Bumi. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Leaflet.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
