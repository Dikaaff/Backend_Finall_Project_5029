<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Rekapitulasi Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #e0f7fa;
    }

    .sidebar {
        height: 100vh;
        background-color: #00acc1;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidebar img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .sidebar h4 {
        margin-bottom: 20px;
        text-align: center;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        margin: 15px 0;
        padding: 10px 15px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        width: 100%;
        text-align: left;
    }

    .sidebar a:hover {
        background-color: #008394;
    }

    .sidebar a.active {
        background-color: #008394;
    }

    .content {
        margin-left: 220px;
        padding: 20px;
    }

    .btn-primary {
        background-color: #00acc1;
        border: none;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .btn-primary:hover {
        background-color: #008394;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
    <script>
    function confirmDelete(url) {
        if (confirm('Yakin menghapus pesan ini?')) {
            window.location.href = url;
        }
    }
    </script>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar">
            <img src="data:image/jpeg;base64,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"
                alt="Profile Picture">
            <h4>Dika Afif Indrawan</h4>
            <a href="<?= base_url('dashboard'); ?>" class="active">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('dashboard/add'); ?>">
                <i class="fas fa-plus-circle"></i> Tambah Nilai
            </a>
            <a href="<?= base_url('login/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        <div class="content">
            <h3>Data Nilai Mahasiswa</h3>
            <a href="<?= base_url('dashboard/add'); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Nilai
            </a>
            <div class="table-container">
                <table class="table table-bordered table-hover w-100">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Mata Kuliah</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mahasiswa)): ?>
                        <?php foreach ($mahasiswa as $index => $mhs): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $mhs['nama']; ?></td>
                            <td><?= $mhs['jurusan']; ?></td>
                            <td><?= $mhs['kelas']; ?></td>
                            <td><?= $mhs['matakuliah']; ?></td>
                            <td><?= $mhs['nilai']; ?></td>
                            <td>
                                <a href="<?= base_url('dashboard/edit/' . $mhs['id']); ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button onclick="confirmDelete('<?= base_url('dashboard/delete/' . $mhs['id']); ?>')"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>