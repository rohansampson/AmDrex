<?php
  include('db.php');
  if($_POST)
  {
    $q=$_POST['search'];
    $query = "select * from user where User_Name like '%$q%' or Email like '%$q%' order by User_Name LIMIT 5";
    $result = mysql_query($query) or die(mysql_error());

    while($row=mysql_fetch_array($result))
    {
      $username=$row['User_Name'];
      $email=$row['Email'];
      $b_username='<strong>'.$q.'</strong>';
      $b_email='<strong>'.$q.'</strong>';
      $final_username = str_ireplace($q, $b_username, $username);
      $final_email = str_ireplace($q, $b_email, $email);
?>

  <div class="show" align="left">
    <img src="ic_person_black_48dp_1x.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
  </div>
<?php
  }
  }
?>
