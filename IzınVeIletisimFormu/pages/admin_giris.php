<?php
session_start();

// Veritabanı bağlantısını dahil et
require_once('./db/baglanti.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Güvenli SQL sorgusu oluştur
    $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kullanıcı adı doğrulandı, şifreyi kontrol et
        if ($password == $user['password']) {
            // Kullanıcı doğrulandı
            $_SESSION['loggedin'] = true;
            header('Location: admin_panel.php');
            exit; // Kodun burada sonlanmasını sağlar
        } else {
            $error = 'Hatalı şifre!';
        }
    } else {
        $error = 'Kullanıcı bulunamadı!';
    }
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    }
}

$conn->close();
?>


<html lang="en">
<head>
  <title>Admin Giris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>
<div class="section">
  <div class="container">
    <div class="row full-height justify-content-center">
      <div class="col-12 text-center align-self-center py-5">
        <div class="section pb-5 pt-5 pt-sm-2 text-center">
          <label for="reg-log"></label>
          <div class="card-3d-wrap mx-auto">
            <div class="card-3d-wrapper">
              <div class="card-front">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-4 pb-3">Giriş Yap</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="form-group">
                        <input type="text" class="form-style" placeholder="Kullanıcı Adı" name="username">
                        <i class="input-icon uil uil-user"></i>
                      </div>	
                      <div class="form-group mt-2">
                        <input type="password" class="form-style" placeholder="Şifre" name="password">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <button type="submit" class="btn mt-4">Giriş Yap</button>






                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
