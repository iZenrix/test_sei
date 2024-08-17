<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Library ikon FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 32px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-row h2 {
            margin: 0;
        }
        .action-buttons {
            margin: 0;
        }
        .action-buttons a {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .action-buttons a:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        td a {
            margin-right: 10px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
        }
        td a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>

        <div class="header-row">
            <h2>List Proyek</h2>
            <div class="action-buttons">
                <a href="<?php echo site_url('proyek/create'); ?>">
                    <i class="fas fa-plus"></i> Tambah Proyek
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pimpinan Proyek</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proyek) && is_array($proyek)): ?>
                    <?php foreach ($proyek as $item): ?>
                        <tr>
                            <td><?php echo $item['namaProyek']; ?></td>
                            <td><?php echo $item['client']; ?></td>
                            <td><?php echo $item['tglMulai']; ?></td>
                            <td><?php echo $item['tglSelesai']; ?></td>
                            <td><?php echo $item['pimpinanProyek']; ?></td>
                            <td>
                                <?php if (isset($item['lokasi']) && is_array($item['lokasi']) && !empty($item['lokasi'])): ?>
                                    <?php foreach ($item['lokasi'] as $lokasi): ?>
                                        <?php echo $lokasi['namaLokasi']; ?><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    Lokasi tidak tersedia
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('proyek/edit/'.$item['id']); ?>" title="Edit">
                                    <i class="fas fa-edit icon"></i>
                                </a>
                                <a href="<?php echo site_url('proyek/delete/'.$item['id']); ?>" title="Delete" onclick="return confirm('Anda yakin ingin menghapus proyek ini?');">
                                    <i class="fas fa-trash-alt icon"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Data proyek tidak tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="header-row">
            <h2>List Lokasi</h2>
            <div class="action-buttons">
                <a href="<?php echo site_url('lokasi/create'); ?>">
                    <i class="fas fa-plus"></i> Tambah Lokasi
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lokasi_data) && is_array($lokasi_data)): ?>
                    <?php foreach ($lokasi_data as $item): ?>
                        <tr>
                            <td><?php echo $item['namaLokasi']; ?></td>
                            <td><?php echo $item['negara']; ?></td>
                            <td><?php echo $item['provinsi']; ?></td>
                            <td><?php echo $item['kota']; ?></td>
                            <td>
                                <a href="<?php echo site_url('lokasi/edit/'.$item['id']); ?>" title="Edit">
                                    <i class="fas fa-edit icon"></i>
                                </a>
                                <a href="<?php echo site_url('lokasi/delete/'.$item['id']); ?>" title="Delete" onclick="return confirm('Anda yakin ingin menghapus lokasi ini?');">
                                    <i class="fas fa-trash-alt icon"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data lokasi yang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
