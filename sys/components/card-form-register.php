<?php
  if(isset($_POST["register"])){
    $db = db();
    global $skip;
    $skip = false;
    function post($id){
      global $db;
      global $skip;
      $dat = $db->real_escape_string($_POST[$id]);
      if(trim($dat) == ""){
        echo '<div class="card green bg-danger text-white mf"><div class="card-body">Please enter valid '. $id . '.</div></div>';
        $skip = true;
      }
      return $dat;
    }
      $name = post("name");
      $institute_name = post("institute");
      $degree = post("degree");
      $semester = post("semester");
      $institute = "$institute_name || $degree || $semester";
      $phone = post("phone");
      $email = post("email_control");
      $password = md5(post("password_control"));
      $date = date("F d, Y H:i:s Z");
      //echo $date;
      if($skip == false){
        $check_query = $db->query("SELECT * FROM users WHERE email = '$email'");
        if($check_query->num_rows == 0){
          $db->query("INSERT INTO users VALUES(NULL, '$name', '$institute', '$phone', '$email', '$password', '0', '0|1|1|0', '$date')");
          echo '<div class="card green bg-success text-white mf"><div class="card-body">Sign Up Complete</div></div>';
        }else{
          echo '<div class="card green bg-danger text-white mf"><div class="card-body">Email ID already exists.</div></div>';
        }
        //echo $db->error;
        $db->close();
      }
  }
?>
<div class="card mf">
  <div class="card-body">
    <h4 class="card-title">Registration</h4>
    <form id="registration" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Bhuvan Bam">
      </div>
      <div class="form-group">
        <label for="name">Institute Name</label>
        <input type="text" class="form-control" id="institute" name="institute" placeholder="DAVIET, Jalandhar">
      </div>
      <div class="form-group">
        <label for="name">Degree</label>
        <input type="text" class="form-control" id="degree" name="degree" placeholder="BTech IT">
      </div>
      <div class="form-group">
        <label for="name">Semester</label>
        <input type="number" class="form-control" id="semester" name="semester" placeholder="4">
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" min="8" placeholder="Phone Number">
        <small id="phoneHelp" class="form-text text-muted">Call Verification Required.</small>
      </div>
      <div class="form-group">
        <label for="email_control">Email address</label>
        <input type="email" class="form-control" id="email_control" name="email_control" placeholder="Email">
        <small id="emailHelp" class="form-text text-muted">Verification Required.</small>
      </div>
      <div class="form-group">
        <label for="password_control">Password</label>
        <input type="password" class="form-control" id="password_control" name="password_control" placeholder="Password">
      </div>
      <input type="hidden" name="register" value="1">
      <button id="submit" class="btn btn-primary btn-block">Register</button>
      <hr class="sep">
      <a href="<?=u('login')?>" class="btn btn-primary btn-block">Login</a>
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
