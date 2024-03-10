<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_giris.php');
    exit;
}

// Veritabanı bağlantısını çek
include './db/baglanti.php';

// Talebin ID'sini al
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $request_id = $_GET['id'];

    // Talebi güncelle, reddedildi olarak işaretle
    $sql = "UPDATE izin_talepleri SET status='Reddedildi' WHERE id=$request_id";

    if ($conn->query($sql) === TRUE) {
        // Reddetme işlemi başarılı olduğunda, Bootstrap modal ile reddetme mesajını göster
        echo '
        <link href="../css/styles.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#myModal").modal("show");
            });
        </script>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">İşlem Başarısız!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        İzin talebi  reddedildi.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href=\'admin_panel.php\'">Kapat</button>
                    </div>
                </div>
            </div>
        </div>';
    } else {
        echo "Hata: " . $conn->error;
    }
} else {
    echo "Geçersiz talep ID";
}

$conn->close();
?>
