<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php echo Asset::css('master.css'); ?>
  </head>
  <body>
    <div class="" id="wrapper">
      <?php echo $content; ?>
      <hr>
      <p class="footer">
        <?php echo $footer; ?>
      </p>
    </div>
    <?php echo Asset::js('master.js'); ?>
  </body>
</html>
