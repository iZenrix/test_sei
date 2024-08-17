<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($lokasi) ? 'Edit' : 'Tambah'; ?> Lokasi</title>
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
            margin-bottom: 20px;
            font-size: 24px;
            color: #4CAF50;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo isset($lokasi) ? 'Edit' : 'Tambah'; ?> Lokasi</h1>
        <form method="post" action="<?php echo isset($lokasi) && isset($lokasi['id']) ? site_url('lokasi/edit/'.$lokasi['id']) : site_url('lokasi/create'); ?>">
            <label for="nama_lokasi">Nama Lokasi</label>
            <input type="text" name="nama_lokasi" value="<?php echo isset($lokasi) ? $lokasi['namaLokasi'] : ''; ?>" required/>

            <label for="negara">Negara</label>
            <input type="text" name="negara" value="<?php echo isset($lokasi) ? $lokasi['negara'] : ''; ?>" required/>

            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" value="<?php echo isset($lokasi) ? $lokasi['provinsi'] : ''; ?>" required/>

            <label for="kota">Kota</label>
            <input type="text" name="kota" value="<?php echo isset($lokasi) ? $lokasi['kota'] : ''; ?>" required/>

            <button type="submit"><?php echo isset($lokasi) ? 'Update' : 'Simpan'; ?></button>
        </form>
    </div>
</body>
</html>
