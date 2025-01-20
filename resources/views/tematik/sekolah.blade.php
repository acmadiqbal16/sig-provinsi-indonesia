<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="crossorigin=""/>
     <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="crossorigin=""/> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
     <style>
     <style>
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
        #map {
            height: 600px;
            width: 80%;
            margin-top: 80px; /* Memberikan ruang di atas peta agar tidak tertutup navbar */
            margin: 20px auto; /* Atur margin atas-bawah dan kiri-kanan */
            border: 1px solid #ccc; /* Opsional: Memberikan border pada peta */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Opsional: Tambahkan sedikit bayangan */
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

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        .legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

         /* Footer styling */
         footer {
            background-color: #004085;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
            color: #ffffff;
        }
        .custom-container {
             margin-bottom: 50px; /* Menambahkan jarak di bawah container */
            margin-top: 50px;   
         }

        .card {
             margin-bottom: 20px; /* Menambahkan jarak antar card */
        }
        .card-img-top {
            width: 100%;        /* Sesuaikan lebar gambar dengan kontainer */
            height: 300px;      /* Tentukan tinggi gambar yang tetap */
            object-fit: cover;  /* Mengatur gambar agar tidak terdistorsi, tetap menjaga proporsi */
        }
        .guru {
              /* Jarak margin atas */
            margin-bottom: 10px; /* Jarak margin bawah */
             font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #343a40;
            margin-top: 50px;
        }

     </style>
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
                            <!-- Menu Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="http://localhost:8000/Guru">Peta Tematik Guru</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/sekolah">Peta Tematik Sekolah</a></li>
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
        <div class="container">
                    <h1>Jumlah Sekolah di Provinsi DKI Jakarta</h1>
                    <h3>Sumber data: <strong>BPS DKI Jakarta</strong></h3>

                    <!-- Peta -->
                    <div id="map"></div>
        </div>
        <div class="container1">
                <h1 class="guru">Tentang Provinsi DKI Jakarta</h1>
            </div>
            
    <!-- card -->
         <div class="container custom-container">        
                <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/guru2.jpg') }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Kepualauan Seribu</h5>
                <p class="card-text">Nikmati keindahan alam dan pesona bawah laut di Kepulauan Seribu. Terletak di utara Jakarta, tempat ini menawarkan pantai yang indah, kegiatan snorkeling, dan ketenangan yang jauh dari hiruk-pikuk kota.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/monas.jpg') }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Monumen Nasional</h5>
                <p class="card-text">Monas, ikon Jakarta yang terkenal, merupakan simbol kemerdekaan Indonesia. Nikmati pemandangan spektakuler kota Jakarta dari puncaknya dan pelajari sejarah bangsa di museum yang ada di dalamnya.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/sekolah1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Kota tua</h5>
                <p class="card-text">Kota Tua Jakarta membawa Anda kembali ke masa kolonial dengan bangunan-bangunan bersejarah dan museum yang menarik. Tempat ini menawarkan suasana unik yang menggabungkan sejarah dengan kehidupan modern Jakarta.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            </div>
        </div>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
        
    <script>
        var map = L.map('map').setView([-6.2297209, 106.664705], 10);
         
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const jawas = @json($jawas);
        // const jawas = {!! json_encode($jawas) !!};

        const jawaData = jawas.map(jawa => ({
            type: "Feature",
            properties: {
                name: jawa.name,
                id: jawa.id,
                jumlah_sekolah: jawa.jumlah_sekolah,
            },
            geometry: {
                type: jawa.type_polygon,
                coordinates: JSON.parse(jawa.polygon),
            }
        }));

        const geoJson = {
            type: "FeatureCollection",
            features: jawaData,
        };

        function getColor(d) {
            return  d > 3000 ? '#800026' :      // Warna merah gelap untuk nilai di atas 25.000
                    d > 2500 ? '#BD0026' :      // Warna merah untuk nilai di atas 18.000
                    d > 2000 ? '#E31A1C' :      // Warna merah cerah untuk nilai di atas 15.000
                    d > 1500 ? '#FC4E2A' :      // Warna oranye gelap untuk nilai di atas 10.000
                    d > 1000 ?  '#FD8D3C' :      // Warna oranye untuk nilai di atas 8.000
                    d > 300 ?   '#FEB24C' :      // Warna kuning gelap untuk nilai di atas 300
                    d > 0 ?     '#FED976' :      // Warna kuning muda untuk nilai lebih dari 0
                            '#FFEDA0';           // Warna default untuk nilai lainnya
            }
        function style(feature) {
            return {
                fillColor: getColor(feature.properties.jumlah_sekolah),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
            info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

       geojson = L.geoJson(geoJson, {style: style,  onEachFeature: onEachFeature}).addTo(map);

        var info = L.control();

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
                this.update();
                return this._div;
            };

            // method that we will use to update the control based on feature properties passed
            info.update = function (props) {
                this._div.innerHTML = '<h4>Jumlah Sekolah di Provinsi DKI Jakarta</h4>' +  (props ?
                    '<b>' + props.name + '</b><br />' + props.jumlah_sekolah.toLocaleString('id-ID') + 'Jiwa'
                    : 'Pilih Wilayah');
            };

            info.addTo(map);

            var legend = L.control({position: 'bottomright'});

                legend.onAdd = function (map) {

                    var div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 20, 800, 1000, 1500, 2500, 3500], // Kategori jumlah sekolah
                    labels = [];
                    // loop through our density intervals and generate a label with a colored square for each interval
                    for (var i = 0; i < grades.length; i++) {
                        div.innerHTML +=
                            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
                    }

                    return div;
                };

                legend.addTo(map);
    </script>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    <footer>
        <p>&copy; 2025 Provinsi Indonesia. Semua hak dilindungi. <br> Dibuat dengan menggunakan Laravel dan Bootstrap. <br> Peta ini menyediakan data provinsi Indonesia untuk keperluan visualisasi dan analisis. </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>

</body>
</html>