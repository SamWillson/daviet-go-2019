<?php
define("RELEASE", 'DEVELOPEMENT');
session_start();
date_default_timezone_set('Asia/Kolkata');
# Simple Routes
$routes = array(
  "login" => "login.php",
  "signup" => "signup.php",
  "logout" => "logout.php",
  "home" => "dashboard.php",
  "about" => "about.php",
  "help_payment" => "help_payment.php",
  "help_phone" => "help_phone.php",
  "help_email" => "help_email.php",
  "rank" => "rank.php",
  "history" => "history.php",
  "settings" => "settings.php",
  "sub2pewd" => "sub2pewd.php",
  "shop" => "shop.php",
  "map" => "map.php",
  "admin" => "admin.php",
  "admin-error" => "admin-error.php",
);
$date_start = new DateTime('11:00:00');
$date_end = new DateTime('16:00:00');
$version = "1.0.0";

if(RELEASE == "DEVELOPEMENT"){
  # Base URL
  function b($x=""){return "http://localhost/go/" . $x;}
  # Database
  function db(){return new mysqli("localhost", "root", "", "go");}
}else{
  require "require-server.php";
}

# Route Link
function u($x){$routes = $GLOBALS['routes']; ;return b($routes[$x]);}
# Relocate / Jump
function j($to){echo"<script>window.location='$to'</script>";die();header("Location: $to");}
# Relocate to Route
function ju($x){j(u($x));}
# Navbar
function navbar(){
  if(isset($_SESSION["user"]))
    require "sys/components/navbar.php";
  else
    require "sys/components/navbar-guest.php";
}
if(isset($_SESSION["user"])){
  $db = db();
  $_SESSION["user"] = $db->query("SELECT * FROM users WHERE id=" . $_SESSION["user"]["id"])->fetch_assoc();
  $db->close();
}
function gettheme(){
  $themes = array(
    0 => "slate",
    1 => "minty",
    2 => "lumen",
    3 => "litera",
    4 => "yeti",
    5 => "lux",
    6 => "solar",
    7 => "spacelab",
  );
  if(!isset($_SESSION["user"])){
    return $themes[0];
  }else{
    $vstat = explode("|", $_SESSION["user"]["verification"]);
    return $themes[$vstat[3]];
  }
}
require "sys/colorfix.php";
