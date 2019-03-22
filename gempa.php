<?php
	/*
		BMKG API web scrapping :D
		function untuk mengambil data gempa
		file name : gempa.php
		Created : 14 November 2018
		by : bangjii (al.ghifari22@gmail.com)
		http://iotcampus.net/bmkg/?menu=gempa
		keterangan : akan menampilkan 200 data realtime gempa
					berdasarkan pengukuran (tanpa pemeriksaan)
		contoh :
		{
			"Status":"Automatic",
			"Tanggal":"2018\/11\/13",
			"Jam (UTC)":"20:58:32.556",
			"Lintang":"-2.98",
			"Bujur":"119.53",
			"Kedalaman":"10",
			"M":"3.2",
			"MT":"-",
			"Region":"Sulawesi, Indonesia"
		}
		
	*/
function gempa(){	 
	$arrContextOptions=array(
		"ssl"=>array(
			"verify_peer"=>false,
			"verify_peer_name"=>false,
		),
	);
	$htmlContent = file_get_contents(
						"http://inatews.bmkg.go.id/light/?act=realtimeev", 
						false, 
						stream_context_create($arrContextOptions)
					);	
	
	$internalErrors = libxml_use_internal_errors(true);	
	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);	
	$xpath = new DOMXPath($DOM); 
	
	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('td');
	libxml_use_internal_errors($internalErrors);
	foreach($Header as $NodeHeader){
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
	}
	//@$jmlHeader = count($aDataTableHeaderHTML);
	//print_r($aDataTableHeaderHTML);
	
	$i = 0;
	$j = 0;
	foreach($Detail as $sNodeDetail){
		$aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
		$i = $i + 1;
		$j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
	}
	//echo count($aDataTableDetailHTML);
	
	for($i = 0; $i < count($aDataTableDetailHTML); $i++){
		for($j = 0; $j < count($aDataTableHeaderHTML); $j++){
			$aTempData[$i][$aDataTableHeaderHTML[$j]] = $aDataTableDetailHTML[$i][$j];
		}
	}
	$aDataTableDetailHTML = $aTempData; 
	unset($aTempData);
	//print_r($aDataTableDetailHTML); 
	//echo "<br/>";
	$js = json_encode($aDataTableDetailHTML);
	//print($js);
	return $js;
	die();
}	
?>