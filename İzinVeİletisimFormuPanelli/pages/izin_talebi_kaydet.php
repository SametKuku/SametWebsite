<?php
require_once('./db/baglanti.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $status = "Beklemede"; // Yeni talep geldiğinde varsayılan olarak beklemeye alınsın.
    $reason = $_POST["reason"]; // Kullanıcının girdiği açıklama

    // Güvenlik kontrolleri için htmlspecialchars kullanabilirsiniz.
    // Örneğin: $reason = htmlspecialchars($reason);

    // SQL sorgusu için parametrelerle çalışma
    $sql = "INSERT INTO izin_talepleri (user, date, type, reason, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $user, $date, $type, $reason, $status);

    if ($stmt->execute()) {
        // İzin talebi başarıyla gönderildiğinde
        $stmt->close();
        $conn->close();
        header("Location: ../index.php?success=1"); // Başarılı işlemi belirtmek için index.php'ye yönlendirme
        exit;
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
