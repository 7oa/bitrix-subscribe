<?
if(isset($_POST['ajaxRequest']) && isset($_POST['sf_EMAIL']) && isset($_POST['rubric_id'])){
    require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
    CModule::IncludeModule('subscribe');
    $obSubscription = new CSubscription;

    $arList = array();
    $subscription = $obSubscription->GetByEmail($_POST['sf_EMAIL']);
    if($arSub = $subscription->Fetch()){
        $ID = $arSub['ID'];
        $arList = $obSubscription->GetRubricArray($ID);
    } else {
        $ID = false;
    }
    $arList[] = $_POST['rubric_id'];

    $arFields = array(
        "USER_ID"		=> ($USER->IsAuthorized() ? $USER->GetID() : false),
        "ACTIVE"		=> "Y",
        "FORMAT"		=> "html",
        "EMAIL"			=> $_POST['sf_EMAIL'],
        "CONFIRMED"		=> "Y",
        "SEND_CONFIRM"  => "N",
        "RUB_ID"		=> $arList,
        "ALL_SITES"		=> "Y",
    );

    if($ID === false){
        if($ID = $obSubscription->Add($arFields,SITE_ID)){
            echo 'OK';
        } else {
            echo 'FAIL';
        }
    } else {
        if($res = $obSubscription->Update($ID,$arFields,SITE_ID)){
            echo 'OK';
        } else {
            echo 'FAIL';
        }
    }

    die();
}