<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challange 2 Day 5 PHP</title>
</head>

<body>
    <h1>Exercise PHP gaji</h1>
    <form action="" method="POST">
        <input type="number" name="gaji-pokok" placeholder="Masukkan gaji pokok">
        <input type="number" name="gaji-tunjangan" placeholder="Masukkan gaji tunjungan">
        <input type="number" name="gaji-potongan" placeholder="Masukkan gaji potongan">
        <input type="submit" value="submit">
    </form>

    <?php
        function hitungGaji($pokok, $tunjangan, $potongan) {
            $gaji = [];
            $gaji["bruto"] = $pokok + $tunjangan;
            $gaji["pajak"] = 0.1 * $gaji["bruto"];
            $gaji["asuransi"] = 0.05 * $gaji["bruto"];
            $gaji["bersih"] = $gaji["bruto"] - $gaji["pajak"] - $gaji["asuransi"];
            
            return $gaji;
        }

        $pokok = isset($_POST["gaji-pokok"]) ? (int)$_POST["gaji-pokok"] : 0;
        $tunjangan = isset($_POST["gaji-tunjangan"]) ? (int)$_POST["gaji-tunjangan"] : 0;
        $potongan = isset($_POST["gaji-potongan"]) ? (int)$_POST["gaji-potongan"] : 0;
        
        if ((is_numeric($pokok) && $pokok >= 0) 
        && (is_numeric($tunjangan) && $tunjangan >= 0) 
        && (is_numeric($potongan) && $potongan >= 0)) {
            $hasil = hitungGaji($pokok, $tunjangan, $potongan);
            foreach($hasil as $key => $value) {
                echo "<br>" . $key . ": " . "Rp" . number_format($value, 0, ",", ".");
            }
        } else {
            echo "<br> Data harus lebih dari 0 dan angka";
        }

    ?>
</body>

</html>