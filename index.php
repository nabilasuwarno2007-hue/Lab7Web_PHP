<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP</title>
</head>

<body>
    <h1>Belajar PHP</h1>

    <?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>
    <?php
    $nama = "Siti";
    $tugas = 90;
    $uts = 85;
    $uas = 95;

    $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

    if ($nilaiAkhir >= 85) {
        $predikat = "A";
    } elseif ($nilaiAkhir >= 75) {
        $predikat = "B";
    } elseif ($nilaiAkhir >= 60) {
        $predikat = "C";
    } else {
        $predikat = "D";
    }

    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
    echo "Predikat: " . $predikat;
    ?>
    <?php
    $mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];

    echo "<h3>Daftar Mahasiswa</h3><ol>";

    foreach ($mahasiswa as $nama) {
        echo "<li>" . htmlspecialchars($nama) . "</li>";
    }

    echo "</ol>";
    ?>
    <?php
    function hitungDiskon($harga, $persen)
    {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }

    $hargaAkhir = hitungDiskon(150000, 10);

    echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");

    function hitungLuas($panjang, $lebar)
    {
        return $panjang * $lebar;
    }

    $luas = hitungLuas(8, 5);

    echo "<br>Luas persegi panjang: " . $luas . " cm²";

    ?>
    <!-- cari.php -->
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>
    <?php
    if (isset($_GET["kata"])) {
        $kata = trim($_GET["kata"]);
        echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
    }
    ?>
    <!-- index.php -->
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input id="nama" name="nama" type="text" required>

        <br><br>

        <label for="prodi">Program Studi:</label>
        <input id="prodi" name="prodi" type="text" required>

        <br><br>

        <button type="submit" name="kirim">Kirim Data</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");

        if ($nama === "" || $prodi === "") {
            echo "<p>Semua kolom wajib diisi.</p>";
        } else {
            echo "<h3>Data diterima</h3>";
            echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
            echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
        }
    }
    ?>


    <?php
    $error = "";
    $barang = "";
    $subtotal = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["hitung"])) {
        $barang = trim($_POST["barang"] ?? "");
        $hargaInput = $_POST["harga"] ?? "";
        $jumlahInput = $_POST["jumlah"] ?? "";

        if (
            $barang === "" || !is_numeric($hargaInput) ||
            !ctype_digit((string)$jumlahInput) ||
            (float)$hargaInput < 0 || (int)$jumlahInput < 1
        ) {
            $error = "Periksa kembali nama barang, harga, dan jumlah.";
        } else {
            $harga = (float)$hargaInput;
            $jumlah = (int)$jumlahInput;
            $subtotal = $harga * $jumlah;
        }
    }
    ?>

    <form method="POST">
        <label>Nama barang
            <input name="barang" value="<?= htmlspecialchars($barang, ENT_QUOTES, 'UTF-8') ?>" required>
        </label>

        <br><br>

        <label>Harga
            <input name="harga" type="number" min="0" step="0.01" required>
        </label>

        <br><br>

        <label>Jumlah
            <input name="jumlah" type="number" min="1" step="1" required>
        </label>

        <br><br>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if ($error !== "") {
        echo "<p>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
    } elseif ($subtotal !== null) {
        echo "<p>Barang: " . htmlspecialchars($barang, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
    }
    ?>

    <hr>
    <h1>G. Eksperimen Mandiri</h1>

    <h2>Eksperimen 1 - Menghitung Nilai Rata-rata</h2>

    <form method="POST">
        <label>Nilai Tugas:</label>
        <input type="number" name="tugas_rata" required>
        <br><br>

        <label>Nilai UTS:</label>
        <input type="number" name="uts_rata" required>
        <br><br>

        <label>Nilai UAS:</label>
        <input type="number" name="uas_rata" required>
        <br><br>

        <button type="submit" name="hitung_rata">Hitung Rata-rata</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["hitung_rata"])) {
        $tugas = (float) $_POST["tugas_rata"];
        $uts = (float) $_POST["uts_rata"];
        $uas = (float) $_POST["uas_rata"];

        $rataRata = ($tugas + $uts + $uas) / 3;

        echo "<p>Nilai rata-rata: " . number_format($rataRata, 2, ",", ".") . "</p>";
    }
    ?>
    
<hr>
<h2>Eksperimen 2 - Pencarian Nama dari Array</h2>

<?php
$daftarNama = ["Nabila", "Alya", "Bima", "Citra", "Doni"];
?>

<form method="GET">
    <label>Cari Nama:</label>
    <input type="text" name="cari_nama" required>
    <button type="submit">Cari</button>
</form>

<?php
if (isset($_GET["cari_nama"])) {
    $kataKunci = trim($_GET["cari_nama"]);
    $ditemukan = false;

    foreach ($daftarNama as $nama) {
        if (stripos($nama, $kataKunci) !== false && $kataKunci !== "") {
            echo "<p>Nama ditemukan: " . htmlspecialchars($nama) . "</p>";
            $ditemukan = true;
        }
    }

    if (!$ditemukan) {
        echo "<p>Nama tidak ditemukan.</p>";
    }
}
?>

<hr>
<h2>Eksperimen 3 - Function Format Rupiah</h2>

<?php
function formatRupiah($harga) {
    return "Rp" . number_format($harga, 0, ",", ".");
}

$hargaBarang = 150000;

echo "<p>Harga barang: " . formatRupiah($hargaBarang) . "</p>";
?>

<hr>
<h2>Eksperimen 4 - Validasi NIM</h2>

<form method="POST">
    <label>Masukkan NIM:</label>
    <input type="text" name="nim_eksperimen" required>
    <br><br>

    <button type="submit" name="cek_nim">Periksa NIM</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cek_nim"])) {
    $nimEksperimen = trim($_POST["nim_eksperimen"]);

    if (!preg_match("/^[0-9]{10}$/", $nimEksperimen)) {
        echo "<p>NIM harus terdiri dari 10 angka.</p>";
    } else {
        echo "<p>NIM valid: " . htmlspecialchars($nimEksperimen) . "</p>";
    }
}
?>

<h2>Eksperimen 5 - Tombol Reset</h2>

<form>
    <label>Contoh isian:</label>
    <input type="text" name="contoh_nim" value="1234567890">
    <button type="reset">Reset</button>
</form>

<p>Tombol Reset mengembalikan isian form ke nilai awalnya langsung di browser. Tombol ini tidak mengirim permintaan atau menjalankan PHP di server.</p>
<p>Sebaliknya, pemrosesan ulang di server terjadi ketika form dikirim lagi: browser mengirim data ke server, lalu PHP memprosesnya dan mengirimkan respons baru. Reset tidak membatalkan data yang sudah terlanjur diproses atau disimpan di server.</p>

</body>

</html>