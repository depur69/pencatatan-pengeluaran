<?php
include "../config/database.php";

if ($_POST) {
    mysqli_query(
        $conn,
        "INSERT INTO categories VALUES (
            NULL,
            '{$_SESSION['user']['id']}',
            '{$_POST['name']}'
        )"
    );
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Tambah Kategori</h2>
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- FORM BOX -->
    <div class="form-box">
        <h3>Form Kategori</h3>

        <form method="post">
            <input 
                type="text" 
                name="name" 
                placeholder="Nama kategori" 
                required
            >

            <button type="submit">Simpan</button>
        </form>
    </div>

</div>

</body>
</html>
