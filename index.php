<?php
require 'naive_baiyes.php';
$hasil = '';

if (isset($_POST['submit'])) {
    $data = [
        "kamera" => $_POST['kamera'],
        "baterai" => $_POST['baterai'],
        "harga" => $_POST['harga'],
        //  "layak" => $_POST['layak'],
    ];
$hasil = posteriorProbability($data);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Penentuan Kelayakan HP</h3>
    <form action="" method="post">
        <label for="nama">Jenis Handphone</label>
        <input type="text" name="nama" id="nama">

        <label for="kamera">Kamera</label>
        <select name="kamera" id="kamera">
            <option></option>
            <option value="kuat">Kuat</option>
            <option value="cukup">Cukup</option>
            <option value="lemah">Lemah</option>
        </select>

        <label for="baterai">Baterai</label>
        <select name="baterai" id="baterai">
            <option></option>
            <option value="tinggi">Tinggi</option>
            <option value="sedang">Sedang</option>
            <option value="rendah">Rendah</option>
        </select>

        <label for="harga">Harga</label>
        <select name="harga" id="harga">
            <option></option>
            <option value="sangat mahal">Sangat Mahal</option>
            <option value="mahal">Mahal</option>
            <option value="murah">Murah</option>
        </select>

        <!-- <label for="layak">Layak</label>
        <select name="layak" id="layak">
            <option></option>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select> -->

        <button type="submit" name="submit">Submit</button>
    </form>
    <h5>LAYAK : <?= $hasil;?></h5>
</body>
</html>