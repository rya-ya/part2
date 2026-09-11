<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/..//lib/mysqli.php';

function dropTable($link){
  $dropTableSql = 'DROP TABLE IF EXISTS reviews';
  $result = mysqli_query($link,$dropTableSql);
  if($link){
    echo 'テーブルを削除しました'.PHP_EOL;
  } else {
    echo 'Error:テーブルの削除に失敗しました'.PHP_EOL;
    echo 'Debugging error:'.mysqli_error($link).PHP_EOL;
  }
}

function createTable($link){
  $createTableSql = <<<EOT
CREATE TABLE reviews(
    id INTEGER NOT NUll AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    status VARCHAR(100),
    score INTEGER(1),
    summary VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;
  $result = mysqli_query($link,$createTableSql);
  if($link){
    echo 'テーブルを作成しました'.PHP_EOL;
  } else {
    echo 'Error:テーブルの作成に失敗しました'.PHP_EOL;
    echo 'Debugging error:'.mysqli_error($link).PHP_EOL;
  }
}


$link =dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
