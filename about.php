<?php require "sys/require.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="lib/bootstrap_<?=gettheme();?>.min.css">
    <link rel="stylesheet" href="lib/custom.css">
    <script src="lib/jquery-3.3.1.slim.min.js"></script>
    <script src="lib/popper.min.js"></script>
    <script src="lib/bootstrap.min.js"></script>
    <title>DAVIET Go</title>
  </head>
  <body>

    <?php navbar(); ?>

    <div class="container">

      <?php require "sys/components/card-about.php"; ?>
      <?php require "sys/components/card-sub2pewd.php"; ?>
      <?php require "sys/components/card-version.php"; ?>
    </div>
  </body>
</html>
