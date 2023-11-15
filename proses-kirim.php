<?php
$token = "TOKEN_BOT_ANDA";
$chat_id = "CHAT_ID_ANDA";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$message = "Nama: $nama\nEmail: $email\nPesan: $pesan";

$telegram_url = "https://api.telegram.org/bot$token/sendMessage";
$params = [
    'chat_id' => $chat_id,
    'text' => $message,
];

$ch = curl_init($telegram_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

echo "Pesan telah dikirim ke Telegram!";
?>
