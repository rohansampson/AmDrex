<?php
  include('db.php');
  if($_POST)
  {
    $q=$_POST['search'];
    $query = "select * from events where Event_Name like '%$q%' or Event_ID like '%$q%' order by Event_Name LIMIT 5";
    $result = mysql_query($query) or die(mysql_error());

    while($row=mysql_fetch_array($result))
    {
      $eventname=$row['Event_Name'];
      $eventid=$row['Event_ID'];
      $b_eventname='<strong>'.$q.'</strong>';
      $b_eventid='<strong>'.$q.'</strong>';
      $final_eventname = str_ireplace($q, $b_eventname, $eventname);
      $final_eventid = str_ireplace($q, $b_eventid, $eventid);
?>

  <div class="show" align="left">
    <img src="ic_person_black_48dp_1x.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_eventname; ?></span>&nbsp;<br/><?php echo $final_eventid; ?><br/>
  </div>
<?php
  }
  }
?>
