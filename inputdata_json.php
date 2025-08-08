<?php
// Definisikan nama file JSON
define('FILE_JSON', 'peserta.json');

// Cek jika file JSON belum ada, maka buat file kosong
function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

// Fungsi untuk membaca data dari file JSON
function bacaDataJson() {
    return json_decode(file_get_contents(FILE_JSON), true);
}

// Proses saat form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Panggil prosedur cek file
    cekFileJson();

    // Ambil data dari form
    $kode = $_POST['kode'];
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $nohp   = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    // Baca data lama
    $data_peserta = bacaDataJson();

    // Cek apakah nama peserta sudah ada
    for ($i=0; $i < count($data_peserta); $i++){
        if ($data_peserta[$i]['kodep']===$kode){
            echo "<script>alert('Data dengan kode $kode sudah ada !');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
            exit();
        }
    }

    // Tambahkan data baru ke array
    $data_peserta[] = [
        'kodep' => $kode,
        'nama'  => $nama,
        'email' => $email,
        'nohp'  => $nohp,
        'alamat' => $alamat
    ];

    // Simpan kembali ke file JSON
    file_put_contents(FILE_JSON, json_encode($data_peserta, JSON_PRETTY_PRINT));

    // Tampilkan pesan sukses
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
    echo "<script>window.location.href = 'index.html';</script>";
    <center><h5>&copy; 2025 <a href="#">Syarif NurHidayah</a></h5></center>
}
?>
