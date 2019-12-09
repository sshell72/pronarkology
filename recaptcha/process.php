<?php
// переменная в которую будем сохранять результат работы
$data['result']='error';


$secret = '6LfQ3RIUAAAAAMzotU6_maULFE6iGPJYuimWTRsJ';


require_once (dirname(__FILE__).'/autoload.php');
if (isset($_POST['grecaptcha'])) {
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->verify($_POST['grecaptcha'], $_SERVER['REMOTE_ADDR']);
if ($resp->isSuccess()){
$data['result']='ok';
} else {
$data['result']='error';
}
}

echo json_encode($data['result']);

?>
