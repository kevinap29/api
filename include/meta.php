<meta charset="UTF-8">
    <?php
      if ($_GET['page']=='cekongkir') {
        echo '<title>API CEK ONGKIR</title>';
      }elseif ($_GET['page']=='alquran') {
        echo '<title>API AL-QURAN</title>';
      }elseif ($_GET['page']=='alquran-detail') {
        echo '<title>Surat '.$_GET['nama'].'</title>';
      }elseif ($_GET['page']=='home'){
        echo '<title>DASHBOARD</title>';
      }
    ?>