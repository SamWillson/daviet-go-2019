<?php
  if(isset($_REQUEST["q"])){
    $q = $_REQUEST["q"];
  }else{
    ju("dashboard");
  }
  $now = new DateTime();
  if($now > $date_start){
  if($now < $date_end){

  $db = db();
  $q = $db->real_escape_string($q);
  $query = $db->query("SELECT * FROM qrcodes WHERE uuid='$q'");
  if($query->num_rows == 1):
    $qr = $query->fetch_assoc();
    if($qr["user"] == "0"):
      $verification = explode("|", $_SESSION["user"]["verification"]);
      if($verification[0] == "1"){
      $id = $qr["id"];

      $date_picked = date("F d, Y H:i:s Z");;
      $user = $_SESSION["user"]["id"];
      $db->query("UPDATE qrcodes SET `user`='$user', `date_picked`='$date_picked' WHERE id='$id'");

?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Complete</h4>
    <p>
      You recieved <?=$qr["score"]?> points for scanning the QR Code. <?php if($verification[0] == "0") echo "<br> Please pay the registration fees to claim the prize. Scans of users without payment verification are deleted every hour. Their scans will be available for others to claim."; ?>
    </p>
  </div>
</div>
<?php
}
      else{
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Incomplete</h4>
    <p>
      You need to pay the registration fee to scan the qr codes.
    </p>
  </div>
</div>
<?php
}
    else:
      $uid = $qr["user"];
      $name = $db->query("SELECT name FROM users WHERE id=$uid;")->fetch_assoc()["name"];
      if($qr["user"] == $_SESSION["user"]["id"]){
        $name = $name . ", i.e. you.";
      }
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Incomplete</h4>
    <p>
      The code you are trying to scan has already been scanned by <?=$name?>. Please find another code to scan.
      <?php
        if($qr["user"] == $_SESSION["user"]["id"]){ echo "Please stop trying to re-scan the same qr code."; }
      ?>
    </p>
  </div>
</div>
<?php
    endif;
?>
<?php
  else:
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Incomplete</h4>
    <p>
      The card you scanned is damaged or illegal. Please scan the card again or find another card.
    </p>
  </div>
</div>
<?php
  endif;
}else{
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Incomplete</h4>
    <p>
      The game is over. No scans are allowed now.
    </p>
  </div>
</div>
<?php
}
}else{
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scan Incomplete</h4>
    <p>
      The game has not begun yet.
    </p>
  </div>
</div>
<?php } ?>
