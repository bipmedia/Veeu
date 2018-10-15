<?php
// FB : Manggala Febri Valentino
// Not For Sale 
// THX TO SGB TEAM
function veeu($task, $token, $wait, $jumlah){
    $x = 0;
    $sigeKontol = 0;
    while(true) {
	    $kontol = $token[$sigeKontol];
		$body = 'sgbcode='.urlencode('SGB-Harits19').'&sgbsecret=4ceb4615325e564e3c38c86641e1f49f&task='.$task.'&token='.urlencode(trim($kontol));
				
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api-siptruk.c9users.io/veeu.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: api-siptruk.c9users.io","User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36"));
        $server_output = curl_exec ($ch);
        curl_close ($ch);
		echo $server_output."\nToken Saat ini : ".$kontol." Sedang dalam Perulangan Ke : ".$x;
        sleep($wait);
        if($x == $jumlah){
        	if($kontol == NULL){
             	die("Token Dah Habis");
            }else{
                $sigeKontol++;
                $x = 0;
            }
        }
        $x++;
        flush();
    }
}
print "TUYUL COIN APP VEEU\n\n";
echo "TASK ID ?\nInput : ";
$task = trim(fgets(STDIN));
echo "TOKEN?\nInput Nama File : ";
$token = trim(fgets(STDIN));
$token = file_get_contents($token);
$token = explode("\n",$token);
echo "Token Sebanyak : ".count($token)."\n";
echo "Input Jumlah\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda? 0-9999999999 (ex:0)\nInput : ";
$wait = trim(fgets(STDIN));
$execute = veeu($task, $token, $wait, $jumlah);
print $execute;
print "DONE ALL SEND\n";
?>
