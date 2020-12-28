<?php
if ($_GET['page']=='cekongkir') {
    echo '<h1 class="card-title">Cek Ongkir API</h1>';
  }elseif ($_GET['page']=='alquran') {
    echo '<h1 class="card-title">Al-Quran API</h1>';
  }elseif ($_GET['page']=='alquran-detail') {
    echo '<h1 class="card-title">Surat '.$_GET['nama'].'</h1>';
  }elseif ($_GET['page']=='home'){
    echo '<h1 class="card-title">Dashboard</h1>';
  }
?>