<?php

require_once __DIR__.'/lib/mysqli.php';

function createReview($link,$review){
  $sql = <<<EOT
  INSERT INTO reviews (
    title,
    author,
    status,
    score,
    summary
  ) values (
    "{$review['title']}",
    "{$review['author']}",
    "{$review['status']}",
    "{$review['score']}",
    "{$review['summary']}"
  )
EOT;

  $result=mysqli_query($link,$sql);

  if(!$result){
    error_log('Error: fail to create review');
    error_log('Debugging Error: '.mysqli_error($link));
  }

}

function validate($review){

  $errors=[];

  if(!strlen($review['title'])){
    $errors['title']='書籍名を入力してください';
  }elseif(strlen($review['title']>255)){
    $errors['title']='書籍名を255字以内で入力してください';
  }

  if(!strlen($review['author'])){
    $errors['author']='著者名を入力してください';
  }elseif(strlen($review['author']>255)){
    $errors['author']='著者名を255字以内で入力してください';
  }

  if(!in_array($review['status'],['未読','読んでいる','読了',true])){
    $errors['status']='読書状況は「未読」「読んでいる」「読了」のいずれかを入力してください';
  }

  if(1>$review['score']||$review['score']>5){
    $errors['score']='評価は１から５の整数で入力してください';
  }

  if(!strlen($review['summary'])){
    $errors['summary']='感想を入力してください';
  }elseif(strlen($review['summary']>255)){
    $errors['summary']='感想を255字以内で入力してください';
  }

  return $errors;

}

if($_SERVER["REQUEST_METHOD"]==='POST'){
  $review=[
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'status' => $_POST['status'] ?? null,
    'score' => $_POST['score'],
    'summary' => $_POST['summary']
  ];
  //バリデーションする
  $errors=validate($review);
  if (!count($errors)){
    $link = dbConnect();
    createReview($link,$review);
    mysqli_close($link);
    header('location: index.php');
  }

}

$title='読書ログ';
$content=__DIR__.'/views/new.php';
include __dir__.'/views/layout.php';
