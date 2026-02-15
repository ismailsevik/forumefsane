<?php 
include("ayar.php"); 

if($_POST['konu_ac']) {
    $baslik = mysqli_real_escape_string($baglanti, $_POST['baslik']);
    $yazar  = mysqli_real_escape_string($baglanti, $_POST['yazar']);
    $mesaj  = mysqli_real_escape_string($baglanti, $_POST['mesaj']);

    if($baslik && $yazar && $mesaj) {
        // Önce konuyu ekle
        mysqli_query($baglanti, "INSERT INTO konular (baslik, yazar) VALUES ('$baslik', '$yazar')");
        $konu_id = mysqli_insert_id($baglanti);

        // İlk mesajı ekle
        mysqli_query($baglanti, "INSERT INTO mesajlar (konu_id, yazar, mesaj) VALUES ('$konu_id', '$yazar', '$mesaj')");

        header("Location: konu.php?id=$konu_id");
        exit;
    } else {
        $hata = "Lütfen tüm alanları doldurun!";
    }
}
?>

<html>
<body bgcolor="#f0f0f0">
<center>
    <br><br>
    <form action="" method="post">
        <table border="1" cellpadding="5" cellspacing="0" bgcolor="#ffffff">
            <tr>
                <td colspan="2" bgcolor="#006699" align="center"><font color="white"><b>Yeni Konu Aç</b></font></td>
            </tr>
            <?php if($hata) { echo "<tr><td colspan='2'><font color='red'>$hata</font></td></tr>"; } ?>
            <tr>
                <td>Konu Başlığı:</td>
                <td><input type="text" name="baslik" size="40"></td>
            </tr>
            <tr>
                <td>Yazar:</td>
                <td><input type="text" name="yazar"></td>
            </tr>
            <tr>
                <td>Mesajınız:</td>
                <td><textarea name="mesaj" rows="10" cols="40"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="konu_ac" value="Konuyu Oluştur"></td>
            </tr>
        </table>
    </form>
    <a href="index.php">İptal</a>
</center>
</body>
</html>
