<?php
  if(isset($_SESSION["user"])):

    $theme = explode("|", $_SESSION["user"]["verification"]);
    $theme = $theme[3];

    if($theme == "7" || $theme == "4"):
?>
<style>
  .navbar-brand{
    color:white !important;
  }
</style>
<?php
    elseif ($theme == "5"):
?>
<style>
  body{
    margin-top:100px !important;
  }
</style>
<?php
    endif;
?>

<?php endif;
