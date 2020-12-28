<?php
$curl = curl_init();	
curl_setopt_array($curl, array(
CURLOPT_URL => "https://al-quran-8d642.firebaseio.com/data.json",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => "",
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$data = json_decode($response, true);

$count = count($data);			
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-3">Al-Qur'an</h3>

            <div class="row">
            <?php
                for ($i=0; $i < $count ; $i++) { 
            ?>
                <div class="col-3 mb-3 d-flex align-item-stretch">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h6 class="card-title text-white"><?=($i+1).". ".$data[$i]['nama']?></h6>
                        </div>
                        <div class="card-body">
                            <?php
                                $string = strip_tags($data[$i]['keterangan']);
                                if (strlen($string)>150) {
                                    $stringCut = substr($string,0,150);
                                    $sendPoint = strpos($stringCut, ' ');
                                    $string = $endPoint? substr($stringCut,0,$endPoint) :substr($stringCut, 0);
                                    $string .= '<br>
                                    <a href="home.php?page=alquran-detail&surat='.$data[$i]['nomor'].'&nama='.$data[$i]['nama'].'" 
                                    class="btn btn-sm btn-primary mt-3" target="_blank">
                                        Selengkapnya
                                    </a>';
                                }
                                echo $string;
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>