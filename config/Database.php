<?php
session_start();

/* MATIKAN ERROR DI TAMPILAN */
error_reporting(0);
ini_set('display_errors', 0);

/* KONEKSI DATABASE */
$conn = mysqli_connect("localhost", "root", "", "expense_app");

if (!$conn) {
    die("Koneksi database gagal");
}
