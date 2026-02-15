<?php 
include("ayar.php"); 

$id = (int)$_GET['id'];
if(!$id) { header("Location: index.php"); exit; }

// Cevap Gönderilmiş mi?
if($_POST['mesaj_yaz']) {
    $yazar = mysqli_real_escape_string($baglanti, $_POST['yazar']);
    $mesaj = mysqli_real_escape_string($baglanti, $_POST['mesaj']);
    
    // Basit bir boşluk kontrolü
    if($yazar != "" && $mesaj != "") {
        mysqli_query($baglanti, "INSERT INTO mesajlar (konu_id, yazar, mesaj) VALUES ('$id', '$yazar', '$mesaj')");
        echo "<script>alert('Mesajınız gönderildi!');</script>";
    }
}

// Konu Bilgisini Çek
$konu_sorgu = mysqli_query($baglanti, "SELECT * FROM konular WHERE id = $id");
$konu = mysqli_fetch_array($konu_sorgu);
?>

<html>
<head>
    <title><?php echo $konu['baslik']; ?> - Forum</title>
    <style>
        body { font-family: Tahoma, Arial; font-size: 11px; }
        .mesaj_tablosu { border: 1px solid #333; margin-bottom: 10px; width: 800px; }
        .kafa { background-color: #6B8E23; color: white; padding: 5px; font-weight: bold; }
        .govde { background-color: #F5F5DC; padding: 10px; }
    </style>
</head>
<body>
<center>
    <h2><?php echo $konu['baslik']; ?></h2>
    <a href="index.php"><< Geri Dön</a>
    <br><br>

    <?php
    $mesaj_sorgu = mysqli_query($baglanti, "SELECT * FROM mesajlar WHERE konu_id = $id ORDER BY id ASC");
    while($mesaj = mysqli_fetch_array($mesaj_sorgu)) {
    ?>
        <table class="mesaj_tablosu" cellspacing="0">
            <tr>
                <td class="kafa"><?php echo $mesaj['yazar']; ?> yazdı: <span style="float:right"><?php echo $mesaj['tarih']; ?></span></td>
            </tr>
            <tr>
                <td class="govde" height="60" valign="top">
                    <?php echo nl2br($mesaj['mesaj']); // Satır sonlarını <br> yap ?>
                </td>
            </tr>
        </table>
    <?php } ?>

    <hr width="800">

    <form action="" method="post">
        <table width="500" border="1" bordercolor="#ccc" bgcolor="#eee">
            <tr>
                <td colspan="2" align="center"><b>Cevap Yaz</b></td>
            </tr>
            <tr>
                <td>İsim:</td>
                <td><input type="text" name="yazar"></td>
            </tr>
            <tr>
                <td>Mesaj:</td>
                <td><textarea name="mesaj" rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="mesaj_yaz" value="Gönder">
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>
