<?php

$url = '';

$str1 = <<<STR
{"user_imid":"284063","plan_title":"ccccccccccccc","plan_exeuserid":"291504","plan_class":"0","plan_send":"291504","plan_stime":"2014-1-17 3:48","plan_etime":"2014-1-17 3:48","plan_content":"ccccc","plan_lever":"0","plan_reason":"","plan_type":"0","ci_startime":"","cl_recycle":""}
STR;

/////////////////////////////////////////////////////////////////

include 'debugVan.php';
$debug = new debugVan();

// $debug->jsonRequestUrl = $url;
// $debug->jsonRequest();$debug->jsonRequestUrl = $url;
$debug->jsonRequestUrl = $url;
$debug->printJsonData($str1);
$debug->jsonRequest();

