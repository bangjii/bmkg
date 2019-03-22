<?php
	/*
		BMKG API web scrapping :D
		function untuk mengambil data cuaca berdasarkan
		provinsi yang terdaftar
		file name : cuaca.php
		Created : 14 November 2018
		by : bangjii (al.ghifari22@gmail.com)
		http://iotcampus.net/bmkg/?menu=%menu%&wilayah=%wilayah%
		menu : 	cuaca
		wilayah : bisa diisi nama provinsi seperti "dki jakarta", "aceh"
				atau diisi "list" untuk melihat list provinsi yang terdaftar
		keterangan : akan menampilkan data cuaca per hari ini berdasarkan 
				provinsi yang dimasukkan kedalam parameter wilayah.
		http://iotcampus.net/bmkg/?menu=cuaca&wilayah=jambi
		contoh :
		{
			"Kota":"Bangko",
			"Pagi":"Berawan",
			"Siang":"Hujan Lokal",
			"Malam":"Hujan Petir",
			"Dini Hari":"Kabut",
			"Suhu( \u00c2\u00b0C )":"23 - 30",
			"Kelembaban( % )":"65 - 100"
		}
		http://iotcampus.net/bmkg/?menu=cuaca&wilayah=list	
		contoh :
		["Aceh,Bali,Bangka Belitung,Banten,Bengkulu,DI Yogyakarta,DKI Jakarta,Gorontalo,...]
		
	*/
function cuaca($wil){
	switch ($wil) {
		case "aceh":
		case "banda aceh":
		case "bandaaceh":
			$url = "?Prov=01&NamaProv=Aceh";
			break;
		case "bali":
			$url = "?Prov=02&NamaProv=Bali";
			break;
		case "bangka belitung":
		case "babel":
			$url = "?Prov=03&NamaProv=Bangka%20Belitung";
			break;
		case "banten":
			$url = "?Prov=04&NamaProv=Banten";
			break;
		case "bengkulu":
			$url = "?Prov=05&NamaProv=Bengkulu";
			break;
		case "di yogyakarta":
		case "diy yogyakarta":
		case "diy jogyakarta":
		case "jogyakarta":
		case "diy":
			$url = "?Prov=06&NamaProv=DI%20Yogyakarta";
			break;
		case "dki jakarta":
		case "jakarta":
			$url = "?Prov=07&NamaProv=DKI%20Jakarta";
			break;
		case "gorontalo":
			$url = "?Prov=08&NamaProv=Gorontalo";
			break;
		case "jambi":
			$url = "?Prov=09&NamaProv=Jambi";
			break;
		case "jawa barat":
		case "jabar":
			$url = "?Prov=10&NamaProv=Jawa%20Barat";
			break;
		case "jawa tengah":
		case "jateng":
			$url = "?Prov=11&NamaProv=Jawa%20Tengah";
			break;
		case "jawa timur":
		case "jatim":
			$url = "?Prov=12&NamaProv=Jawa%20Timur";
			break;
		case "kalimantan barat":
		case "kalbar":
			$url = "?Prov=13&NamaProv=Kalimantan%20Barat";
			break;
		case "kalimantan selatan":
		case "kalsel":
			$url = "?Prov=14&NamaProv=Kalimantan%20Selatan";
			break;	
		case "kalimantan tengah":
		case "kalteng":
			$url = "?Prov=15&NamaProv=Kalimantan%20Tengah";
			break;
		case "kalimantan timur":
		case "kaltim":
			$url = "?Prov=16&NamaProv=Kalimantan%20Timur";
			break;
		case "kalimantan utara":
		case "kalut":
			$url = "?Prov=17&NamaProv=Kalimantan%20Utara";
			break;
		case "kepulauan riau":
		case "kepri":
			$url = "?Prov=18&NamaProv=Kepulauan%20Riau";
			break;
		case "lampung":
		case "bandar lampung":
		case "bandarlampung":
			$url = "?Prov=19&NamaProv=Lampung";
			break;
		case "maluku":
		case "ambon":
			$url = "?Prov=20&NamaProv=Maluku";
			break;
		case "maluku utara":
		case "malut":
		case "ternate":
			$url = "?Prov=21&NamaProv=Maluku%20Utara";
			break;
		case "nusa tenggara barat":
		case "ntb":
			$url = "?Prov=22&NamaProv=Nusa%20Tenggara%20Barat";
			break;
		case "nusa tenggara timur":
		case "ntt":
			$url = "?Prov=23&NamaProv=Nusa%20Tenggara%20Timur";
			break;
		case "papua":
		case "jayapura":
			$url = "?Prov=24&NamaProv=Papua";
			break;
		case "papua barat":
			$url = "?Prov=25&NamaProv=Papua%20Barat";
			break;
		case "riau":
			$url = "?Prov=26&NamaProv=Riau";
			break;
		case "sulawesi barat":
		case "sulbar":
			$url = "?Prov=27&NamaProv=Sulawesi%20Barat";
			break;
		case "sulawesi selatan":
		case "sulsel":
			$url = "?Prov=28&NamaProv=Sulawesi%20Selatan";
			break;
		case "sulawesi tengah":
		case "sulteng":
			$url = "?Prov=29&NamaProv=Sulawesi%20Tengah";
			break;
		case "sulawesi tenggara":
		case "sultra":
			$url = "?Prov=30&NamaProv=Sulawesi%20Tenggara";
			break;
		case "sulawesi utara":
		case "sulut":
			$url = "?Prov=31&NamaProv=Sulawesi%20Utara";
			break;
		case "sumatra barat":
		case "sumatera barat":
		case "sumbar":
			$url = "?Prov=32&NamaProv=Sumatera%20Barat";
			break;
		case "sumatra selatan":
		case "sumatera selatan":
		case "sumsel":
			$url = "?Prov=33&NamaProv=Sumatera%20Selatan";
			break;
		case "sumatra utara":
		case "sumatera utara":
		case "sumut":
			$url = "?Prov=34&NamaProv=Sumatera%20Utara";
			break;
		case "indonesia":
			$url = "?Prov=35&NamaProv=Indonesia";
			break;
		case "list":
			$lst = json_encode(array(
							"Aceh,Bali,Bangka Belitung,Banten,Bengkulu,DI Yogyakarta,DKI Jakarta,Gorontalo,Jambi,Jawa Barat,Jawa Tengah,Jawa Timur,Kalimantan Barat,Kalimantan Selatan,Kalimantan Tengah,Kalimantan Timur,Kalimantan Utara,Kepulauan Riau,Lampung,Maluku,Maluku Utara,Nusa Tenggara Barat,Nusa Tenggara Timur,Papua,Papua Barat,Riau,Sulawesi Barat,Sulawesi Selatan,Sulawesi Tengah,Sulawesi Tenggara,Sulawesi Utara,Sumatera Barat,Sumatera Selatan,Sumatera Utara,Indonesia"
					));
			return $lst;
			die();
		default:
			$err = json_encode(array("error provinsi not found!"));
			return $err;
			die();
	}
				
	$html = "http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg" . $url;
	$tempat = "";
	$prdom = new DOMDocument;
	libxml_use_internal_errors(true);
	$prdom->loadHTMLFile($html);
	libxml_use_internal_errors(false);
	$xpath = new DOMXPath($prdom);
	$tbp = 1;
	$idTab = '//div[@id="TabPaneCuaca' . $tbp . '"]';
	$divTag = $xpath->query($idTab);
	if($divTag->length == 0){
		for ($z = 2; $z <= 3; $z++){
			$idTab = '//div[@id="TabPaneCuaca' . $z . '"]';
			$divTag = $xpath->query($idTab);
			if($divTag->length == 0){
				break;
			}
		}
	}
	
	foreach ($divTag as $val) {
		$tempat .= $prdom->saveXML($val);
	}
	
	$internalErrors = libxml_use_internal_errors(true);	
	$DOM = new DOMDocument();
	$DOM->loadHTML($tempat);	
	$xpath = new DOMXPath($DOM);   
	
	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('td');
	//struktur table
	$head1 =  array("Kota", "Pagi", "Siang", "Malam", "Dini Hari", "Suhu", "Kelembaban");
	$head2 =  array("Kota", "Siang", "Malam", "Dini Hari", "Suhu", "Kelembaban");
	$head3 =  array("Kota", "Malam", "Dini Hari", "Suhu", "Kelembaban");
	$head4 =  array("Kota", "Dini Hari", "Suhu", "Kelembaban");
	libxml_use_internal_errors($internalErrors);
	
	foreach($Header as $NodeHeader){
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
	}
	@$jmlHeader = count($aDataTableHeaderHTML);
	switch ($jmlHeader) {
		case 8:					//klo full pagi sampe larut dan 3 hari
			$head = $head1;
			break;
		case 7:					//klo - pagi dan 1 hari
			$head = $head2;
			break;
		case 6:					//klo - pagi siang dan 1 hari
			//echo "Your favorite color is " . $jmlHeader;
			$head = $head3;
			break;
		case 5:					//klo dini hari doang dan 1 hari
			$head = $head4;
			break;
		default:
			$err = json_encode(array("error data not found!"));
			print($err);
			die();
	}
	$i = 0;
	$j = 0;
	foreach($Detail as $sNodeDetail){
		$aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
		$i = $i + 1;
		$j = $i % count($head) == 0 ? $j + 1 : $j;
	}
	for($i = 0; $i < count($aDataTableDetailHTML); $i++){
		for($j = 0; $j < count($head); $j++){
			$aTempData[$i][$head[$j]] = $aDataTableDetailHTML[$i][$j];
		}
	}
	$aDataTableDetailHTML = $aTempData; 
	unset($aTempData);
	$js = json_encode($aDataTableDetailHTML);
	return $js;
	die();
}
?>