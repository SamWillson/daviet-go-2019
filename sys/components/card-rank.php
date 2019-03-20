<?php
  $db = db();
  $query = $db->query("SELECT COUNT(a.id) AS n, a.user as uid, b.name, SUM(score) AS total FROM `qrcodes` as a, `users` as b WHERE a.user = b.id GROUP BY user ORDER BY total DESC");
?>

<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Scoreboard</h4>
    <table class="table table-hover ctable">
      <thead>
        <tr>
          <td>Rank</td>
          <td>User</td>
          <td>Scans</td>
          <td>Score</td>
        </tr>
      </thead>
      <tbody>
        <?php $rank = 1; while ($ruser = $query->fetch_assoc()): ?>
          <tr class="<?php if($_SESSION["user"]["id"] == $ruser["uid"]) echo 'superlit' ?>">
            <td>#<?=$rank; $rank++;?></td>
            <td><?=$ruser["name"]?></td>
            <td><?=$ruser["n"]?></td>
            <td><?=$ruser["total"]?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>


<?php $db->close(); ?>
