# Reload CAPTCHA 1C-Bitrix
<hr>

<h3>Example</h3>
<ul>
  <li>template.php</li>
</ul>
<p>You must add this code to <form></p>

```php
<div class="captcha-block">
  <input class="captchaSid" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" type="hidden">
  <img class="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40">

  <a class="captcha-link reloadCaptcha" href="#">Обновить картинку</a>
</div>

```

<ul>
  <li>script.js</li>
</ul>

```js
$('.captcha-block').on('click', '.reloadCaptcha', function(){
  var $parent = $(this).closest('.captcha-block');
  $.getJSON( '/ajax/reload_captcha.php', function(data) {
      $parent.find('.captchaImg').attr('src','/bitrix/tools/captcha.php?captcha_sid=' + data.code);
      $parent.find('.captchaSid').val(data.code);
  });
  return false;
});

```
