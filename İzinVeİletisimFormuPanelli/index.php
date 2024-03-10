<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İzin Talebi / İletişim Formu</title>
    <!-- Bootstrap CSS dosyası -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

    <link rel="stylesheet" href="./css/styles.css">

    
    <style>
        /* Ek özel stiller */
        body {
            padding-top: 50px; /* Navbar'dan sonra biraz boşluk bırakmak için */
        }
    </style>
    
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>
    
<div class="container">
    

        <h2 class="mt-5 mb-4"> İzin Talebi / İletişim Formu </h2>
        <div class="admingo">   
    <a  href="./pages/admin_giris.php" class="btn btn-secondary mt-3">Admin Paneli Girişi</a>
    </div> 
        <p>Lütfen aşağıdaki formu doldurarak izin talebinizi iletilmesini sağlayınız. Talebiniz iş akışımızı düzenlememizde bize yardımcı olacaktır.</p>
        <form action="pages/izin_talebi_kaydet.php" method="POST">
            <div class="form-group">
                <label for="user">Adınız Soyadınız:</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="date">Talep Tarihi:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="type">İzin Türü:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="">Lütfen bir izin türü seçin</option>
                    <option value="Yıllık İzin">Yıllık İzin</option>
                    <option value="Hastalık İzni">Hastalık İzni</option>
                    <option value="Doğum İzni">Doğum İzni</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reason">İzin Talebinizin Nedeni:</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Talep Gönder</button>
        </form>
        
    </div>
    <!-- Bootstrap JS dosyası, bunu sayfanın en altına yerleştirmeniz önerilir -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap JS dosyası, bunu sayfanın en altına yerleştirmeniz önerilir -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php
// index.php

// Fonksiyon, belirli bir süre sonra mesaj kutusunu kapatır
function closeMessage() {
    echo "<script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000); // 5000 milisaniye (5 saniye) sonra kapat
          </script>";
}

// Eğer 'success' parametresi 1 olarak ayarlandıysa, başarılı bir işlem gerçekleştirilmiştir.
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999;">
            <strong>İzin talebiniz başarıyla gönderildi.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    closeMessage(); // Mesaj kutusunu belirli bir süre sonra kapat
} elseif (isset($_GET['success']) && $_GET['success'] == 0) {
    echo '<div id="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999;">
            <strong>İzin talebiniz gönderilemedi. Lütfen tekrar deneyin.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    closeMessage(); // Mesaj kutusunu belirli bir süre sonra kapat
}
?>




</body>
</html>
