<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Tambahkan link ke Bootstrap atau CSS lainnya jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Proyek dan Lokasi</h1>
        <div id="content">
            <h2>Proyek</h2>
            <ul id="project-list">
                <!-- List proyek akan ditampilkan di sini -->
            </ul>

            <h2>Lokasi</h2>
            <ul id="location-list">
                <!-- List lokasi akan ditampilkan di sini -->
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch data proyek
            $.get("http://localhost:8080/api/proyek", function(data) {
                let projectList = $("#project-list");
                projectList.empty(); // Kosongkan list sebelum menambahkan
                data.forEach(function(proyek) {
                    projectList.append("<li>" + proyek.nama_proyek + " - " + proyek.client + "</li>");
                });
            });

            // Fetch data lokasi
            $.get("http://localhost:8080/api/lokasi", function(data) {
                let locationList = $("#location-list");
                locationList.empty(); // Kosongkan list sebelum menambahkan
                data.forEach(function(lokasi) {
                    locationList.append("<li>" + lokasi.nama_lokasi + ", " + lokasi.kota + "</li>");
                });
            });
        });
    </script>
</body>
</html>
