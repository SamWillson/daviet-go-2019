<?php
  if(isset($_POST["change_pass"])){
    $db = db();
    function post($id){
      global $db;
      $dat = $db->real_escape_string($_POST[$id]);
      if(trim($dat) == ""){
        echo '<div class="card green bg-danger text-white mf"><div class="card-body">Please enter valid '. $id . '.</div></div>';
      }
      return $dat;
    }
    $opass = post("oldpass");
    $npass = post("newpass");
    $uid = $_SESSION["user"]["id"];
    if($_SESSION["user"]["password"] == $opass){
      $db->query("UPDATE users SET password = '$npass' WHERE id = '$uid'");
      echo '<div class="card green bg-success text-white mf"><div class="card-body">Password has been changed.</div></div>';
    }else{
      echo '<div class="card green bg-danger text-white mf"><div class="card-body">Current Password entered was wrong.</div></div>';
    }
    $db->close();
  }
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Account Details</h4>
    <form id="password" method="post">
      <div class="form-group">
        <label for="name">Current Password</label>
        <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="HelloKitty">
      </div>
      <div class="form-group">
        <label for="name">New Password</label>
        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="HelloKitty123">
      </div>
      <input type="hidden" name="change_pass" value="1">
      <button id="submit_password" class="btn btn-primary btn-block">Change Password</button>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#submit_password").on("click", function(){
      $("form#password").submit();
    });
  });
</script>

<?php
  if(isset($_POST["change_theme"])){
    $tc = (int)($_POST["theme_choice"]);
    $uid = $_SESSION["user"]["id"];
    $vstat = explode("|", $_SESSION["user"]["verification"]);
    $vstat[3] = $tc;
    $vstat = implode("|", $vstat);
    $db = db();
    $db->query("UPDATE users SET verification = '$vstat' WHERE id = '$uid'");
    $db->close();
    ju("dashboard");
  }
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Switch Theme</h4>
    <form id="theme" method="post">
      <div class="form-group">
        <label for="name">Theme</label>
        <select class="form-control" id="theme_choice" name="theme_choice">
          <option value="0">Slate <small>(default recommended)</small></option>
          <!-- <option value="1">Minty</option> -->
          <option value="2">Lumen</option>
          <!-- <option value="3">Litera</option> -->
          <option value="4">Yeti</option>
          <option value="5">Lux</option>
          <!-- <option value="6">Solar</option> -->
          <option value="7">Spacelab</option>
        </select>
      </div>
      <input type="hidden" name="change_theme" value="1">
      <button id="submit_theme" class="btn btn-primary btn-block">Switch Theme</button>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#submit_theme").on("click", function(){
      $("form#theme").submit();
    });
  });
</script>
