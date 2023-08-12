<!-- Alessandro Pramudhita Putra Setyawan - Universitas Gunadarma -->
<?php
$berkas = "data/data.json";
$dataJson = file_get_contents($berkas);
$stockBuah = json_decode($dataJson, true);

$namaBuah = array("Durian", "Mangga", "Rambutan", "Kelengkeng", "Apel");
$hargaBuah = array("Durian" => 20000, "Mangga" => 15000, "Rambutan" => 10000, "Kelengkeng" => 25000, "Apel" => 30000);

function totalHarga($jumlah, $buah)
{
	global $hargaBuah;
	return $jumlah * $hargaBuah[$buah];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>TOKO BUAH</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

</head>

<body class="bg-primary">
	<div class="wrapper vh-100 d-flex justify-content-center">
		<div class="col-12">
			<div class="card-body">
				<!-- Main content -->
				<section class="content">
					<div class="container-thumbnail">
						<h1 class="text-center text-light"><b>Toko Buah Alpraz</b></h1>
						<form action="index.php" method="post">
							<div class="row form-group">
								<label class="col-4 text-white text-right">Nama Pembeli</label>
								<div class="col-4">
									<input class="form-control" type="text" name="nama" placeholder="Nama...">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-4 text-white text-right">Nama Buah</label>
								<div class="col-4">
									<select name="buah" class="form-control">
										<?php
										foreach ($namaBuah as $buah) {
											echo "<option value='" . $buah . "'>" . $buah . "</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-4 text-white text-right">Jumlah</label>
								<div class="col-4">
									<input class="form-control" type="number" name="jumlah" placeholder="Jumlah...">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-12 text-center">
									<input class="btn btn-success col-3" type="submit" value="Hitung" name="submit">
								</div>
							</div>
						</form> <br>


						<?php
						if (isset($_POST['submit'])) {
							$namaPembeli = $_POST['nama'];
							$buah = $_POST['buah'];
							$jumlah = $_POST['jumlah'];
							$totalHarga = totalHarga($jumlah, $buah);

							$belanja = [$namaPembeli, $buah, $jumlah, $totalHarga];
							array_push($stockBuah, $belanja);
							array_multisort($stockBuah, SORT_ASC);
							$dataJson = json_encode($stockBuah, JSON_PRETTY_PRINT);
							file_put_contents($berkas, $dataJson);
						}
						?>

						<h1 class="mt-5 text-center text-light"><b>Daftar Harga Buah</b></h1>
						<table class="table table-bordered table-hover">
							<thead class="bg-danger text-light font-weight-bold">
								<?php
								foreach ($namaBuah as $buah => $nama) {
									echo "<td style='text-align: center;'>" . $nama . "</td>";
									echo "</td>";
								}
								?>
							</thead>
							<tbody class="bg-light text-dark">
								<?php
								foreach ($hargaBuah as $buah => $harga) {
									echo "<td style='text-align: center;'>" . $harga . "</td>";
									echo "</td>";
								}
								?>
							</tbody>
						</table>

						<h1 class="text-center mt-5 text-light"><b>Daftar Pembelian Buah</b></h1>
						<table class="table table-bordered table-hover">
							<thead class="bg-success text-center text-light">
								<tr>
									<th>Nama Pembeli</th>
									<th>Nama Buah</th>
									<th>Jumlah</th>
									<th>Total Harga</th>
								</tr>
							</thead>
							<tbody class="bg-light text-dark text-center">
								<?php
								for ($i = 0; $i < count($stockBuah); $i++) {
									echo "<tr>";
									echo "<td>" . $stockBuah[$i][0] . "</td>";
									echo "<td style='text-align: center;'>" . $stockBuah[$i][1] . "</td>";
									echo "<td style='text-align: center;'>" . $stockBuah[$i][2] . "</td>";
									echo "<td style='text-align: center;'>" . $stockBuah[$i][3] . "</td>";
									echo "</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
	</section>
	</div>
</body>

</html>