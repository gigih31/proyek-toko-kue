<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pengumuman</h1>
        <form action="<?= site_url('admin/pengumuman/' . $pengumuman['id']); ?>" method="post">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" name="judul" value="<?= $pengumuman['judul']; ?>">
            </div>
            <div class="form-group">
                <label for="pengumuman">Pengumuman:</label>
                <textarea class="form-control" name="pengumuman" rows="4"><?= $pengumuman['pengumuman']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
