<?php

$db = db();


?>
<div class="card mf" style="overflow:hidden;">
  <div class="card-body">
    <h4 class="card-title">User Info</h4>
  </div>

  <table class="table table-responsive" style="overflow:scroll;">
    <tr style="font-weight:bold;">
      <td>Name</td>
      <td>Payment</td>
      <td>Email V</td>
      <td>Phone V</td>
      <td>Amt</td>
      <td>Buttons</td>
      <td>Email</td>
      <td>Phone</td>
    </tr>
  <?php
  if(isset($_POST["update"])){
    $id = $_POST["id"];
    $pay = $_POST["payment"];
    $v[0] = 0;
    $v[1] = 0;
    $v[2] = 0;
    $v[3] = 0;
    if(isset($_POST["v1"])) $v[0] = 1;
    if(isset($_POST["v2"])) $v[1] = 1;
    if(isset($_POST["v3"])) $v[2] = 1;
    $ver = implode("|", $v);
    $db->query("UPDATE users SET payment = '$pay', verification = '$ver' WHERE id = $id");

  }
  $user_query = $db->query("SELECT id,name,email, phone_number,payment,verification FROM users");

  while($us = $user_query->fetch_assoc()):
    $v = explode("|", $us["verification"]);
  ?>
  <form method="post">
  <tr>
    <td><?=$us["name"]?></td>
    <td><input type="checkbox" name="v1" <?php if($v[0]) echo "checked"; ?>></td>
    <td><input type="checkbox" name="v2" <?php if($v[1]) echo "checked"; ?>></td>
    <td><input type="checkbox" name="v3" <?php if($v[2]) echo "checked"; ?>></td>
    <td><input type="text" name="payment" value="<?=$us["payment"]?>"> </td>
    <input type="hidden" name="id" value="<?=$us["id"]?>">
    <td><input type="submit" name="update" value="Save"> </td>
    <td><?=$us["email"]?></td>
    <td><?=$us["phone_number"]?></td>
  </tr>
</form>
  <?php
  endwhile;
  $db->close();
  ?>
  </table>
</div>
