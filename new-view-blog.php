<?php
include 'adminpanel/config.php';
$add = "";

$sql = "SELECT * FROM blogs WHERE id = '".$_GET['blogid']."' AND blog_title = '".$_GET['blog_title']."' ";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0) {
  while ($result = mysqli_fetch_assoc($res)) {
    $add = $result['clicks'] + 1;
  }
}

if (isset($_GET['blogid']) && isset($_GET['blog_title'])) {
  $total_clicks = "UPDATE blogs SET clicks = '".$add."' WHERE id = '".$_GET['blogid']."' ";
  mysqli_query($link, $total_clicks);
  header('location: view-blog?blogid='.$_GET['blogid'].'&blog_title='.$_GET['blog_title'].'');
}
else{
  header('location: blog');
}
?>