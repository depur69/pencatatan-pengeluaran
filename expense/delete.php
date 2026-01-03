<?php
include "../config/database.php";
mysqli_query($conn,"DELETE FROM expenses WHERE id='{$_GET['id']}'");
header("Location: index.php");
