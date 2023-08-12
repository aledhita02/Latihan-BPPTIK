<!-- Alessandro Pramudhita Putra Setyawan - Universitas Gunadarma -->
<?php
// Membuat array berisi harga tiket untuk masing-masing jurusan
$harga_tiket = array(
	"PWK" => 100000,
	"PWO" => 150000,
	"SMG" => 180000,
	"JGJ" => 200000,
	"SBY" => 250000,
);

// Membuat array berisi nama jurusan
$jurusan = array(
	"PWK" => "PURWOKERTO",
	"PWO" => "PURWEREJO",
	"SMG" => "SEMARANG",
	"JGJ" => "JOGJA",
	"SBY" => "SURABAYA",
);

// Membuat fungsi untuk menghitung total harga berdasarkan jumlah tiket dan harga tiket per jurusan
function totalHarga($jumlah, $harga_tiket)
{
	global $tujuan; // Menggunakan variabel global "tujuan"
	return $jumlah * $harga_tiket[$tujuan];
}

// Membuat fungsi untuk menghitung diskon
function diskon($jumlah, $harga_tiket, $tujuan)
{
	// Menghitung total harga sebelum diskon
	$totalHarga = totalHarga($jumlah, $harga_tiket);
	$diskon = 0; // Menginisialisasi diskon

	// Jika jumlah tiket lebih dari 5, akan ada diskon berdasarkan jurusan
	if ($jumlah > 5) {
		// Menentukan diskon berdasarkan jurusan
		switch ($tujuan) {
			case 'PWK':
				$diskon_percentage = 0.05;
				break;
			case 'PWO':
				$diskon_percentage = 0.06;
				break;
			case 'SMG':
				$diskon_percentage = 0.07;
				break;
			case 'JGJ':
				$diskon_percentage = 0.08;
				break;
			case 'SBY':
				$diskon_percentage = 0.09;
				break;
			default:
				$diskon_percentage = 0;
				break;
		}
		// Menghitung jumlah diskon
		$diskon = $totalHarga * $diskon_percentage;
	}
	$diskon_rupiah = "Rp " . number_format($diskon, 0, ",", ".");
	// Mengembalikan total harga, diskon, dan diskon dalam format rupiah
	return array('totalHarga' => $totalHarga, 'diskon' => $diskon, 'diskon_rupiah' => $diskon_rupiah);
}

// Membuat fungsi untuk menghitung total yang harus dibayar
function bayar($jumlah, $harga_tiket, $tujuan)
{
	$disc = diskon($jumlah, $harga_tiket, $tujuan);
	$totalHarga = totalHarga($jumlah, $harga_tiket);
	$bayar = $totalHarga - $disc['diskon'];
	$bayar_rupiah = "Rp " . number_format($bayar, 0, ",", ".");
	// Mengembalikan total yang harus dibayar dalam format rupiah
	return $bayar_rupiah;
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bus Sinar Jaya</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light">
	<div class="container col-lg-5 col-md-12">
		<img src="img/logo.png" alt="logo" class="img-thumbnail d-flex mx-auto" style="width:300px; height:200px">
		<h1 class="text-center" style="margin-left: 15px;"><b>AGEN BUS SINARJAYA</b></h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="card">
				<div class="card-header bg-primary text-white text-center fs-4"><b>Form Pendaftaran</b></div>
				<div class="card-body">

					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="ktp">Nomor KTP</label>
						</div>
						<div class="col-10">
							<input type="text" class="form-control" id="ktp" name="ktp">
						</div>
					</div>

					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="nama">Nama</label>
						</div>
						<div class="col-10">
							<input type="text" class="form-control" id="nama" name="nama">
						</div>
					</div>
					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="alamat">Alamat</label>
						</div>
						<div class="col-10">
							<textarea class="form-control" id="alamat" name="alamat"></textarea>
						</div>
					</div>
					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="hari">Hari</label>
						</div>
						<div class="col-4">
							<select class="form-control" id="hari" name="hari" onchange=" updateTicketPrice()">
								<option value="">-- Pilih Hari --</option>
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>
						</div>
						<div class="col-2">
							<label for="tgl">Tanggal Berangkat</label>
						</div>
						<div class="col-4">
							<input type="date" class="form-control" id="tgl" name="tgl">
						</div>
					</div>
					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="jurusan">Jurusan</label>
						</div>
						<div class="col-10">
							<select class="form-control" id="jurusan" name="jurusan" onchange=" updateTicketPrice()">
								<option value="">-- Pilih Jurusan --</option>
								<option value="PWK">Purwekerto</option>
								<option value="PWO">Purworejo</option>
								<option value="SMG">Semarang</option>
								<option value="JGJ">Jogja</option>
								<option value="SBY">Surabaya</option>
							</select>
						</div>
					</div>
					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="penumpang">Jumlah Penumpang</label>
						</div>
						<div class="col-10">
							<input type="number" class="form-control" id="penumpang" name="penumpang" min="1" value="1">
						</div>
					</div>
					<div class="row form-group align-items-center mb-4">
						<div class="col-2">
							<label for="tiket">Tarif Harga</label>
						</div>
						<div class="col-10">
							<input type="text" class="form-control bg-light" id="tiket" name="tiket" placeholder="Otomatis" readonly>
						</div>
					</div>
					<br>
					<div class="row form-group">
						<div class="col-12 text-center mb-5">
							<button type="submit" class="btn btn-primary col-3">Booking</button>
						</div>
					</div>
		</form>
	</div>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nomor = $_POST["ktp"];
		$nama = $_POST["nama"];
		$alamat = $_POST["alamat"];
		$hari = $_POST["hari"];
		$tgl = $_POST["tgl"];
		$tujuan = $_POST["jurusan"];
		$jumlah = $_POST["penumpang"];
		$tiket = $_POST["tiket"];
		$disc = diskon($jumlah, $harga_tiket, $tujuan);
		$bayar = bayar($jumlah, $harga_tiket, $tujuan);

		$data = [$nomor, $nama, $alamat, $hari, $tgl, $tujuan, $jumlah, $tiket, $disc, $bayar];
		$json_file = "data/data.json";
		$current_data = file_get_contents($json_file);
		$array_data = json_decode($current_data, true);
		$array_data[] = $data;
		$final_data = json_encode($array_data, JSON_PRETTY_PRINT);
		file_put_contents($json_file, $final_data);
		echo "<section class='bg-success pt-3'>";
		echo "<div class='container text-white'>";
		echo "<h2 class='text-center'>Data Pemesanan</h2>";
		echo "<table class='table text-white'>";
		echo "<tr><td>Nomor KTP:</td><td>$nomor</td></tr>";
		echo "<tr><td>Nama Pelanggan:</td><td>$nama</td></tr>";
		echo "<tr><td>Alamat:</td><td>$alamat</td></tr>";
		echo "<tr><td>Hari:</td><td>$hari</td></tr>";
		echo "<tr><td>Tanggal Berangkat:</td><td>$tgl</td></tr>";
		echo "<tr><td>Jurusan:</td><td>{$jurusan[$tujuan]}</td></tr>";
		echo "<tr><td>Jumlah Penumpang:</td><td>$jumlah</td></tr>";
		echo "<tr><td>Tarif Tiket:</td><td>{$harga_tiket[$tujuan]}</td></tr>";
		echo "<tr><td>Diskon:</td><td>{$disc['diskon_rupiah']}</td></tr>";
		echo "<tr><td>Bayar:</td><td>$bayar</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "</section>";
	}
	?>
	<script>
		// Membuat fungsi JavaScript untuk memperbarui harga tiket berdasarkan jurusan yang dipilih
		function updateTicketPrice() {
			// Mendapatkan nilai jurusan yang dipilih pengguna
			var selectedJurusan = document.getElementById("jurusan").value;

			// Membuat array harga tiket
			var hargaTiket = {
				"PWK": 100000,
				"PWO": 150000,
				"SMG": 180000,
				"JGJ": 200000,
				"SBY": 250000
			};

			// Mengisi input harga tiket berdasarkan harga tiket dari jurusan yang dipilih
			document.getElementById("tiket").value = hargaTiket[selectedJurusan];
		}
	</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>