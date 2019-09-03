<?php
use App\Visitor;

function visited($coupleId, $defaultIp) {
    $visitors = new Visitor();
    $clientData = getClientMeta($defaultIp);
    $data = [
        "MSCOUPLE_GUID" => $coupleId,
        "IPPUBLIC" => $clientData["ipAddress"],
        "BROWSER" => $clientData["browser"],
        "OS" => $clientData["platform"],
    ];
    $visitors->create($data);
} 

function getIp(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}

function getClientMeta($defaultIp) {


    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    // First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    }
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    } elseif(preg_match('/Firefox/i',$u_agent)) {
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    } elseif(preg_match('/Chrome/i',$u_agent)) {
      $bname = 'Google Chrome';
      $ub = "Chrome";
    } elseif(preg_match('/Safari/i',$u_agent)) {
      $bname = 'Apple Safari';
      $ub = "Safari";
    } elseif(preg_match('/Opera/i',$u_agent)) {
      $bname = 'Opera';
      $ub = "Opera";
    } elseif(preg_match('/Netscape/i',$u_agent)) {
      $bname = 'Netscape';
      $ub = "Netscape";
    } 
elseif(preg_match('/Mozilla/i',$u_agent)) {
$bname = 'Mozilla';
$ub = 'Mozilla';
}
else {
	$bname = $u_agent;
	$ub = $u_agent;    
}
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'] ?  $matches['version'][0] : 'undefined';
      } else {
        $version= $matches['version'] ?  $matches['version'][1] : 'undefined';
      }
    } else {
      $version= $matches['version'] ?  $matches['version'][0] : 'undefined';
    }
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
  return array(
    'browser'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'ipAddress' => getIp() ? getIp() : $defaultIp
    );
  }

function dateFormat($date) {
  return date("d-M-Y", strtotime($date));
}

function timeFormat($time) {
  return date("H:i A", strtotime($time));
}

function getDateTimeFormFormat($dateTime, $withTime = true) {
  if($withTime) $format = "m/d/Y h:i A";
  else $format = "m/d/Y";
  if (!isset($dateTime)) return date($format);
  return date($format, strtotime($dateTime));
}
