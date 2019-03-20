<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
