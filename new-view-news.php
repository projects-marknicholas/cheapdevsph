<?php
include 'adminpanel/config.php';
$add = "";

$sql = "SELECT * FROM news WHERE id = '".$_GET['newsid']."' AND news_title = '".$_GET['news_title']."' ";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0) {
  while ($result = mysqli_fetch_assoc($res)) {
    $add = $result['clicks'] + 1;
  }
}

if (isset($_GET['newsid']) && isset($_GET['news_title'])) {
  $total_clicks = "UPDATE news SET clicks = '".$add."' WHERE id = '".$_GET['newsid']."' ";
  mysqli_query($link, $total_clicks);
  header('location: view-news?newsid='.$_GET['newsid'].'&news_title='.$_GET['news_title'].'');
}
else{
  header('location: news.php');
}
?>