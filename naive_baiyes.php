<?php
require 'koneksi.php';

function totalDataTraining(){
    global $con;
    return (int) mysqli_fetch_row(mysqli_query($con, "SELECT * FROM handphone"));
}

// var_dump(totalDataTraining());

function jumlahDataKelas(){
    global $con;
    $query = "SELECT * FROM handphone where layak = ";

    $jumlahDataLayak['ya'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "'ya'")) [0];
    $jumlahDataLayak['tidak'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "'tidak'")) [0];
    return $jumlahDataLayak;
}

function priorProbability(){
    $kelas['ya'] = jumlahDataKelas()['ya'] / totalDataTraining();
    $kelas['tidak'] = jumlahDataKelas()['tidak'] / totalDataTraining();
    return $kelas;
}

function conditionalProbability($nama_kolom, $nilai){
    global $con;
    $query = "SELECT COUNT($nama_kolom) FROM handphone WHERE $nama_kolom = '$nilai' AND layak=";

    $conditionalProbability['ya'] = (int) mysqli_fetch_row(mysqli_query($con, $query. "'ya'"))[0] / jumlahDataKelas()['ya'];
    $conditionalProbability['tidak'] = (int) mysqli_fetch_row(mysqli_query($con, $query. "'tidak'"))[0] / jumlahDataKelas()['tidak'];

    return $conditionalProbability;
}

function posteriorProbability($data){
   // $atribut['nama'] = conditionalProbability('nama', $data['nama']);
    $atribut['kamera'] = conditionalProbability('kamera', $data['kamera']);
    $atribut['baterai'] = conditionalProbability('baterai', $data['baterai']);
    $atribut['harga'] = conditionalProbability('harga', $data['harga']);
  //  $atribut['layak'] = conditionalProbability('layak', $data['layak']);

    $probabilitas['ya'] = $atribut['kamera']['ya'] * $atribut['baterai']['ya'] * $atribut['harga']['ya'] * priorProbability()['ya'];

    $probabilitas['tidak'] = $atribut['kamera']['tidak'] * $atribut['baterai']['tidak'] * $atribut['harga']
    ['tidak'] * priorProbability()['tidak'];
    
    if($probabilitas['ya'] > $probabilitas['tidak']){
        return 'ya';
    } else if($probabilitas['ya'] < $probabilitas['tidak']){
        return 'tidak';
    }
}

?>