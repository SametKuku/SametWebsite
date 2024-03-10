// sil.php
<?php
require_once('./db/baglanti.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Silme işlemini gerçekleştir
    $sql = "DELETE FROM izin_talepleri WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $conn->error;
    }
} else {
    echo "Geçersiz talep";
}
?>