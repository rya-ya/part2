<?php
require_once __dir__.'/lib/mysqli.php';
require_once __dir__.'/lib/escape.php';

function listBookLog($link){

  $reviews=[];
  $sql='SELECT title,author,status,score,summary FROM reviews';

  $result=mysqli_query($link,$sql);
  while($review=mysqli_fetch_assoc($result)){
    $reviews[]=$review;
  }
  mysqli_free_result($result);
  return $reviews;

}

$link=dbConnect();
$reviews=listBookLog($link);

$title='読書ログ';
$content=__DIR__.'/views/index.php';

include __DIR__.'/views/layout.php';
