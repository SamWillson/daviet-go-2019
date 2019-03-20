<?php
  $now = new DateTime();
  if($now > $date_start):
    if($now > $date_end):
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">
      Game is over now.
    </h4>
  </div>
</div>
<?php
    else:
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">
      <?php
      $now = new DateTime();
      $date_diff = $now->diff($date_end);
      echo $date_diff->h; echo "hr "; echo $date_diff->i; echo "min "; echo $date_diff->s; echo "sec";
      echo " remaining";
      ?>
    </h4>
  </div>
</div>
<?php
    endif;
  else:
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">
      <?php
      $date_diff = $now->diff($date_start);
      echo "Game will begin in : ";
      echo $date_diff->h; echo "hr "; echo $date_diff->i; echo "min "; echo $date_diff->s; echo "sec";
      ?>
    </h4>
  </div>
</div>
<?php
  endif;
?>
