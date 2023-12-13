<?php
include 'adminpanel/config.php';
$add = "";

$sql = "SELECT * FROM promo WHERE id = '".$_GET['id']."' AND promo_title = '".$_GET['title']."' ";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0) {
  while ($result = mysqli_fetch_assoc($res)) {
    $add = $result['clicks'] + 1;
  }
}

if (isset($_GET['id']) && isset($_GET['title'])) {
  $total_clicks = "UPDATE promo SET clicks = '".$add."' WHERE id = '".$_GET['id']."' ";
  mysqli_query($link, $total_clicks);
  header('location: view-promo?id='.$_GET['id'].'&title='.$_GET['title'].'');
}
else{
  header('location: promo');
}
?>