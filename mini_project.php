
<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") $error[] = "NIM wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Mahasiswa</title>
</head>
<body>

    <h1>Formulir Data Mahasiswa</h1>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama">
        <br><br>

        <label>NIM:</label>
        <input type="text" name="nim">
        <br><br>

        <label>Program Studi:</label>
        <input type="text" name="prodi">
        <br><br>

        <label>Semester:</label>
        <input type="number" name="semester">
        <br><br>

        <label>Email:</label>
        <input type="text" name="email">
        <br><br>

        <button type="submit">Kirim Data</button>
    </form>

    <?php if ($error): ?>
        <h3>Terjadi kesalahan:</h3>
        <ul>
            <?php foreach ($error as $pesan): ?>
                <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($data !== null): ?>
        <h2>Data Mahasiswa Berhasil Dikirim</h2>
        <p>Nama: <?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?></p>
        <p>NIM: <?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?></p>
        <p>Program Studi: <?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?></p>
        <p>Semester: <?= htmlspecialchars((string)$data["semester"], ENT_QUOTES, "UTF-8") ?></p>
        <p>Email: <?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?></p>
    <?php endif; ?>
</body>
</html>
