<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="csrf-token" content="<?php echo \Config::get('security.csrf_token_key');?>">

    <?php echo Asset::css('app.css'); ?>
    <script type="text/javascript">
        window.fuel = window.fuel || {};
        window.fuel.csrfToken = "{{csrf_token()}}";
    </script>
  </head>
  <body>
    <div class="" id="app">
      <example></example>
    </div>
    <?php echo Asset::js('app.js'); ?>a
  </body>
</html>
