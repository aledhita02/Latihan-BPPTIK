<!-- Alessandro Pramudhita Putra Setyawan_Universitas Gunadarma -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>APLIKASI KALKULATOR</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

</head>

<body>
	<div class="wrapper vh-100 d-flex align-items-center justify-content-center bg-warning">
		<div class="col-6">
			<div class="card bg-dark text-white">
				<div class="card-body">
					<!-- Main content -->
					<section class="content">
						<div class="container-thumbnail">
							<?php
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
								if ($b == 0) {
									return "Tidak dapat membagi dengan nol";
								}
								return $a / $b;
							}

							$angka1 = $angka2 = $operator = $hasil = "";

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$angka1 = $_POST["angka1"];
								$angka2 = $_POST["angka2"];
								$operator = $_POST["operator"];

								if (isset($angka1) && isset($angka2) && isset($operator)) {
									switch ($operator) {
										case 'tambah':
											$hasil = tambah($angka1, $angka2);
											break;
										case 'kurang':
											$hasil = kurang($angka1, $angka2);
											break;
										case 'kali':
											$hasil = kali($angka1, $angka2);
											break;
										case 'bagi':
											$hasil = bagi($angka1, $angka2);
											break;
									}
								}
							}
							?>

							<h2 class="text-center">APLIKASI KALKULATOR</h2>
							<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
								<div class="row form-group">
									<label for="angka1" class="col-2 text-white text-right">Bilangan 1:</label>
									<div class="col-9">
										<input class="form-control" type="number" name="angka1" placeholder="Bilangan 1">
									</div>
								</div>
								<div class="row form-group">
									<label for="angka2" class="col-2 text-white text-right">Bilangan 2:</label>
									<div class="col-9">
										<input class="form-control" type="number" name="angka2" placeholder="Bilangan 2">
									</div>
								</div>
								<div class="row form-group">
									<label class="col-2 text-white text-right">Operator:</label>
									<div class="col-9">
										<select name="operator" class="form-control">
											<option>== Pilih Operator ==</option>
											<option value="tambah">Penjumlahan</option>
											<option value="kurang">Pengurangan</option>
											<option value="kali">Perkalian</option>
											<option value="bagi">Pembagian</option>
										</select>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-6 mx-auto">
										<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
											<b>Hitung</b>
										</button>
									</div>
								</div>
							</form>

							<h3 class="text-center mt-4 ">Hasil : <?php echo "$hasil" ?></h3>
						</div>
					</section>
					<!-- /.content -->
				</div>

			</div>
		</div>

</body>

</html>