<?php
  include('db.php');
  if($_POST)
  {
    $q=$_POST['search'];
    $query = "select * from groups where Group_Name like '%$q%' or Group_ID like '%$q%' order by Group_Name LIMIT 5";
    $result = mysql_query($query) or die(mysql_error());

    while($row=mysql_fetch_array($result))
    {
      $groupname=$row['Group_Name'];
      $groupid=$row['Group_ID'];
      $b_groupname='<strong>'.$q.'</strong>';
      $b_groupid='<strong>'.$q.'</strong>';
      $final_groupname = str_ireplace($q, $b_groupname, $groupname);
      $final_groupid = str_ireplace($q, $b_groupid, $groupid);
?>

  <div class="show" align="left">
    <img src="ic_person_black_48dp_1x.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_groupname; ?></span>&nbsp;<br/><?php echo $final_groupid; ?><br/>
  </div>
<?php
  }
  }
?>
