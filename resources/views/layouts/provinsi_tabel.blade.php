<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Provinsi</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk Navbar agar sticky */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000; /* Agar navbar selalu di atas */
        }
        /* Menambahkan jarak antara navbar dan kontainer */
        .container {
            margin-top: 30px; /* Atur jarak sesuai keinginan */
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #343a40;
            
        }
        h3 {
            font-size: 1.2rem;
            text-align: center;
            color: #6c757d;
        }
        .table-container {
            margin-top: 20px;
        }
        .table-container h3 {
            margin-bottom: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SIG Provinsi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Provinsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Kontainer utama -->
    <div class="container">
        <!-- Kotak Judul -->
        <div class="card mb-4">
            <div class="card-header text-center">
                <h1>Tabel Provinsi Indonesia</h1>
            </div>
        </div>

        <!-- Kotak Tabel -->
        <div class="card table-container">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Provinsi</th>
                                <th>Kota</th>
                                <th>Luas Wilayah (km²)</th>
                                <th>Populasi</th>
                                <th>Kepadatan (jiwa/km²)</th>
                                <th>Jumlah Suku</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinsi as $provinsi)
                            <tr>
                                <td>{{ $provinsi->name }}</td>
                                <td>{{ $provinsi->kota }}</td>
                                <td>{{ $provinsi->luas_wilayah }}</td>
                                <td>{{ $provinsi->populasi }}</td>
                                <td>{{ $provinsi->kepadatan }}</td>
                                <td>{{ $provinsi->jumlah_suku }}</td>
                                <td>{{ $provinsi->longitude }}</td> <!-- Menampilkan Longitude -->
                                <td>{{ $provinsi->latitude }}</td>  <!-- Menampilkan Latitude -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Provinsi Indonesia. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Bootstrap.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
