<?php
$token = "5941934417:AAHpA0NTtLqPtQj4ePV-3GrvD_F2u967Z4I";
$chat_id = "677083459";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$message = "Nama: $nama\nEmail: $email\nPesan: $pesan";

$telegram_url = "https://api.telegram.org/bot$token/sendMessage";

// Menambahkan data langsung ke URL untuk menghindari ketergantungan pada cookies
$telegram_url .= '?' . http_build_query([
    'chat_id' => $chat_id,
    'text' => $message,
]);

$ch = curl_init($telegram_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Mengatur metode permintaan menjadi GET dan mengabaikan setiap cookie
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HEADER, false);

// Menjalankan permintaan
$response = curl_exec($ch);
