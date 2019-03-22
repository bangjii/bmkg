# BMKG

BMKG web content scraper, mengambil konten cuaca dan gempa dan menampilkan data dalam bentuk JSON

## Getting Started

Untuk mengakses API ini dapat langsung menggunakan url:

```
http://your.server.com/bmkg/?menu=%menu%&wilayah=%wilayah%
```

Dengan paramater 
* menu: cuaca | gempa
* wilayah: bisa diisi nama provinsi seperti "dki jakarta", atau diisi "list" untuk melihat list provinsi yang terdaftar.
contoh:

```
http://your.server.com/bmkg/?menu=cuaca&wilayah=jambi
http://your.server.com/bmkg/?menu=cuaca&wilayah=list
```

dan akan menghasilkan data JSON

```
	{
		"Kota":"Bangko",
		"Pagi":"Berawan",
		"Siang":"Hujan Lokal",
		"Malam":"Hujan Petir",
		"Dini Hari":"Kabut",
		"Suhu( \u00c2\u00b0C )":"23 - 30",
		"Kelembaban( % )":"65 - 100"
	}
```
untuk gempa:

```
http://your.server.com/bmkg/?menu=gempa
```

yang akan menampilkan 200 data realtime gempa berdasarkan pengukuran (tanpa pemeriksaan data)

```
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
```
## Demo Page

List Provinsi
```
http://iotcampus.net/bmkg/?menu=cuaca&wilayah=list
```
Prakiraan Cuaca Daerah Jambi
```
http://iotcampus.net/bmkg/?menu=cuaca&wilayah=jambi
```
200 Gempa Yang Terdeteksi
```
http://iotcampus.net/bmkg/?menu=gempa
```

## Sumber Data

* [Data Gempa](https://inatews.bmkg.go.id/light/?act=realtimeev) - 200 data realtime gempa
* [Data Cuaca](https://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=07&NamaProv=DKI%20Jakarta) - Data cuaca DKI Jakarta hari ini

## Authors

* **Hudzaifah Al Jihad** - *Initial work* - [bangjii](https://github.com/bangjii)
