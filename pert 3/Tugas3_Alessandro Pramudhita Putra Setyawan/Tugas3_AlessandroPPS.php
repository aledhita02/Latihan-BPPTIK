<!-- Alessandro Pramudhita Putra Setyawan_Universitas Gunadarma -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan3</title>
</head>
<?php
    // Mencetak string "CETAK BILANGAN GANJIL GENAP 1-100" 
    echo"=============== CETAK BILANGAN GANJIL GENAP 1-100================<br>";
    
    // Menggunakan loop for dari 1 sampai 100
    for($number=1;$number<=100;$number++){
        
        // Cek apakah angka saat ini adalah genap
        if($number % 2 == 0){
            // Jika genap, maka print angka tersebut dan tuliskan bahwa itu adalah bilangan genap
            echo "$number ";echo "adalah bilangan Genap</font><br>";
        }
        else{
            // Jika bukan genap (berarti ganjil), maka print angka tersebut dan tuliskan bahwa itu adalah bilangan ganjil
            echo "$number ";echo "adalah bilangan Ganjil</font><br>";
        }
    }
?>
</body>
</html>
