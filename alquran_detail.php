<?php
$id_surat = $_GET['surat'];
$nama = $_GET['nama_surat'];
$curl = curl_init();	
curl_setopt_array($curl, array(
CURLOPT_URL => "https://al-quran-8d642.firebaseio.com/surat/".$id_surat.".json",
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

$count= count($data);
			
?>

<style type="text/css">
	@import url(https://fonts.googleapis.com/css2?family=Scheherazade&display=swap);

	.arab {
	  font-family: 'Scheherazade', serif;
	  font-size: 2em;
	}
</style>

<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center mb-3">QS. <?=$nama?></h3>

			<div class="row">
				<div class="col-10 offset-1 mb-2">
					<?php
					for($i=0;$i<$count;$i++){
					?>
					<div class="card mb-3">
						<div class="card-body">
							<?php
							echo "<p class='text-right arab'>".$data[$i]['ar']."</p>";
							echo $data[$i]['id'];
							?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>