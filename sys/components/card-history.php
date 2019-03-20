<?php
  $db = db();
  $uid = $_SESSION["user"]["id"];
  $query = $db->query("SELECT score,date_picked FROM qrcodes WHERE user=$uid;");
  $nscans = $query->num_rows;
  $score = 0;
  $codes = [];
  while($qr = $query->fetch_assoc()){
    $score += $qr["score"];
    $codes[] = $qr;
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

<!-- <hr class="sep" style="margin-top:0px;"> -->

<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Your Scans</h4>
    <table class="table table-hover ctable">
      <thead>
        <tr>
          <td>Score (pts)</td>
          <td>Time Picked (H:i:s)</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($codes as $code): ?>
          <?php
            $exploded_date = explode(" ", $code["date_picked"]);
            array_pop($exploded_date);
            $time = array_pop($exploded_date);

          ?>
          <tr>
            <td><?=$code["score"]?></td>
            <td><?=$time?></td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $db->close(); ?>
