<?php
  $vstat = explode("|", $_SESSION["user"]["verification"]);
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Activation Status</h4>
    <div class="row">
      <div class="col s4 pill <?php echo ($vstat[0]=='0')?'red':'green';?>">
        <a href="<?=u('help_payment')?>">
          <span style="color:black !important;">Payment</span>
        </a>
      </div>
      <div class="col s4 pill <?php echo ($vstat[1]=="0")?'red':'green';?>">
        <a href="<?=u('help_phone')?>">
          <span style="color:black !important;">Phone</span>
        </a>
      </div>
      <div class="col s4 pill <?php echo ($vstat[2]=='0')?'red':'green';?>">
        <a href="<?=u('help_email')?>">
          <span style="color:black !important;">Email</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php require "card-time-begin.php"; ?>

<?php
  $db = db();
  $uid = $_SESSION["user"]["id"];
  $query = $db->query("SELECT score FROM qrcodes WHERE user=$uid;");
  $nscans = $query->num_rows;
  $score = 0;
  while($qr = $query->fetch_assoc()){
    $score += $qr["score"];
  }
?>

<div class="row">
  <div class="col s6">
    <div class="card mf">
      <div class="card-body">
        <h4 class="card-title"><?=$nscans?> scans</h4>
      </div>
    </div>
  </div>
  <div class="col s6">
    <div class="card mf">
      <div class="card-body">
        <h4 class="card-title"><?=$score?> pts</h4>
      </div>
    </div>
  </div>
</div>

<?php require "card-app-suggest.php" ?>
