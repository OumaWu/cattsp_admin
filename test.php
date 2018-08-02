<?php

//echo $_SERVER['DOCUMENT_ROOT']. PHP_EOL;
//echo password_hash("123",PASSWORD_DEFAULT). PHP_EOL;

//$url='http://'.$_SERVER['HTTP_HOST'];

//echo $_SERVER['PHP_SELF'];

header("Content-type: text/html; charset=utf-8");

//获取访客ip
function getIp()
{
    $ip = false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = FALSE;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

//根据ip获取城市、网络运营商等信息
function findCityByIp($ip)
{
    $data = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
    return json_decode($data, true);
}

$ip = getIp();

echo $ip . "<br>";

echo "<pre>";
print_r(findCityByIp("114.253.75.164"));