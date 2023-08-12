<!-- Alessandro Pramudhita Putra Setyawan_Universitas Gunadarma -->
<?php
// Mendefinisikan fungsi-fungsi aritmatika dasar
function tambah($a, $b)
{
    return $a + $b;
}

function kurang($a, $b)
{
    return $a - $b;
}

function kali($a, $b)
{
    return $a * $b;
}

function bagi($a, $b)
{
    // Periksa apakah pembagian dengan nol
    if ($b == 0) {
        return "Tidak dapat membagi dengan nol";
    }
    return $a / $b;
}

// Inisialisasi variabel-variabel
$angka1 = $angka2 = $hasilPenjumlahan = $hasilPengurangan = $hasilPerkalian = $hasilPembagian = "";

// Periksa apakah formulir dikirimkan (menggunakan metode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST["angka1"];
    $angka2 = $_POST["angka2"];

    // Lakukan perhitungan jika nilai-nilai masukan sudah diatur
    if (isset($angka1) && isset($angka2)) {
        $hasilPenjumlahan = tambah($angka1, $angka2);
        $hasilPengurangan = kurang($angka1, $angka2);
        $hasilPerkalian = kali($angka1, $angka2);
        $hasilPembagian = bagi($angka1, $angka2);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Sederhana</title>
</head>

<body>
    <h2>Kalkulator Sederhana</h2>
    <!-- Formulir untuk memasukkan angka -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Bilangan 1: <input type="number" name="angka1" value="<?php echo $angka1; ?>"><br>
        Bilangan 2: <input type="number" name="angka2" value="<?php echo $angka2; ?>"><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    // Tampilkan hasil jika variabel-variabel sudah diatur
    echo "========================================================================";
    if (isset($hasilPenjumlahan)) {
        echo "<p>Hasil Penjumlahan Adalah : " .  $hasilPenjumlahan . "</p>";
    }
    if (isset($hasilPengurangan)) {
        echo "<p>Hasil Pengurangan Adalah : " .  $hasilPengurangan . "</p>";
    }
    if (isset($hasilPerkalian)) {
        echo "<p>Hasil Perkalian Adalah : " .  $hasilPerkalian . "</p>";
    }
    if (isset($hasilPembagian)) {
        echo "<p>Hasil Pembagian Adalah : " .  $hasilPembagian . "</p>";
    }
    ?>
</body>

</html>
