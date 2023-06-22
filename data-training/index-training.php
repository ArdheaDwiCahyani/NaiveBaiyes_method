<?php
// require 'naive_baiyes.php';
// $hasil = '';

// if (isset($_POST['submit'])) {
//     $data = [
//         "kamera" => $_POST['kamera'],
//         "baterai" => $_POST['baterai'],
//         "harga" => $_POST['harga'],
//         //  "layak" => $_POST['layak'],
//     ];
// $hasil = posteriorProbability($data);
// }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catshop Admin | Categories Entry</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Naive Bayes</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index-training.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Data Training</span>
                </a>
            </li>
            <li>
                <a href="../data-test/test-entry.php">
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
            <h3>Data Training</h3>
            <table class="table-data">
                <thead>
                    <tr>
                        <th style="width: 20%">Merk</th>
                        <th style="width: 20%">Kamera</th>
                        <th style="width: 20%">Baterai</th>
                        <th style="width: 20%">Harga</th>
                        <th style="width: 20%">Layak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $sql = "SELECT * FROM handphone";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo "
			   <tr>
				<td colspan='5' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
                    }
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                    <tr>
                      <td>$data[nama]</td>
                      <td>$data[kamera]</td>
                      <td>$data[baterai]</td>
                      <td>$data[harga]</td>
                      <td>$data[layak]</td>
                    </tr>
                  ";
                    }
                    ?>
                </tbody>
            </table>
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