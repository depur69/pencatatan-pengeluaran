<?php
include "../config/database.php";

$id = $_GET['id'];

if ($_POST) {
    mysqli_query(
        $conn,
        "UPDATE categories 
         SET name='{$_POST['name']}' 
         WHERE id='$id'"
    );
    header("Location: index.php");
    exit;
}

$c = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM categories WHERE id='$id'")
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Edit Kategori</h2>
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- FORM BOX -->
    <div class="form-box">
        <h3>Form Edit Kategori</h3>

        <form method="post">
            <input 
                type="text" 
                name="name" 
                value="<?= htmlspecialchars($c['name']); ?>" 
                required
            >

            <button type="submit">Update</button>
        </form>
    </div>

</div>

</body>
</html>
