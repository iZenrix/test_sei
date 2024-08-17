<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($proyek) ? 'Edit' : 'Tambah'; ?> Proyek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .checkbox-group {
            margin-bottom: 16px;
        }
        .checkbox-group label {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }
        button {
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo isset($proyek) ? 'Edit' : 'Tambah'; ?> Proyek</h1>

        <form method="post" action="<?php echo isset($proyek) ? site_url('proyek/edit/'.$proyek['id']) : site_url('proyek/create'); ?>">
            <label for="nama_proyek">Nama Proyek</label>
            <input type="text" name="nama_proyek" value="<?php echo isset($proyek['namaProyek']) ? $proyek['namaProyek'] : ''; ?>" required/>

            <label for="client">Client</label>
            <input type="text" name="client" value="<?php echo isset($proyek['client']) ? $proyek['client'] : ''; ?>" required/>

            <label for="tgl_mulai">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" value="<?php echo isset($proyek['tglMulai']) ? explode('T', $proyek['tglMulai'])[0] : ''; ?>" required/>

            <label for="tgl_selesai">Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" value="<?php echo isset($proyek['tglSelesai']) ? explode('T', $proyek['tglSelesai'])[0] : ''; ?>" required/>

            <label for="pimpinan_proyek">Pimpinan Proyek</label>
            <input type="text" name="pimpinan_proyek" value="<?php echo isset($proyek['pimpinanProyek']) ? $proyek['pimpinanProyek'] : ''; ?>" required/>

            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" required><?php echo isset($proyek['keterangan']) ? $proyek['keterangan'] : ''; ?></textarea>

            <label>Lokasi</label>
            <div class="checkbox-group">
                <?php if (isset($lokasi_data) && is_array($lokasi_data)): ?>
                    <?php foreach ($lokasi_data as $item): ?>
                        <label>
                            <input type="checkbox" name="lokasi_id[]" value="<?php echo $item['id']; ?>" 
                            <?php echo isset($proyek['lokasi']) && in_array($item['id'], array_column($proyek['lokasi'], 'id')) ? 'checked' : ''; ?> />
                            <?php echo $item['namaLokasi']; ?>
                        </label>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada lokasi yang tersedia</p>
                <?php endif; ?>
            </div>

            <button type="submit"><?php echo isset($proyek) ? 'Update' : 'Simpan'; ?></button>
        </form>
    </div>
</body>
</html>
