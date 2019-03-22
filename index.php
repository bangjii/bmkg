<?php
	/*
		BMKG API web scrapping :D
		file name : index.php
		Created : 14 November 2018
		by : bangjii (al.ghifari22@gmail.com)
		http://iotcampus.net/bmkg/?menu=%menu%&wilayah=%wilayah%
		menu : 	- cuaca
				- gempa
		wilayah : bisa diisi nama provinsi seperti "dki jakarta", "aceh"
				atau diisi "list" untuk melihat list provinsi yang terdaftar
		contoh :
		http://iotcampus.net/bmkg/?menu=cuaca&wilayah=jambi
		http://iotcampus.net/bmkg/?menu=cuaca&wilayah=list
		http://iotcampus.net/bmkg/?menu=gempa
		
	*/
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include "./gempa.php";
	include "./cuaca.php";
	$menu = $_GET['menu'];
	$wilayah = $_GET['wilayah'];
	if(isset($menu)){
		if($menu == "cuaca"){
			if(isset($wilayah)){
				$wil = strtolower($wilayah);
				if($wil != ""){
					$cuacaJson = cuaca($wil);
					print($cuacaJson);
				}
			}
		}
		elseif($menu == "gempa"){
			$gempaJson = gempa();
			print($gempaJson);
		} else {
			$err = json_encode(array("error wrong parameter!"));
			print($err);
			die();
		}
	} else {
		$err = json_encode(array("error wrong method!"));
		print($err);
		die();
	}
?>