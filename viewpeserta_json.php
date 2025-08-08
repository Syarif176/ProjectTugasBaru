<style>
    /* Gaya untuk tabel */
    table {
        width: 80%;
        border-collapse: collapse;
		margin: 20px Auto;
    }

    /* Gaya untuk judul tabel */
    th {
        background-color: #4CAF50;  /* Warna latar belakang hijau untuk judul */
        color: white;  /* Warna teks putih */
        padding: 10px;
        text-align: left;
    }

    /* Gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;  /* Garis bawah pada setiap baris */
    }

    /* Warna selang-seling pada baris data */
    tr:nth-child(odd) {
        background-color: #f2f2f2;  /* Warna abu-abu terang untuk baris ganjil */
    }

    tr:nth-child(even) {
            background-color: #ffffff;  /* Warna putih untuk baris genap */
    }

    /* Gaya untuk tabel ketika disorot */
    tr:hover {
        background-color: #ddd;  /* Warna latar belakang saat baris disorot */
    }
</style>

<?php
define('FILE_JSON', 'peserta.json');

function cekFileJson() {
    if(!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);	
    return json_decode($json, true);
}

$data_peserta = cekFileJson();
$total_data = count($data_peserta);
if ($total_data == 0) {
    echo "<p>Belum ada data peserta yang disimpan.</p>";
} else {
	echo "<table border='1'>
		  <th>No</th>
		  <th>Kode Peserta</th>
		  <th>Nama Peserta</th>
		  <th>Email</th>
		  <th>No Hp</th>
          <th>Alamat</th>";

	for ($i = 0; $i < $total_data; $i++) 
	{
		$peserta = $data_peserta[$i];
		
		// Menampilkan No
		echo "<tr>";
        echo "<td>" .($i + 1) ."</td>";
		
        // Menampilkan Kode Peserta
		echo "<td>" .htmlspecialchars($peserta['kodep'])	."</td>";

		// Menampilkan Nama Peserta
		echo "<td>" .htmlspecialchars($peserta['nama'])	."</td>";
		
		// Menampilkan Email
		echo "<td>" .htmlspecialchars($peserta['email'])	."</td>";	
		
		// Menampilkan No Hp
		echo "<td>" .htmlspecialchars($peserta['nohp']) ."</td>";	
		
		// Menampilkan Alamat
		echo "<td>" .htmlspecialchars($peserta['alamat']) 	."</td>";	
		
		echo "</tr>";
	}
    
	echo "</table>";
	
	echo "<center><button onclick='window.location.href=\"index.html\";'>Back</button></center>";
    
}

?>