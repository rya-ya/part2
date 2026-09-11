<?php

$errors=[];
 $company=[
    'name' => "",
    'establishment_date' => "",
    'founder' => "",
  ];

$tilte='会社情報の登録';
$content = __DIR__ . '/views/new.php';

include __DIR__ . '/views/layout.php';
