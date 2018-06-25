<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
// check CAPTCHA
if((isset($_REQUEST["cap_sid"])) && (isset($_REQUEST["cap_word"]))) {
	
	//include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
	
    $captcha = array(
        "status" => "ok",
    );
	
    $cpt = new CCaptcha();
    if(!strlen($_REQUEST["cap_word"]) > 0){
        $captcha = array(
            "status" => "failed",
            "message" => "Empty value is entered",
            "code" => $APPLICATION->CaptchaGetCode(),
        );
    }
    elseif(!$cpt -> CheckCode($_REQUEST["cap_word"],$_REQUEST["cap_sid"])){
        $captcha = array(
            "status" => "failed",
            "message" => "Wrong code from image",
            "code" => $APPLICATION->CaptchaGetCode()
        );
    }
}
else {
    $captcha = array(
        "code" => $APPLICATION->CaptchaGetCode(),
    );
}
echo json_encode($captcha);
?>