<!-- Alessandro Pramudhita Putra Setyawan_Universitas Gunadarma -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <title>Latihan4</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> Jumlah Bintang=
<input type="number" name="tinggi">
<br>

<input type="submit" value="Kirim">
<br>
</form>


</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tinggi_segitiga = $_POST['tinggi'];
    for($i=1; $i<=$tinggi_segitiga; $i++) {
        for($j=1; $j<=$i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
}
?>