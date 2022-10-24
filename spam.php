<?php
echo "
$$$$$$\  $$\                            $$\     $$\           $$\                     $$\             $$\     
$$  __$$\ $$ |                           $$ |    \__|          \__|                    \__|            $$ |    
$$ /  \__|$$ |  $$\  $$$$$$\   $$$$$$\ $$$$$$\   $$\ $$\   $$\ $$\  $$$$$$\  $$$$$$$\  $$\  $$$$$$$\ $$$$$$\   
\$$$$$$\  $$ | $$  |$$  __$$\ $$  __$$\\_$$  _|  $$ |\$$\ $$  |$$ |$$  __$$\ $$  __$$\ $$ |$$  _____|\_$$  _|  
 \____$$\ $$$$$$  / $$$$$$$$ |$$ /  $$ | $$ |    $$ | \$$$$  / $$ |$$ /  $$ |$$ |  $$ |$$ |\$$$$$$\    $$ |    
$$\   $$ |$$  _$$<  $$   ____|$$ |  $$ | $$ |$$\ $$ | $$  $$<  $$ |$$ |  $$ |$$ |  $$ |$$ | \____$$\   $$ |$$\ 
\$$$$$$  |$$ | \$$\ \$$$$$$$\ $$$$$$$  | \$$$$  |$$ |$$  /\$$\ $$ |\$$$$$$  |$$ |  $$ |$$ |$$$$$$$  |  \$$$$  |
 \______/ \__|  \__| \_______|$$  ____/   \____/ \__|\__/  \__|\__| \______/ \__|  \__|\__|\_______/    \____/ 
                              $$ |                                                                             
                              $$ |                                                                             
                              \__|                                                                             
\n\n";

function spamCall($api, $nomer, $jumlah)
{
    $url = "https://spamertelpon.herokuapp.com/v1?key=" . $api . "&target=" . $nomer;
    $loop = 0;
    while ($loop < $jumlah) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($response, true);
        if ($res['status'] != "true") {
            echo "Minimal beli Api Key! \n";
        } else {
            echo "Spam ke " . $loop . " berhasil dikirim! \n";
        }
        sleep(30);
        $loop++;
    }
}

echo "Masukan Nomor : ";
$nomor = trim(fgets(STDIN));
echo "Masukan Jumlah : ";
$jumlah = trim(fgets(STDIN));
echo "Masukan Key : ";
$key = trim(fgets(STDIN));

spamCall($key, $nomor, $jumlah);
