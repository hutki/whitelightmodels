<?php
$get_print = (isset($_GET['print']))?$_GET['print']:'';

 foreach ($get_print as $get_print){
$result .= $get_print.',';

 }


$result  = substr($result, 0, -1);
var_dump(get_print);
return $result;