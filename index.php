<?php include("ayar.php"); ?>
<html>
<head>
    <title>Efsane Forum v1.0</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body { font-family: Verdana, Arial, sans-serif; font-size: 12px; background-color: #f0f0f0; }
        .tablo { border: 1px solid #000000; background-color: #ffffff; }
        .baslik { background-color: #006699; color: #ffffff; font-weight: bold; padding: 5px; }
        td { padding: 5px; }
        a { text-decoration: none; color: #003366; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<center>
    <h1>Efsane Forum Scripti</h1>
    <a href="index.php">[Ana Sayfa]</a> &nbsp; <a href="yeni_konu.php">[+ Yeni Konu Aç]</a>
    <br><br>

    <table width="800" border="0" cellspacing="1" cellpadding="0" class="tablo">
        <tr class="baslik">
            <td width="60%">Konu Başlığı</td>
            <td width="20%">Yazar</td>
            <td width="20%">Tarih</td>
        </tr>

        <?php
        $sorgu = mysqli_query($baglanti, "SELECT * FROM konular ORDER BY id DESC");
        
        while($satir = mysqli_fetch_array($sorgu)) {
            echo "<tr>";
            echo "<td bgcolor='#eeeeee'><a href='konu.php?id=".$satir['id']."'><b>".$satir['baslik']."</b></a></td>";
            echo "<td bgcolor='#e0e0e0'>".$satir['yazar']."</td>";
            echo "<td bgcolor='#eeeeee'>".$satir['tarih']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <font size="1" color="gray">Powered by PHP & MySQL (2000s Edition)</font>
</center>

</body>
</html>
