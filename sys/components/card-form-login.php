<?php
  if(isset($_SESSION["user"])){j(u("home"));}
  if(isset($_POST["login"])){
    $db = db();
    function post($id){
      global $db;
      return $db->real_escape_string($_POST[$id]);
    }
    $email = post("email_control");
    $password = md5(post("password_control"));
    $check_query = $db->query("SELECT * FROM users WHERE email = '$email'");
    if($check_query->num_rows == 1){
      $user = $check_query->fetch_assoc();
      if($password == $user["password"]){
        $_SESSION["user"] = $user;
        j(u("home"));
      }else{
        echo '<div class="card green bg-danger text-white mf"><div class="card-body">Combination Error. Please try again.</div></div>';
      }
    }else{
      echo '<div class="card green bg-danger text-white mf"><div class="card-body">Combination Error. Please try again.</div></div>';
    }
    //echo $db->error;
    $db->close();
  }
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Login</h4>
    <form class="" method="post">
      <div class="form-group">
        <label for="email_control">Email address</label>
        <input type="email" class="form-control" id="email_control" name="email_control" aria-describedby="EmailForLogin" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="password_control">Password</label>
        <input type="password" class="form-control" id="password_control" name="password_control" aria-describedby="PasswordForLogin" placeholder="Password">
      </div>
      <!-- <input type="submit" class="btn btn-primary btn-block" value="Login"> -->
      <input type="hidden" name="login" value="1">
      <button id="submit" class="btn btn-primary btn-block">Login</button>
      <hr class="sep">
      <a href="<?=u('signup')?>" class="btn btn-primary btn-block">Register</a>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#submit").on("click", function(){
      $("form#registration").submit();
    });
  });
</script>
