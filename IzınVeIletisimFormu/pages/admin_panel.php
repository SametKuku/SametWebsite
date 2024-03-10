<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_giris.php');
    exit;
    
}

// Bağlantı dosyasını dahil et
require_once('./db/baglanti.php');

$sql = "SELECT * FROM izin_talepleri";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head style="color: white;">
<link href="css/styles.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <!-- Theme CSS -->
    <link href="../css/styles.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            color: white;
        }
    </style>
</head>
<body >

    <div class="container">
        <div class="text-right">
            <a href="logout.php" class="btn btn-primary">Çıkış Yap</a>
        </div>
        <h2 class="my-4">İzin Talepleri Yönetimi</h2>
        <div class="table-responsive">
            <table style="color: white;" class="table table-bordered">
                <thead class="thead-dark">
                    <tr >
                        <th>ID</th>
                        <th>Kullanıcı</th>
                        <th>Tarih</th>
                        <th>Tür</th>
                        <th>Durum</th>
                        <th>Açıklama</th>
                        <th>Onayla</th>
                        <th>Reddet</th>
                        <th>Sil</th>

                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['user'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['reason'] . "</td>";
                            

                            echo "<td><a href='./onayla.php?id=" . $row['id'] . "' class='btn btn-success'>Onayla</a></td>";
                            echo "<td><a href='./reddet.php?id=" . $row['id'] . "' class='btn btn-danger'>Reddet</a></td>";
                            echo "<td><a href='./sil.php?id=" . $row['id'] . "' class='btn btn-danger'>Sil</a></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr style:color><td colspan='10'>Veri bulunamadı.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
