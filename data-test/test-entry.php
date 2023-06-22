<?php
require '../naive_baiyes.php';
$hasil = '';

if (isset($_POST['submit'])) {
    $merk = ["nama" => $_POST['nama']];
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
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Test Entry</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Naive Bayes</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../data-training/index-training.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Data Training</span>
                </a>
            </li>
            <li>
                <a href="test-entry.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Data Test</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Input Data Test</h3>
            <div class="form-login">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nama">Merk HP</label>
                    <input class="input" type="text" name="nama" id="nama" placeholder="Merk HP">
                    <label for="kamera">Kamera</label>
                    <select class="input" name="kamera" id="kamera">
                        <option value="">Pilih Kualitas Kamera</option>
                        <option value="kuat">Kuat</option>
                        <option value="cukup">Cukup</option>
                        <option value="lemah">Lemah</option>
                    </select>
                    <label for="baterai">Baterai</label>
                    <select class="input" name="baterai" id="baterai">
                        <option value="">Pilih Kualitas Baterai</option>
                        <option value="tinggi">Tinggi</option>
                        <option value="sedang">Sedang</option>
                        <option value="rendah">Rendah</option>
                    </select>
                    <label for="harga">Harga</label>
                    <select class="input" name="harga" id="harga">
                        <option value="">Pilih Kategori Harga</option>
                        <option value="sangat mahal">Sangat Mahal</option>
                        <option value="mahal">Mahal</option>
                        <option value="murah">Murah</option>
                        <option value="sangat murah">Sangat Murah</option>
                    </select>
                    <button type="submit" class="btn btn-simpan" name="submit">
                        Simpan
                    </button>
                    <div style="margin: 20px 0px;"></div>
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 25%">Merk</th>
                                <th style="width: 25%">Kamera</th>
                                <th style="width: 25%">Baterai</th>
                                <th style="width: 25%">Harga</th>
                                <th style="width: 25%">Layak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!isset($_POST['submit'])) {
                                echo "
                                <td colspan='5' align='center'>Data Belum Ada</td>";
                            } else {
                                echo "
                                <td>$merk[nama]</td>
                                <td>$data[kamera]</td>
                                <td>$data[baterai]</td>
                                <td>$data[harga]</td>
                                <td>$hasil</td> ";
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>

</html>