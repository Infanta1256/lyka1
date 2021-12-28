<?php @system("clear");

$yellow = "[0;93m";
echo "$yellow
";
echo "******************************************************
- - -  A  U  T  O  M  A  T  I  C  - - -
•°•UPLOADS•°•MOMENTS•°•MAXRATE•°•HARVEST•°•
******************************************************";
//  $';
$ow = "[0;92m";
echo "$ow
";
$dummyarray = [];
$NoofDum = readline('NUMBER OF DUMMY TO USE?: ');
for ($x = 0;$x < $NoofDum;$x++) {
    $Dummy = readline('DUMMY USERNAME: ');
    array_push($dummyarray, "$Dummy",);
}
$pass = readline('DUMMY PASSWORD: ');

$yellow = "[1;31m";
echo "$yellow";
$user2 = readline('MAIN USERNAME 1: ');
$user322 = readline('MAIN USERNAME 2: ');
$user122 = readline('MAIN USERNAME 3: ');
$user022 = readline('MAIN USERNAME 4: ');

foreach ($dummyarray as $user) {
    $green = "[1;34m";
    echo "$green";
    $urll = "https://identity.mylykaapps.com/useraccounts/login";
    $curll = curl_init($urll);
    curl_setopt($curll, CURLOPT_URL, $urll);
    curl_setopt($curll, CURLOPT_POST, true);
    curl_setopt($curll, CURLOPT_RETURNTRANSFER, true);
    $headerss = array("Content-Type: application/json", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)");
    curl_setopt($curll, CURLOPT_HTTPHEADER, $headerss);
    $dataa = <<<DATA
{
  "countryCode": "US",
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNG:APA91bEZnWo-TDdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VODiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-gz",
    "osVersion": "28"
  },
  "password": "$pass",
  "username": "$user"
}
DATA;
    curl_setopt($curll, CURLOPT_POSTFIELDS, $dataa);
    $respp = curl_exec($curll);
    curl_close($curll);
    //var_dump($respp);
    $jsonn = json_decode($respp);
    $msgn = $jsonn->message;
    $status = $jsonn->status;
    $vuser = $jsonn->data->username;
    $bearer = $jsonn->data->token->accessToken;
    echo $yellow = "[1;33m";
    echo "$yellow
$vuser was logged in
";
  $urlbal = "https://wallets.mylykaapps.com/api/v3/wallets/getgems?os=android";
  $curlbal = curl_init($urlbal);
  curl_setopt($curlbal, CURLOPT_URL, $urlbal);
  curl_setopt($curlbal, CURLOPT_RETURNTRANSFER, true);   $headersbal = array("authorization: Bearer $bearer",);
  curl_setopt($curlbal, CURLOPT_HTTPHEADER, $headersbal);
  $respbal = curl_exec($curlbal);
  curl_close($curlbal);
  //var_dump($respbal);
  $jsonbal = json_decode($respbal);
  $tg = $jsonbal->data->totalGem;
  echo "
  MINER BALANCE : $tg GEMS
  ";
  echo " 
  $vuser  Digging POST OF $user2
  ";
  if ($status == 0) {
        echo "Wrong dummy passwor
";
        //echo $bearer;
        //////
        
    }
    if ($status == 1) {
        $urlm = "https://users.mylykaapps.com/api/v3/users/searchsuggestedpeople?searchText=$user2&os=android&pageIndex=1&pageSize=16";
        $curlm = curl_init($urlm);
        curl_setopt($curlm, CURLOPT_URL, $urlm);
        curl_setopt($curlm, CURLOPT_RETURNTRANSFER, true);
        $headersm = array("user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)", "authorization: Bearer $bearer",);
        curl_setopt($curlm, CURLOPT_HTTPHEADER, $headersm);
        $respm = curl_exec($curlm);
        curl_close($curlm);
        //var_dump($respm);
        $jsonm = json_decode($respm, true);
        $uid = $jsonm["data"]["0"]["id"];
        $vvuser = $jsonm["data"]["0"]["userName"];
        //cho $vvuser;
        //echo $uid;
        
    }
    /*if($vvuser == $user2){
    $urlg = "https://profiles.mylykaapps.com/api/v3/profiles/GetUser";
    //$bearer2 = $jsonn2->data->token->accessToken;
    $curlg = curl_init($urlg);
    curl_setopt($curlg, CURLOPT_URL, $urlg);
    curl_setopt($curlg, CURLOPT_POST, true);
    curl_setopt($curlg, CURLOPT_RETURNTRANSFER, true);
    
    $headersg = array(
    "authorization: Bearer $bearer",
    "Content-Type: application/json",
    );
    curl_setopt($curlg, CURLOPT_HTTPHEADER, $headersg);
    
    $datag = <<<DATA
    {
    "type": "username",
    "username": "$user2"
    }
    DATA;
    
    curl_setopt($curlg, CURLOPT_POSTFIELDS, $datag);
    
    
    $respg = curl_exec($curlg);
    curl_close($curlg);
    //var_dump($respg);
    $jsong = json_decode($respg);
    $uid = $jsong->data->id;
    //echo $uid;
    $uname = $jsong->data->userName;
    $green="[1;32m";
    echo "$green$uname is RATED
    ";
    //$gmsg = $jsong->data->message;
    }
    */
    if ($user2 == $vvuser) {
        $urld = "https://profiles.mylykaapps.com/api/v3/profiles/GetProfilePosts?os=android&pageIndex=1&pageSize=50&id=$uid&category=ALL";
        $curld = curl_init($urld);
        curl_setopt($curld, CURLOPT_URL, $urld);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $headersd = array("authorization: Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)",);
        curl_setopt($curld, CURLOPT_HTTPHEADER, $headersd);
        $respd = curl_exec($curld);
        curl_close($curld);
        $jsond = json_decode($respd, true);
        //var_dump($respd,true);
        /*function printValues($arr) {
        global $count;
        global $values;
        
        // Check input is an array
        if(!is_array($arr)){
        die("ERROR: Input is not an array");
        }
        
        
        foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
        }
        
        // Return total count and values found in array
        return array('total' => $count, 'values' => $values);
        }
        */
        $arr = json_decode($respd, true);
        $p0 = $arr["data"]["0"]["id"];
        $p1 = $arr["data"]["1"]["id"];
        $p2 = $arr["data"]["2"]["id"];
        $p3 = $arr["data"]["3"]["id"];
        $p4 = $arr["data"]["4"]["id"];
        $p5 = $arr["data"]["5"]["id"];
        $p6 = $arr["data"]["6"]["id"];
        $p7 = $arr["data"]["7"]["id"];
        $p8 = $arr["data"]["8"]["id"];
        $p9 = $arr["data"]["9"]["id"];
        $p10 = $arr["data"]["10"]["id"];
        //echo $p9;
        //echo $p10;
        
    }
    $stat = $arr["status"];
    //echo $stat;
    if ($stat == 0) {
        echo "check your inputs";
    } elseif ($stat == 1) $yelow = "[1;34m";
    echo "$yelow";
    $url = "https://posts.mylykaapps.com/api/v3/posts/ratepost";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array("authorization:Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28))", "deviceos: android", "Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = <<<DATA

  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p0,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
    $json = json_decode($resp);
    $yelow = "[0;35m";
    echo "$yelow";
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl2 = curl_init($url);
    curl_setopt($curl2, CURLOPT_URL, $url);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
    $data2 = <<<DATA
{

  "device": {
      "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p1,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2);
    $resp2 = curl_exec($curl2);
    curl_close($curl2);
    //var_dump($resp2);
    $json2 = json_decode($resp2);
    echo $json2->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
    $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
    
echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl3 = curl_init($url);
    curl_setopt($curl3, CURLOPT_URL, $url);
    curl_setopt($curl3, CURLOPT_POST, true);
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl3, CURLOPT_HTTPHEADER, $headers);
    $data3 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p2,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl3, CURLOPT_POSTFIELDS, $data3);
    $resp3 = curl_exec($curl3);
    curl_close($curl3);
    //var_dump($resp2);
    $json3 = json_decode($resp3);
    echo $json3->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);

echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl4 = curl_init($url);
    curl_setopt($curl4, CURLOPT_URL, $url);
    curl_setopt($curl4, CURLOPT_POST, true);
    curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl4, CURLOPT_HTTPHEADER, $headers);
    $data4 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p3,
  "rate": 5,
  "userid": $uid 
}
DATA;
    curl_setopt($curl4, CURLOPT_POSTFIELDS, $data4);
    $resp4 = curl_exec($curl4);
    curl_close($curl4);
    //var_dump($resp2);
    $json4 = json_decode($resp4);
    echo $json4->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl5 = curl_init($url);
    curl_setopt($curl5, CURLOPT_URL, $url);
    curl_setopt($curl5, CURLOPT_POST, true);
    curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl5, CURLOPT_HTTPHEADER, $headers);
    $data5 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p4,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl5, CURLOPT_POSTFIELDS, $data5);
    $resp5 = curl_exec($curl5);
    curl_close($curl5);
    //var_dump($resp2);
    $json5 = json_decode($resp5);
    echo $json5->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl6 = curl_init($url);
    curl_setopt($curl6, CURLOPT_URL, $url);
    curl_setopt($curl6, CURLOPT_POST, true);
    curl_setopt($curl6, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl6, CURLOPT_HTTPHEADER, $headers);
    $data6 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p5,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl6, CURLOPT_POSTFIELDS, $data6);
    $resp6 = curl_exec($curl6);
    curl_close($curl6);
    //var_dump($resp2);
    $json6 = json_decode($resp6);
    echo $json6->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl7 = curl_init($url);
    curl_setopt($curl7, CURLOPT_URL, $url);
    curl_setopt($curl7, CURLOPT_POST, true);
    curl_setopt($curl7, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl7, CURLOPT_HTTPHEADER, $headers);
    $data7 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p6,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl7, CURLOPT_POSTFIELDS, $data7);
    $resp7 = curl_exec($curl7);
    curl_close($curl7);
    //var_dump($resp2);
    $json7 = json_decode($resp7);
    echo $json7->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl8 = curl_init($url);
    curl_setopt($curl8, CURLOPT_URL, $url);
    curl_setopt($curl8, CURLOPT_POST, true);
    curl_setopt($curl8, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl8, CURLOPT_HTTPHEADER, $headers);
    $data8 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p7,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl8, CURLOPT_POSTFIELDS, $data8);
    $resp8 = curl_exec($curl8);
    curl_close($curl8);
    //var_dump($resp2);
    $json8 = json_decode($resp8);
    echo $json8->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl9 = curl_init($url);
    curl_setopt($curl9, CURLOPT_URL, $url);
    curl_setopt($curl9, CURLOPT_POST, true);
    curl_setopt($curl9, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl9, CURLOPT_HTTPHEADER, $headers);
    $data9 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p8,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl9, CURLOPT_POSTFIELDS, $data9);
    $resp9 = curl_exec($curl9);
    curl_close($curl9);
    //var_dump($resp2);
    $json9 = json_decode($resp9);
    echo $json9->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
     $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $e = "[1;34m";
    echo "$e";
    $curl11 = curl_init($url);
    curl_setopt($curl11, CURLOPT_URL, $url);
    curl_setopt($curl11, CURLOPT_POST, true);
    curl_setopt($curl11, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl11, CURLOPT_HTTPHEADER, $headers);
    $data11 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p10,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl11, CURLOPT_POSTFIELDS, $data11);
    $resp11 = curl_exec($curl11);
    curl_close($curl11);
    //var_dump($resp11);
    $json11 = json_decode($resp11);
    echo $json11->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
 $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $e = "[1;34m";
    echo "$e";
    $curl10 = curl_init($url);
    curl_setopt($curl10, CURLOPT_URL, $url);
    curl_setopt($curl10, CURLOPT_POST, true);
    curl_setopt($curl10, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl10, CURLOPT_HTTPHEADER, $headers);
    $data10 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $p9,
  "rate": 5,
  "userid": $uid
}
DATA;
    curl_setopt($curl10, CURLOPT_POSTFIELDS, $data10);
    $resp10 = curl_exec($curl10);
    curl_close($curl10);
    //var_dump($resp2);
    $json10 = json_decode($resp10);
    echo $json10->message;
    $yelow = "[0;35m";
    echo "$yelow";
    sleep(1);
    $device_id = 'fcbe87b62342fbac';
    addPosts($vuser, $bearer, $device_id);
    addMoments($vuser, $bearer, $device_id);
echo "\n";


    

    $yell = "[0;32m";
    echo "$yell
";
    echo "==================================================";
    $e = "[1;34m";
    echo "$e";
    //  $';
    //$pass022 = readline('Enter Core pasword: ');
    //$pass;
    //pass022 = 'a022';
    //$user022 = '
    // For output
    $ow = "[1;33m";
    echo "$ow";
    echo "
$vuser is Digging $user022
";
    $urlm = "https://users.mylykaapps.com/api/v3/users/searchsuggestedpeople?searchText=$user022&os=android&pageIndex=1&pageSize=16";
    $curlm = curl_init($urlm);
    curl_setopt($curlm, CURLOPT_URL, $urlm);
    curl_setopt($curlm, CURLOPT_RETURNTRANSFER, true);
    $headersm = array("user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)", "authorization: Bearer $bearer",);
    curl_setopt($curlm, CURLOPT_HTTPHEADER, $headersm);
    $respm = curl_exec($curlm);
    curl_close($curlm);
    //var_dump($respm);
    $jsonm = json_decode($respm, true);
    $buid = $jsonm["data"]["0"]["id"];
    $bvvuser = $jsonm["data"]["0"]["userName"];
    //cho $bvvuser;
    //echo $buid;
    /*if($bvvuser == $user022){
    $urlg = "https://profiles.mylykaapps.com/api/v3/profiles/GetUser";
    //$bearer3 = $jsonn2->data->token->accessToken;
    $curlg = curl_init($urlg);
    curl_setopt($curlg, CURLOPT_URL, $urlg);
    curl_setopt($curlg, CURLOPT_POST, true);
    curl_setopt($curlg, CURLOPT_RETURNTRANSFER, true);
    
    $headersg = array(
    "authorization: Bearer $bearer",
    "Content-Type: application/json",
    );
    curl_setopt($curlg, CURLOPT_HTTPHEADER, $headersg);
    
    $datax = <<<DATA
    {
    "type": "username",
    "username": "$user022"
    }
    DATA;
    
    curl_setopt($curlg, CURLOPT_POSTFIELDS, $datax);
    
    $respg = curl_exec($curlg);
    curl_close($curlg);
    //var_dump($respg);
    $jsong = json_decode($respg);
    $xuid = $jsong->data->id;
    //echo $xuid;
    $uname = $jsong->data->userName;
    $green="[1;32m";
    echo "$green$uname is RATED
    ";
    //$gmsg = $jsong->data->message;
    }
    */
    if ($user022 == $bvvuser) {
        $urld = "https://profiles.mylykaapps.com/api/v3/profiles/GetProfilePosts?os=android&pageIndex=1&pageSize=50&id=$buid&category=ALL";
        $curld = curl_init($urld);
        curl_setopt($curld, CURLOPT_URL, $urld);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $headersd = array("authorization: Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)",);
        curl_setopt($curld, CURLOPT_HTTPHEADER, $headersd);
        $respd = curl_exec($curld);
        curl_close($curld);
        $jsond = json_decode($respd, true);
        //var_dump($respd,true);
        /*function printValues($arr) {
        global $count;
        global $values;
        
        // Check input is an array
        if(!is_array($arr)){
        die("ERROR: Input is not an array");
        }
        
        
        foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
        }
        
        // Return total count and values found in array
        return array('total' => $count, 'values' => $values);
        }
        */
        $arr = json_decode($respd, true);
        $op0 = $arr["data"]["0"]["id"];
        $op1 = $arr["data"]["1"]["id"];
        $op2 = $arr["data"]["2"]["id"];
        $op3 = $arr["data"]["3"]["id"];
        $op4 = $arr["data"]["4"]["id"];
        $op5 = $arr["data"]["5"]["id"];
        $op6 = $arr["data"]["6"]["id"];
        $op7 = $arr["data"]["7"]["id"];
        $op8 = $arr["data"]["8"]["id"];
        $op9 = $arr["data"]["9"]["id"];
        $op10 = $arr["data"]["10"]["id"];
        //echo $op10;
        //echo $op9;
        
    }
    $stat = $arr["status"];
    //echo $stat;
    if ($stat == 0) {
        echo "check your inputs
";
    } elseif ($stat == 1) $e = "[1;34m";
    echo "$e";
    sleep(1);
    $url = "https://posts.mylykaapps.com/api/v3/posts/ratepost";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array("authorization:Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28))", "deviceos: android", "Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data09 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op0,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data09);
    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
    $json = json_decode($resp);
    echo $json->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl2 = curl_init($url);
    curl_setopt($curl2, CURLOPT_URL, $url);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
    $data92 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op1,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data92);
    $resp2 = curl_exec($curl2);
    curl_close($curl2);
    //var_dump($resp2);
    $json2 = json_decode($resp2);
    echo $json2->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl3 = curl_init($url);
    curl_setopt($curl3, CURLOPT_URL, $url);
    curl_setopt($curl3, CURLOPT_POST, true);
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl3, CURLOPT_HTTPHEADER, $headers);
    $data93 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op2,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl3, CURLOPT_POSTFIELDS, $data93);
    $resp3 = curl_exec($curl3);
    curl_close($curl3);
    //var_dump($resp2);
    $json3 = json_decode($resp3);
    echo $json3->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl4 = curl_init($url);
    curl_setopt($curl4, CURLOPT_URL, $url);
    curl_setopt($curl4, CURLOPT_POST, true);
    curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl4, CURLOPT_HTTPHEADER, $headers);
    $data94 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op3,
  "rate": 5,
   "userid": $buid 
}
DATA;
    curl_setopt($curl4, CURLOPT_POSTFIELDS, $data94);
    $resp4 = curl_exec($curl4);
    curl_close($curl4);
    //var_dump($resp2);
    $json4 = json_decode($resp4);
    echo $json4->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl5 = curl_init($url);
    curl_setopt($curl5, CURLOPT_URL, $url);
    curl_setopt($curl5, CURLOPT_POST, true);
    curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl5, CURLOPT_HTTPHEADER, $headers);
    $data95 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op4,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl5, CURLOPT_POSTFIELDS, $data95);
    $resp5 = curl_exec($curl5);
    curl_close($curl5);
    //var_dump($resp2);
    $json5 = json_decode($resp5);
    echo $json5->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl6 = curl_init($url);
    curl_setopt($curl6, CURLOPT_URL, $url);
    curl_setopt($curl6, CURLOPT_POST, true);
    curl_setopt($curl6, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl6, CURLOPT_HTTPHEADER, $headers);
    $data96 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op5,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl6, CURLOPT_POSTFIELDS, $data96);
    $resp6 = curl_exec($curl6);
    curl_close($curl6);
    //var_dump($resp2);
    $json6 = json_decode($resp6);
    echo $json6->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl7 = curl_init($url);
    curl_setopt($curl7, CURLOPT_URL, $url);
    curl_setopt($curl7, CURLOPT_POST, true);
    curl_setopt($curl7, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl7, CURLOPT_HTTPHEADER, $headers);
    $data97 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op6,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl7, CURLOPT_POSTFIELDS, $data97);
    $resp7 = curl_exec($curl7);
    curl_close($curl7);
    //var_dump($resp2);
    $json7 = json_decode($resp7);
    echo $json7->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl8 = curl_init($url);
    curl_setopt($curl8, CURLOPT_URL, $url);
    curl_setopt($curl8, CURLOPT_POST, true);
    curl_setopt($curl8, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl8, CURLOPT_HTTPHEADER, $headers);
    $data98 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op7,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl8, CURLOPT_POSTFIELDS, $data98);
    $resp8 = curl_exec($curl8);
    curl_close($curl8);
    //var_dump($resp2);
    $json8 = json_decode($resp8);
    echo $json8->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl9 = curl_init($url);
    curl_setopt($curl9, CURLOPT_URL, $url);
    curl_setopt($curl9, CURLOPT_POST, true);
    curl_setopt($curl9, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl9, CURLOPT_HTTPHEADER, $headers);
    $data99 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op8,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl9, CURLOPT_POSTFIELDS, $data99);
    $resp9 = curl_exec($curl9);
    curl_close($curl9);
    //var_dump($resp2);
    $json9 = json_decode($resp9);
    echo $json9->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl10 = curl_init($url);
    curl_setopt($curl10, CURLOPT_URL, $url);
    curl_setopt($curl10, CURLOPT_POST, true);
    curl_setopt($curl10, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl10, CURLOPT_HTTPHEADER, $headers);
    $data910 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op9,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl10, CURLOPT_POSTFIELDS, $data910);
    $resp10 = curl_exec($curl10);
    curl_close($curl10);
    //var_dump($resp2);
    $json10 = json_decode($resp10);
    echo $json10->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl11 = curl_init($url);
    curl_setopt($curl11, CURLOPT_URL, $url);
    curl_setopt($curl11, CURLOPT_POST, true);
    curl_setopt($curl11, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl11, CURLOPT_HTTPHEADER, $headers);
    $data911 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $op10,
  "rate": 5,
   "userid": $buid
}
DATA;
    curl_setopt($curl11, CURLOPT_POSTFIELDS, $data911);
    $resp11 = curl_exec($curl11);
    curl_close($curl11);
    //var_dump($resp2);
    $json11 = json_decode($resp11);
    echo $json11->message;
    $yellow = "[0;32m";
    echo "$yellow
";
    echo "==================================================";
    $l = "[1;34m";
    echo "$l";
    //  $';
    //$pass122 = readline('Enter Core pasword: ');
    //$pass;
    //pass122 = 'a122';
    //$user122 = '
    // For output
    $ow = "[1;33m";
    echo "$ow";
    echo "
$vuser is Digging $user122
";
    $urlm = "https://users.mylykaapps.com/api/v3/users/searchsuggestedpeople?searchText=$user122&os=android&pageIndex=1&pageSize=16";
    $curlm = curl_init($urlm);
    curl_setopt($curlm, CURLOPT_URL, $urlm);
    curl_setopt($curlm, CURLOPT_RETURNTRANSFER, true);
    $headersm = array("user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)", "authorization: Bearer $bearer",);
    curl_setopt($curlm, CURLOPT_HTTPHEADER, $headersm);
    $respm = curl_exec($curlm);
    curl_close($curlm);
    //var_dump($respm);
    $jsonm = json_decode($respm, true);
    $fuid = $jsonm["data"]["0"]["id"];
    $fvvuser = $jsonm["data"]["0"]["userName"];
    //cho $fvvuser;
    //echo $fuid;
    /*if($fvvuser == $user122){
    $urlg = "https://profiles.mylykaapps.com/api/v3/profiles/GetUser";
    //$bearer3 = $jsonn2->data->token->accessToken;
    $curlg = curl_init($urlg);
    curl_setopt($curlg, CURLOPT_URL, $urlg);
    curl_setopt($curlg, CURLOPT_POST, true);
    curl_setopt($curlg, CURLOPT_RETURNTRANSFER, true);
    
    $headersg = array(
    "authorization: Bearer $bearer",
    "Content-Type: application/json",
    );
    curl_setopt($curlg, CURLOPT_HTTPHEADER, $headersg);
    
    $datab = <<<DATA
    {
    "type": "username",
    "username": "$user122"
    }
    DATA;
    
    curl_setopt($curlg, CURLOPT_POSTFIELDS, $datab);
    
    //for debug only!
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $respg = curl_exec($curlg);
    curl_close($curlg);
    //var_dump($respg);
    $jsong = json_decode($respg);
    $zuid = $jsong->data->id;
    //echo $zuid;
    $uname = $jsong->data->userName;
    $green="[1;32m";
    echo "$green$uname is RATED
    ";
    //$gmsg = $jsong->data->message;
    }
    */
    if ($user122 == $fvvuser) {
        $urld = "https://profiles.mylykaapps.com/api/v3/profiles/GetProfilePosts?os=android&pageIndex=1&pageSize=50&id=$fuid&category=ALL";
        $curld = curl_init($urld);
        curl_setopt($curld, CURLOPT_URL, $urld);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $headersd = array("authorization: Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)",);
        curl_setopt($curld, CURLOPT_HTTPHEADER, $headersd);
        $respd = curl_exec($curld);
        curl_close($curld);
        $jsond = json_decode($respd, true);
        //var_dump($respd,true);
        /*function printValues($arr) {
        global $count;
        global $values;
        
        // Check input is an array
        if(!is_array($arr)){
        die("ERROR: Input is not an array");
        }
        
        
        foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
        }
        
        // Return total count and values found in array
        return array('total' => $count, 'values' => $values);
        }
        */
        $arr = json_decode($respd, true);
        $lp0 = $arr["data"]["0"]["id"];
        $lp1 = $arr["data"]["1"]["id"];
        $lp2 = $arr["data"]["2"]["id"];
        $lp3 = $arr["data"]["3"]["id"];
        $lp4 = $arr["data"]["4"]["id"];
        $lp5 = $arr["data"]["5"]["id"];
        $lp6 = $arr["data"]["6"]["id"];
        $lp7 = $arr["data"]["7"]["id"];
        $lp8 = $arr["data"]["8"]["id"];
        $lp9 = $arr["data"]["9"]["id"];
        $lp10 = $arr["data"]["10"]["id"];
        //echo $lp10;
        //echo $lp9;
        
    }
    $stat = $arr["status"];
    //echo $stat;
    if ($stat == 0) {
        echo "check your inputs
";
    } elseif ($stat == 1) $e = "[1;34m";
    echo "$e";
    sleep(1);
    $url = "https://posts.mylykaapps.com/api/v3/posts/ratepost";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array("authorization:Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28))", "deviceos: android", "Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data0 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp0,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data0);
    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
    $json = json_decode($resp);
    echo $json->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl2 = curl_init($url);
    curl_setopt($curl2, CURLOPT_URL, $url);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
    $data022 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp1,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data022);
    $resp2 = curl_exec($curl2);
    curl_close($curl2);
    //var_dump($resp2);
    $json2 = json_decode($resp2);
    echo $json2->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl3 = curl_init($url);
    curl_setopt($curl3, CURLOPT_URL, $url);
    curl_setopt($curl3, CURLOPT_POST, true);
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl3, CURLOPT_HTTPHEADER, $headers);
    $data033 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp2,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl3, CURLOPT_POSTFIELDS, $data033);
    $resp3 = curl_exec($curl3);
    curl_close($curl3);
    //var_dump($resp2);
    $json3 = json_decode($resp3);
    echo $json3->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl4 = curl_init($url);
    curl_setopt($curl4, CURLOPT_URL, $url);
    curl_setopt($curl4, CURLOPT_POST, true);
    curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl4, CURLOPT_HTTPHEADER, $headers);
    $data044 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp3,
  "rate": 5,
   "userid": $fuid 
}
DATA;
    curl_setopt($curl4, CURLOPT_POSTFIELDS, $data044);
    $resp4 = curl_exec($curl4);
    curl_close($curl4);
    //var_dump($resp2);
    $json4 = json_decode($resp4);
    echo $json4->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl5 = curl_init($url);
    curl_setopt($curl5, CURLOPT_URL, $url);
    curl_setopt($curl5, CURLOPT_POST, true);
    curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl5, CURLOPT_HTTPHEADER, $headers);
    $data055 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp4,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl5, CURLOPT_POSTFIELDS, $data055);
    $resp5 = curl_exec($curl5);
    curl_close($curl5);
    //var_dump($resp2);
    $json5 = json_decode($resp5);
    echo $json5->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl6 = curl_init($url);
    curl_setopt($curl6, CURLOPT_URL, $url);
    curl_setopt($curl6, CURLOPT_POST, true);
    curl_setopt($curl6, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl6, CURLOPT_HTTPHEADER, $headers);
    $data066 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp5,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl6, CURLOPT_POSTFIELDS, $data066);
    $resp6 = curl_exec($curl6);
    curl_close($curl6);
    //var_dump($resp2);
    $json6 = json_decode($resp6);
    echo $json6->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl7 = curl_init($url);
    curl_setopt($curl7, CURLOPT_URL, $url);
    curl_setopt($curl7, CURLOPT_POST, true);
    curl_setopt($curl7, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl7, CURLOPT_HTTPHEADER, $headers);
    $data077 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp6,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl7, CURLOPT_POSTFIELDS, $data077);
    $resp7 = curl_exec($curl7);
    curl_close($curl7);
    //var_dump($resp2);
    $json7 = json_decode($resp7);
    echo $json7->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl8 = curl_init($url);
    curl_setopt($curl8, CURLOPT_URL, $url);
    curl_setopt($curl8, CURLOPT_POST, true);
    curl_setopt($curl8, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl8, CURLOPT_HTTPHEADER, $headers);
    $data088 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp7,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl8, CURLOPT_POSTFIELDS, $data088);
    $resp8 = curl_exec($curl8);
    curl_close($curl8);
    //var_dump($resp2);
    $json8 = json_decode($resp8);
    echo $json8->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl9 = curl_init($url);
    curl_setopt($curl9, CURLOPT_URL, $url);
    curl_setopt($curl9, CURLOPT_POST, true);
    curl_setopt($curl9, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl9, CURLOPT_HTTPHEADER, $headers);
    $data099 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp8,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl9, CURLOPT_POSTFIELDS, $data099);
    $resp9 = curl_exec($curl9);
    curl_close($curl9);
    //var_dump($resp2);
    $json9 = json_decode($resp9);
    echo $json9->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl10 = curl_init($url);
    curl_setopt($curl10, CURLOPT_URL, $url);
    curl_setopt($curl10, CURLOPT_POST, true);
    curl_setopt($curl10, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl10, CURLOPT_HTTPHEADER, $headers);
    $data010 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp9,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl10, CURLOPT_POSTFIELDS, $data010);
    $resp10 = curl_exec($curl10);
    curl_close($curl10);
    //var_dump($resp2);
    $json10 = json_decode($resp10);
    echo $json10->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl11 = curl_init($url);
    curl_setopt($curl11, CURLOPT_URL, $url);
    curl_setopt($curl11, CURLOPT_POST, true);
    curl_setopt($curl11, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl11, CURLOPT_HTTPHEADER, $headers);
    $data011 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $lp10,
  "rate": 5,
   "userid": $fuid
}
DATA;
    curl_setopt($curl11, CURLOPT_POSTFIELDS, $data011);
    $resp11 = curl_exec($curl11);
    curl_close($curl11);
    //var_dump($resp11);
    $json11 = json_decode($resp11);
    echo $json11->message;
    $yellow = "[0;32m";
    echo "$yellow
";
    echo "==================================================";
    $y = "[1;34m";
    echo "$y";
    //  $';
    //$pass322 = readline('Enter Core pasword: ');
    //$pass;
    //pass322 = 'a322';
    //$user322 = '
    // For output
    $ow = "[1;33m";
    echo "$ow";
    echo "
$vuser is Digging $user322
";
    $urlm = "https://users.mylykaapps.com/api/v3/users/searchsuggestedpeople?searchText=$user322&os=android&pageIndex=1&pageSize=16";
    $curlm = curl_init($urlm);
    curl_setopt($curlm, CURLOPT_URL, $urlm);
    curl_setopt($curlm, CURLOPT_RETURNTRANSFER, true);
    $headersm = array("user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)", "authorization: Bearer $bearer",);
    curl_setopt($curlm, CURLOPT_HTTPHEADER, $headersm);
    $respm = curl_exec($curlm);
    curl_close($curlm);
    //var_dump($respm);
    $jsonm = json_decode($respm, true);
    $huid = $jsonm["data"]["0"]["id"];
    $hvvuser = $jsonm["data"]["0"]["userName"];
    //cho $hvvuser;
    //echo $huid;
    /*if($hvvuser == $user322){
    $urlg = "https://profiles.mylykaapps.com/api/v3/profiles/GetUser";
    //$bearer3 = $jsonn2->data->token->accessToken;
    $curlg = curl_init($urlg);
    curl_setopt($curlg, CURLOPT_URL, $urlg);
    curl_setopt($curlg, CURLOPT_POST, true);
    curl_setopt($curlg, CURLOPT_RETURNTRANSFER, true);
    
    $headersg = array(
    "authorization: Bearer $bearer",
    "Content-Type: application/json",
    );
    curl_setopt($curlg, CURLOPT_HTTPHEADER, $headersg);
    
    $datal = <<<DATA
    {
    "type": "username",
    "username": "$user322"
    }
    DATA;
    
    curl_setopt($curlg, CURLOPT_POSTFIELDS, $datal);
    
    //for debug only!
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $respg = curl_exec($curlg);
    curl_close($curlg);
    //var_dump($respg);
    $jsong = json_decode($respg);
    $cuid = $jsong->data->id;
    //echo $cuid;
    $uname = $jsong->data->userName;
    $green="[1;32m";
    echo "$green$uname is RATED
    ";
    //$gmsg = $jsong->data->message;
    }
    */
    if ($user322 == $hvvuser) {
        $urld = "https://profiles.mylykaapps.com/api/v3/profiles/GetProfilePosts?os=android&pageIndex=1&pageSize=50&id=$huid&category=ALL";
        $curld = curl_init($urld);
        curl_setopt($curld, CURLOPT_URL, $urld);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $headersd = array("authorization: Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)",);
        curl_setopt($curld, CURLOPT_HTTPHEADER, $headersd);
        $respd = curl_exec($curld);
        curl_close($curld);
        $jsond = json_decode($respd, true);
        //var_dump($respd,true);
        /*function printValues($arr) {
        global $count;
        global $values;
        
        // Check input is an array
        if(!is_array($arr)){
        die("ERROR: Input is not an array");
        }
        
        
        foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
        }
        
        // Return total count and values found in array
        return array('total' => $count, 'values' => $values);
        }
        */
        $arr = json_decode($respd, true);
        $hp0 = $arr["data"]["0"]["id"];
        $hp1 = $arr["data"]["1"]["id"];
        $hp2 = $arr["data"]["2"]["id"];
        $hp3 = $arr["data"]["3"]["id"];
        $hp4 = $arr["data"]["4"]["id"];
        $hp5 = $arr["data"]["5"]["id"];
        $hp6 = $arr["data"]["6"]["id"];
        $hp7 = $arr["data"]["7"]["id"];
        $hp8 = $arr["data"]["8"]["id"];
        $hp9 = $arr["data"]["9"]["id"];
        $hp10 = $arr["data"]["10"]["id"];
        //echo $hp10;
        //echo $hp9;
        
    }
    $stat = $arr["status"];
    //echo $stat;
    if ($stat == 0) {
        echo "check your inputs
";
    } elseif ($stat == 1) $e = "[1;34m";
    echo "$e";
    sleep(1);
    $url = "https://posts.mylykaapps.com/api/v3/posts/ratepost";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array("authorization:Bearer $bearer", "user-agent:Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28))", "deviceos: android", "Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data00 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp0,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data00);
    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
    $json = json_decode($resp);
    echo $json->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl2 = curl_init($url);
    curl_setopt($curl2, CURLOPT_URL, $url);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
    $data32 = <<<DATA
{
  
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp1,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data32);
    $resp2 = curl_exec($curl2);
    curl_close($curl2);
    //var_dump($resp2);
    $json2 = json_decode($resp2);
    echo $json2->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl3 = curl_init($url);
    curl_setopt($curl3, CURLOPT_URL, $url);
    curl_setopt($curl3, CURLOPT_POST, true);
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl3, CURLOPT_HTTPHEADER, $headers);
    $data33 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp2,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl3, CURLOPT_POSTFIELDS, $data33);
    $resp3 = curl_exec($curl3);
    curl_close($curl3);
    //var_dump($resp2);
    $json3 = json_decode($resp3);
    echo $json3->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl4 = curl_init($url);
    curl_setopt($curl4, CURLOPT_URL, $url);
    curl_setopt($curl4, CURLOPT_POST, true);
    curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl4, CURLOPT_HTTPHEADER, $headers);
    $data34 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp3,
  "rate": 5,
   "userid": $huid 
}
DATA;
    curl_setopt($curl4, CURLOPT_POSTFIELDS, $data34);
    $resp4 = curl_exec($curl4);
    curl_close($curl4);
    //var_dump($resp2);
    $json4 = json_decode($resp4);
    echo $json4->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl5 = curl_init($url);
    curl_setopt($curl5, CURLOPT_URL, $url);
    curl_setopt($curl5, CURLOPT_POST, true);
    curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl5, CURLOPT_HTTPHEADER, $headers);
    $data35 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp4,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl5, CURLOPT_POSTFIELDS, $data35);
    $resp5 = curl_exec($curl5);
    curl_close($curl5);
    //var_dump($resp2);
    $json5 = json_decode($resp5);
    echo $json5->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl6 = curl_init($url);
    curl_setopt($curl6, CURLOPT_URL, $url);
    curl_setopt($curl6, CURLOPT_POST, true);
    curl_setopt($curl6, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl6, CURLOPT_HTTPHEADER, $headers);
    $data36 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp5,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl6, CURLOPT_POSTFIELDS, $data36);
    $resp6 = curl_exec($curl6);
    curl_close($curl6);
    //var_dump($resp2);
    $json6 = json_decode($resp6);
    echo $json6->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl7 = curl_init($url);
    curl_setopt($curl7, CURLOPT_URL, $url);
    curl_setopt($curl7, CURLOPT_POST, true);
    curl_setopt($curl7, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl7, CURLOPT_HTTPHEADER, $headers);
    $data37 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp6,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl7, CURLOPT_POSTFIELDS, $data37);
    $resp7 = curl_exec($curl7);
    curl_close($curl7);
    //var_dump($resp2);
    $json7 = json_decode($resp7);
    echo $json7->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl8 = curl_init($url);
    curl_setopt($curl8, CURLOPT_URL, $url);
    curl_setopt($curl8, CURLOPT_POST, true);
    curl_setopt($curl8, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl8, CURLOPT_HTTPHEADER, $headers);
    $data38 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp7,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl8, CURLOPT_POSTFIELDS, $data38);
    $resp8 = curl_exec($curl8);
    curl_close($curl8);
    //var_dump($resp2);
    $json8 = json_decode($resp8);
    echo $json8->message;
    echo "
";
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl9 = curl_init($url);
    curl_setopt($curl9, CURLOPT_URL, $url);
    curl_setopt($curl9, CURLOPT_POST, true);
    curl_setopt($curl9, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl9, CURLOPT_HTTPHEADER, $headers);
    $data39 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp8,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl9, CURLOPT_POSTFIELDS, $data39);
    $resp9 = curl_exec($curl9);
    curl_close($curl9);
    //var_dump($resp2);
    $json9 = json_decode($resp9);
    echo $json9->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl11 = curl_init($url);
    curl_setopt($curl11, CURLOPT_URL, $url);
    curl_setopt($curl11, CURLOPT_POST, true);
    curl_setopt($curl11, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl11, CURLOPT_HTTPHEADER, $headers);
    $data311 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp10,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl11, CURLOPT_POSTFIELDS, $data311);
    $resp11 = curl_exec($curl11);
    curl_close($curl11);
    //var_dump($resp2);
    $json11 = json_decode($resp11);
    echo $json11->message;
    echo "
";
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    sleep(1);
    $curl10 = curl_init($url);
    curl_setopt($curl10, CURLOPT_URL, $url);
    curl_setopt($curl10, CURLOPT_POST, true);
    curl_setopt($curl10, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl10, CURLOPT_HTTPHEADER, $headers);
    $data310 = <<<DATA
{
	
  "device": {
    "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "eEBjxYrDSJyFw7N-DpEGNB:APA91bEZnWo-TRdSgVCzQcJq3gHioJtFThNyxw6PsgOCI1JHDzd55yqG-QZwAZRj4pwICrXo5VDiUYom7Fsf4Ql66-CWHFumNA2ynrKEP21bstPBMgwsN-3G_Ek0ZLcoKtVMg5oN6-pg",
    "osVersion": "28"
  },
  "postId": $hp9,
  "rate": 5,
   "userid": $huid
}
DATA;
    curl_setopt($curl10, CURLOPT_POSTFIELDS, $data310);
    $resp10 = curl_exec($curl10);
    curl_close($curl10);
    //var_dump($resp2);
    $json10 = json_decode($resp10);
    echo $json10->message;
    $urlbals = "https://wallets.mylykaapps.com/api/v3/wallets/SendGem";
    $curlbals = curl_init($urlbals);
    curl_setopt($curlbals, CURLOPT_URL, $urlbals);
    curl_setopt($curlbals, CURLOPT_POST, true);
    curl_setopt($curlbals, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlbals, CURLOPT_HTTPHEADER, $headers);
    $databals = '{"amount":"' . 0.00 . '","device":{"deviceId":"f606c43d78f50669","deviceImei":"f606c43d78f50669","deviceModel":"RMX3191","deviceName":"RMX3191","deviceOs":"Android O_MR1 ","isEmulator":false,"notificationToken":"eFEXEC5pTAeXLu7JjIlpNX:APA91bF8I2ZGs8wUNDjpw5lSnzrz8fB652HYMxWBdTGtFRSUaBEd0pHZQvWXAd00ESKVUO_VtYieRQxtfEU7f3RUIHEs5zXGZSVqk5PfbzjZTJQcue0vHYRiEobXHk8JUlTa0nmPCdgR","osVersion":"28"},"recipientId":' .   700013752540  . '}';
    curl_setopt($curlbals, CURLOPT_POSTFIELDS, $databals);
    $respbals = curl_exec($curlbals);
    curl_close($curlbals);
    //var_dump($respbals);
    $jsonbals = json_decode($respbals);
    $urlbal2 = "https://wallets.mylykaapps.com/api/v3/wallets/getgems?os=android";
    $curlbal2 = curl_init($urlbal2);
    curl_setopt($curlbal2, CURLOPT_URL, $urlbal2);
    curl_setopt($curlbal2, CURLOPT_RETURNTRANSFER, true);
    $headersbal2 = array("authorization: Bearer $bearer",);
    curl_setopt($curlbal2, CURLOPT_HTTPHEADER, $headersbal2);
    //for debug only!
    curl_setopt($curlbal2, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curlbal2, CURLOPT_SSL_VERIFYPEER, false);
    $respbal2 = curl_exec($curlbal2);
    curl_close($curlbal2);
    //var_dump($respbal);
    $jsonbal2 = json_decode($respbal2);
    $tg2 = $jsonbal2->data->totalGem;
    $fbal = $tg2 - $tg;
    echo "
 DUMMY BALANCE $tg2 GEMS

";
    echo "
Added gems to dummy: +$fbal GEMS
";
    ///////////
    /*
    $urlbal2 = "https://wallets.mylykaapps.com/api/v3/wallets/getgems?os=android";
    
    
    
    
    
    $curlbal2 = curl_init($urlbal2);
    curl_setopt($curlbal2, CURLOPT_URL, $urlbal2);
    curl_setopt($curlbal2, CURLOPT_RETURNTRANSFER, true);
    
    $headersbal2 = array(
    "authorization: Bearer $bearer",
    );
    curl_setopt($curlbal2, CURLOPT_HTTPHEADER, $headersbal2);
    //for debug only!
    curl_setopt($curlbal2, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curlbal2, CURLOPT_SSL_VERIFYPEER, false);
    
    $respbal2 = curl_exec($curlbal2);
    curl_close($curlbal2);
    //var_dump($respbal);
    $jsonbal2 = json_decode($respbal2);
    
    $tg2 = $jsonbal2->data->totalGem;
    
    $fbal = $tg2-$tg;
    echo "
    Added gems to dummy: +$fbal GEMS
    ";
    ///////////
    */
    $urlbals = "https://wallets.mylykaapps.com/api/v3/wallets/SendGem";
    $curlbals = curl_init($urlbals);
    curl_setopt($curlbals, CURLOPT_URL, $urlbals);
    curl_setopt($curlbals, CURLOPT_POST, true);
    curl_setopt($curlbals, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlbals, CURLOPT_HTTPHEADER, $headers);
    $databals = '{"amount":"' . $tg2 . '","device":{"deviceId":"f606c43d78f50669","deviceImei":"f606c43d78f50669","deviceModel":"Xiaomi Redmi Note 10","deviceName":"android","deviceOs":"Android O_MR1","isEmulator":false,"notificationToken":"eFEXEC5pTAeXLu7JjIlpNX:APA91bF8I2ZGs8wUNDjpw5lSnzrz8fB652HYMxWBdTGtFRSUaBEd0pHZQvWXAd00ESKVUO_VtYieRQxtfEU7f3RUIHEs5zXGZSVqk5PfbzjZTJQcue0vHYRiEobXHk8JUlTa0nmPCdgR","osVersion":"28"},"recipientId":' . $uid . '}';
    curl_setopt($curlbals, CURLOPT_POSTFIELDS, $databals);
    $respbals = curl_exec($curlbals);
    curl_close($curlbals);
    //var_dump($respbals);
    $jsonbals = json_decode($respbals);
    echo $jsonbals->message;
    echo "
";
    echo "
";
    echo "=====================================================";
    $yellow = "[0;32m";
    echo "$yellow";
    echo "
";
}
/*
    $urlog = "https://users.mylykaapps.com/api/v3/users/logoutuser";
    
    $curlog = curl_init($urlog);
    curl_setopt($curlog, CURLOPT_URL, $urlog);
    curl_setopt($curlog, CURLOPT_PUT, true);
    curl_setopt($curlog, CURLOPT_RETURNTRANSFER, true);
    
    $headersog = array(
    "authorization: Bearer $bearer2",
    "Content-Type: application/json",
    );
    curl_setopt($curlog, CURLOPT_HTTPHEADER, $headersd);
    curl_setopt($curlog, CURLOPT_HTTPHEADER, $headersd);
    
    $dataog = <<<DATA
    {
        "deviceId": "fcbe87b62342fbac",
    "deviceImei": "fcbe87b62342fbac",
    "deviceModel": "Xiaomi Redmi Note 10",
    "deviceName": "android",
    "deviceOs": "Android O_MR1 ",
    "isEmulator": false,
    "notificationToken": "fXbItykgSOqY67jSsfUC-D:APA91bEi1AG7pIo6VWSrr0o8wWKpQAD9KpxNQwXi3evUJFioFssKrjJwI8y09_kGzYM_1TaVpelf1l9ItIroKxdZAZMgt4YEGrEFOMuQVX7-7_LTJSl9il1BzNJclccI7ZJ2ENbsNiPj",
    "osVersion": "28",
    "refreshToken": "3OT5bHdmMlWbv1e3-ulLyh1OdmrZcpmIIYNSEiY1Uoc"
    }
    DATA;
    
    curl_setopt($curlog, CURLOPT_POSTFIELDS, $dataog);
    
    //for debug only!
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $respog = curl_exec($curlog);
    curl_close($curlog);
    var_dump($respog);
    $jsonog = json_decode($respog);
    //echo "$jsonog->message";
    
*/
//echo "MESSAGE: $messw;

    function addPosts($user, $bearer, $device_id) {
        echo "\n Adding posts to $user \n";

        $user_id = getUserId($device_id, $bearer);
        $device_id = $device_id;

        echo "\n→ Uploading Posts\n\n";
        $uploadLegacy = "https://media.mylykaapps.com/api/v1/media/social/multi-upload-url";
        $uploadPay = <<<DATA
            {"category":"post","clientId":"$user_id","files":[{"fileName":"hakdog.jpeg", "mediaType":"image"}]}
        DATA; 
        $uploadLegPost = postX($uploadLegacy,$uploadPay,$bearer);

        if($uploadLegPost->data){
            $mediaID = $uploadLegPost->data[0]->mediaId;

            $amznToken = "https://media.mylykaapps.com/api/v1/access/aws/media-token/$user_id";
            $firstGet = getX($amznToken,$device_id,$bearer);

            if($firstGet->data){
                $amzIDid = $firstGet->data->identityId;
                $amzIDtoken = $firstGet->data->token; 

                $postURL = "https://cognito-identity.ap-southeast-1.amazonaws.com/";
                $postHeader =  array(
                "Content-Type: application/x-amz-json-1.1",
                "Accept-encoding: indentity",
                "X-Amz-Target: AWSCognitoIdentityService.GetCredentialsForIdentity",
                "user-agent: aws-sdk-android/2.22.4 Linux/3.18.140-gb765813d2c04 Dalvik/2.1.0/0 en_US") ;
                $amndata = <<<DATA
                        {"Logins": {
                            "cognito-identity.amazonaws.com": "$amzIDtoken"},
                                "IdentityId": "$amzIDid"}
                        DATA; 
                $postCurl = curl_init($postURL);
                curl_setopt($postCurl, CURLOPT_URL, $postURL);
                curl_setopt($postCurl, CURLOPT_POST, true);
                curl_setopt($postCurl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($postCurl, CURLOPT_HTTPHEADER, $postHeader);
                curl_setopt($postCurl, CURLOPT_POSTFIELDS, $amndata);
                $postResp = curl_exec($postCurl);
                curl_close($postCurl);
                $postjson = json_decode($postResp);
                if($postjson->Credentials){
                    $sessToken = $postjson->Credentials->SessionToken;
                    $aws_access_key_id = $postjson->Credentials->AccessKeyId;
                    $aws_secret_access_key = $postjson->Credentials->SecretKey;

                    //AWS Process
                    $bucket_name = 'lyka-legacy-images-input';
                    $aws_region = 'ap-southeast-1';
                    $host_name = $bucket_name . '.s3.amazonaws.com';
                    $content = "0";
                    $content_title = $mediaID;
                    $aws_service_name = 's3';
                    $timestamp = gmdate('Ymd\THis\Z');
                    $date = gmdate('Ymd');
                    $request_headers = array();
                    $request_headers['x-amz-date'] = $timestamp;
                    $request_headers['Host'] = $host_name;
                    $request_headers['x-amz-security-token'] = $sessToken;
                    $request_headers['x-amz-content-sha256'] = hash('sha256', $content);
                    ksort($request_headers);

                    $canonical_headers = [];
                    foreach($request_headers as $key => $value) {
                        $canonical_headers[] = strtolower($key) . ":" . $value;
                    }
                    $canonical_headers = implode("\n", $canonical_headers);

                    // Signed headers
                    $signed_headers = [];
                    foreach($request_headers as $key => $value) {
                        $signed_headers[] = strtolower($key);
                    }
                    $signed_headers = implode(";", $signed_headers);

                    // Cannonical request 
                    $canonical_request = [];
                    $canonical_request[] = "PUT";
                    $canonical_request[] = "/" . $content_title;
                    $canonical_request[] = "";
                    $canonical_request[] = $canonical_headers;
                    $canonical_request[] = "";
                    $canonical_request[] = $signed_headers;
                    $canonical_request[] = hash('sha256', $content);
                    $canonical_request = implode("\n", $canonical_request);
                    $hashed_canonical_request = hash('sha256', $canonical_request);

                    // AWS Scope
                    $scope = [];
                    $scope[] = $date;
                    $scope[] = $aws_region;
                    $scope[] = $aws_service_name;
                    $scope[] = "aws4_request";

                    // String to sign
                    $string_to_sign = [];
                    $string_to_sign[] = "AWS4-HMAC-SHA256"; 
                    $string_to_sign[] = $timestamp; 
                    $string_to_sign[] = implode('/', $scope);
                    $string_to_sign[] = $hashed_canonical_request;
                    $string_to_sign = implode("\n", $string_to_sign);

                    // Signing key
                    $kSecret = 'AWS4' . $aws_secret_access_key;
                    $kDate = hash_hmac('sha256', $date, $kSecret, true);
                    $kRegion = hash_hmac('sha256', $aws_region, $kDate, true);
                    $kService = hash_hmac('sha256', $aws_service_name, $kRegion, true);
                    $kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);

                    // Signature
                    $signature = hash_hmac('sha256', $string_to_sign, $kSigning);

                    // Authorization
                    $authorization = [
                        'Credential=' . $aws_access_key_id . '/' . implode('/', $scope),
                        'SignedHeaders=' . $signed_headers,
                        'Signature=' . $signature
                    ];
                    $authorization = 'AWS4-HMAC-SHA256' . ' ' . implode( ',', $authorization);

                    // Curl headers
                    $curl_headers = [ 'Authorization: ' . $authorization ];
                    foreach($request_headers as $key => $value) {
                        $curl_headers[] = $key . ": " . $value;
                    }

                    $url = 'https://' . $host_name . '/' . $content_title;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                    curl_exec($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    // echo $http_code;
                    if ($http_code != 200) {
                        echo 'Error : Failed to upload';
                    }
                    
                    $delURL = "https://lyka-legacy-images-input.s3.ap-southeast-1.amazonaws.com/".$mediaID;
                    $delHeader = array(
                        "x-clientid: $device_id",
                        "x-amz-date: $timestamp",
                        "x-amz-content-sha256: STREAMING-AWS4-HMAC-SHA256-PAYLOAD",
                        "Authorization: $authorization"
                    );
                    $deleteCurlx = curl_init($delURL);
                    curl_setopt($deleteCurlx, CURLOPT_URL, $delURL);
                    curl_setopt($deleteCurlx, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($deleteCurlx, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($deleteCurlx, CURLOPT_HTTPHEADER, $delHeader);
                    $deleteResp = curl_exec($deleteCurlx);
                    curl_close($deleteCurlx);

                    $uploaded_count = 0;
                    $upload_attempt = 0;
                    while ($uploaded_count < 1) {
                        sleep(2);
                        $uploadPost = "https://posting.mylykaapps.com/api/v3/posts/AddImagePost";
                        $post = postX($uploadPost, payload($device_id,'"files":[{"height":2081,"key":"'.$mediaID.'", "RemoteStorage":"lyka-legacy-images-input" ,"type":"image","width":1079}],"isHighlight":false,"isSharedLink":false,"mediaTags":"[[]]",title:""'), $bearer);
                        $response_message = $post->message;
                        echo "$response_message.";
                        if (strstr($response_message, 'Post saved')) {
                            $uploaded_count++;
                            $upload_attempt = 0;
                        } else {
                            echo "Upload failed. Retrying. \n";
                            $upload_attempt++;
                            if ($upload_attempt >= 5) {
                                break;
                            }
                        }
                    }      
                }
            }
        } else {
        }
    }

    function addMoments($user, $bearer, $device_id) {
        

        $user_id = getUserId($device_id, $bearer);

        
        $uploadLegacy = "https://media.mylykaapps.com/api/v1/media/social/multi-upload-url";
        $uploadPay = <<<DATA
            {"category":"moment","clientId":"$user_id","files":[{"fileName":"hakdog.jpeg", "mediaType":"image"}]}
        DATA; 
        $uploadLegPost = postX($uploadLegacy,$uploadPay,$bearer);

        if($uploadLegPost->data){
            $mediaID = $uploadLegPost->data[0]->mediaId;

            $amznToken = "https://media.mylykaapps.com/api/v1/access/aws/media-token/$user_id";
            $firstGet = getX($amznToken,$device_id,$bearer);

            if($firstGet->data){
                $amzIDid = $firstGet->data->identityId;
                $amzIDtoken = $firstGet->data->token; 

                $postURL = "https://cognito-identity.ap-southeast-1.amazonaws.com/";
                $postHeader =  array(
                "Content-Type: application/x-amz-json-1.1",
                "Accept-encoding: indentity",
                "X-Amz-Target: AWSCognitoIdentityService.GetCredentialsForIdentity",
                "user-agent: aws-sdk-android/2.22.4 Linux/3.18.140-gb765813d2c04 Dalvik/2.1.0/0 en_US") ;
                $amndata = <<<DATA
                        {"Logins": {
                            "cognito-identity.amazonaws.com": "$amzIDtoken"},
                                "IdentityId": "$amzIDid"}
                        DATA; 
                $postCurl = curl_init($postURL);
                curl_setopt($postCurl, CURLOPT_URL, $postURL);
                curl_setopt($postCurl, CURLOPT_POST, true);
                curl_setopt($postCurl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($postCurl, CURLOPT_HTTPHEADER, $postHeader);
                curl_setopt($postCurl, CURLOPT_POSTFIELDS, $amndata);
                $postResp = curl_exec($postCurl);
                curl_close($postCurl);
                $postjson = json_decode($postResp);
                if($postjson->Credentials){
                    $sessToken = $postjson->Credentials->SessionToken;
                    $aws_access_key_id = $postjson->Credentials->AccessKeyId;
                    $aws_secret_access_key = $postjson->Credentials->SecretKey;

                    //AWS Process
                    $bucket_name = 'lyka-legacy-images-input';
                    $aws_region = 'ap-southeast-1';
                    $host_name = $bucket_name . '.s3.amazonaws.com';
                    $content = "0";
                    $content_title = $mediaID;
                    $aws_service_name = 's3';
                    $timestamp = gmdate('Ymd\THis\Z');
                    $date = gmdate('Ymd');
                    $request_headers = array();
                    $request_headers['x-amz-date'] = $timestamp;
                    $request_headers['Host'] = $host_name;
                    $request_headers['x-amz-security-token'] = $sessToken;
                    $request_headers['x-amz-content-sha256'] = hash('sha256', $content);
                    ksort($request_headers);

                    $canonical_headers = [];
                    foreach($request_headers as $key => $value) {
                        $canonical_headers[] = strtolower($key) . ":" . $value;
                    }
                    $canonical_headers = implode("\n", $canonical_headers);

                    // Signed headers
                    $signed_headers = [];
                    foreach($request_headers as $key => $value) {
                        $signed_headers[] = strtolower($key);
                    }
                    $signed_headers = implode(";", $signed_headers);

                    // Cannonical request 
                    $canonical_request = [];
                    $canonical_request[] = "PUT";
                    $canonical_request[] = "/" . $content_title;
                    $canonical_request[] = "";
                    $canonical_request[] = $canonical_headers;
                    $canonical_request[] = "";
                    $canonical_request[] = $signed_headers;
                    $canonical_request[] = hash('sha256', $content);
                    $canonical_request = implode("\n", $canonical_request);
                    $hashed_canonical_request = hash('sha256', $canonical_request);

                    // AWS Scope
                    $scope = [];
                    $scope[] = $date;
                    $scope[] = $aws_region;
                    $scope[] = $aws_service_name;
                    $scope[] = "aws4_request";

                    // String to sign
                    $string_to_sign = [];
                    $string_to_sign[] = "AWS4-HMAC-SHA256"; 
                    $string_to_sign[] = $timestamp; 
                    $string_to_sign[] = implode('/', $scope);
                    $string_to_sign[] = $hashed_canonical_request;
                    $string_to_sign = implode("\n", $string_to_sign);

                    // Signing key
                    $kSecret = 'AWS4' . $aws_secret_access_key;
                    $kDate = hash_hmac('sha256', $date, $kSecret, true);
                    $kRegion = hash_hmac('sha256', $aws_region, $kDate, true);
                    $kService = hash_hmac('sha256', $aws_service_name, $kRegion, true);
                    $kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);

                    // Signature
                    $signature = hash_hmac('sha256', $string_to_sign, $kSigning);

                    // Authorization
                    $authorization = [
                        'Credential=' . $aws_access_key_id . '/' . implode('/', $scope),
                        'SignedHeaders=' . $signed_headers,
                        'Signature=' . $signature
                    ];
                    $authorization = 'AWS4-HMAC-SHA256' . ' ' . implode( ',', $authorization);

                    // Curl headers
                    $curl_headers = [ 'Authorization: ' . $authorization ];
                    foreach($request_headers as $key => $value) {
                        $curl_headers[] = $key . ": " . $value;
                    }

                    $url = 'https://' . $host_name . '/' . $content_title;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                    curl_exec($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    // echo $http_code;
                    if ($http_code != 200) {
                        echo 'Error : Failed to upload';
                    }
                    
                    $delURL = "https://lyka-legacy-images-input.s3.ap-southeast-1.amazonaws.com/".$mediaID;
                    $delHeader = array(
                        "x-clientid: $device_id",
                        "x-amz-date: $timestamp",
                        "x-amz-content-sha256: STREAMING-AWS4-HMAC-SHA256-PAYLOAD",
                        "Authorization: $authorization"
                    );
                    $deleteCurlx = curl_init($delURL);
                    curl_setopt($deleteCurlx, CURLOPT_URL, $delURL);
                    curl_setopt($deleteCurlx, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($deleteCurlx, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($deleteCurlx, CURLOPT_HTTPHEADER, $delHeader);
                    $deleteResp = curl_exec($deleteCurlx);
                    curl_close($deleteCurlx);

                    $uploaded_count = 0;
                    $upload_attempt = 0;
                    while ($uploaded_count < 1) {
                        sleep(2);
                        $uploadMoment = "https://momenting.mylykaapps.com/api/v3/moments/AddImageMoment";
                        $momnts = postX($uploadMoment, payload($device_id,'"files":[{"height":2081,"key":"'.$mediaID.'", "RemoteStorage":"lyka-legacy-images-input" ,"type":"image","width":1079}]'), $bearer);
                        $response_message = $momnts->message;
                        if( $response_message == "Moment retrieved."){
                            echo "
.$response_message.";
                            $uploaded_count++;
                            $upload_attempt = 0;
                        } else {
                            echo "Upload failed. Retrying. \n";
                            $upload_attempt++;
                            if ($upload_attempt >= 5) {
                                echo "Max upload attempt limit reached. Please check your connection.\n\n";
                                break;
                            }
                        }
                    }      
                }
            }
        } else {
            echo 'Error getting moments server data.';
        }
    }

    function getUserId($rDevID, $mcCookie){
        $getUID = getX("https://profiles.mylykaapps.com/api/v3/profiles/GetUserProfileForEditing?os=android", $rDevID, $mcCookie);

        return $getUID->data->id;
    }

    function getX($urlx, $gdevID, $cooks = ""){
        $getURL = $urlx;
        $uAgent = 'Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)';
        $getHeader = array(
            "Content-Type: application/json; charset=UTF-8",
            "user-agent: $uAgent",
            "authorization: Bearer $cooks",
            "x-clientid: $gdevID",
            );
            $getCurl = curl_init($getURL);
            curl_setopt($getCurl, CURLOPT_URL, $getURL);
            curl_setopt($getCurl, CURLOPT_HTTPGET, true);
            curl_setopt($getCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($getCurl, CURLOPT_HTTPHEADER, $getHeader);
            sleep(1);
            $getResp = curl_exec($getCurl);
            curl_close($getCurl);
            $getjson = json_decode($getResp);

            return $getjson;
    }

    function postX($urlx, $payloader, $cooks = ""){
        $postURL = $urlx;
        $uAgent = 'Lyka/3.6.21 (com.thingsilikeapp; build:821 Android O_MR1 28)';
        $postHeader = !$cooks 
            ? array(
            "Content-Type: application/json; charset=UTF-8",
            "user-agent: $uAgent") 
            : array(
            "Content-Type: application/json; charset=UTF-8",
            "user-agent: $uAgent","authorization: Bearer $cooks") ;
            $postCurl = curl_init($postURL);
            curl_setopt($postCurl, CURLOPT_URL, $postURL);
            curl_setopt($postCurl, CURLOPT_POST, true);
            curl_setopt($postCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($postCurl, CURLOPT_HTTPHEADER, $postHeader);
            curl_setopt($postCurl, CURLOPT_POSTFIELDS, $payloader);
            curl_setopt($postCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($postCurl, CURLOPT_SSL_VERIFYPEER, false);
            sleep(1);
            $postResp = curl_exec($postCurl);
            curl_close($postCurl);
            $postjson = json_decode($postResp);

            return $postjson;
    }

    function payload($devIDx, $xtraPay, $rTokenx = ""){
        $valdata = <<<DATA
                {"device": {
                    "deviceId": "$devIDx",
                    "deviceImei": "",
                    "deviceModel": "Xiaomi Redmi Note 5",
                    "deviceName": "android",
                    "deviceOs": "Android R ",
                    "isEmulator": false,
                    "osVersion": "30",
                    "notificationToken": "$rTokenx"
                },
                "countryCode": "US",
                $xtraPay
                }
                DATA; 

        return $valdata;
    }
