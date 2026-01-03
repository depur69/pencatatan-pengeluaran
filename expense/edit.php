<?php
include "../config/database.php";

$id = $_GET['id'];

if ($_POST) {
    mysqli_query(
        $conn,
        "UPDATE expenses SET 
            amount='{$_POST['amount']}',
            description='{$_POST['desc']}',
            expense_date='{$_POST['date']}'
         WHERE id='$id'"
    );
    header("Location: index.php");
    exit;
}

$e = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM expenses WHERE id='$id'")
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Edit Pengeluaran</h2>
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- FORM BOX -->
    <div class="form-box">
        <h3>Form Edit Pengeluaran</h3>

        <form method="post">
            <input 
                type="date" 
                name="date" 
                value="<?= $e['expense_date']; ?>" 
                required
            >

            <input 
                type="number" 
                name="amount" 
                value="<?= $e['amount']; ?>" 
                required
            >

            <textarea 
                name="desc" 
                placeholder="Keterangan"
            ><?= htmlspecialchars($e['description']); ?></textarea>

            <button type="submit">Update</button>
        </form>
    </div>

</div>

</body>
</html>
