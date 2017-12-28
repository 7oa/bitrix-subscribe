<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<form class="subscribe__form" action="/" onsubmit="return false;" style="position: relative">
    <input type="hidden" name="rubric_id" value="<?=$arResult['RUBRICS'][0]['ID']?>">
    <input type="hidden" name="ajaxRequest" value="Y">
    <input class="subscribe__input" type="email" name="sf_EMAIL" placeholder="Введите Ваш e-mail для подписки">
    <input class="btn btn-blue subscribe__btn" type="submit" name="OK" onclick="subscribe(this)" value="Подписаться">
    <div id="sf_EMAIL_mess" style="display: none; position: absolute; top: -40px; left: 0;"></div>
</form>