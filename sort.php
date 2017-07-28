<?php
<?php
$sort = (isset($_GET['sortirovka']))?$_GET['sortirovka']:'';


$output = '';

$x= $sort;
switch ($x) {
case "sort_name":
   $output = "pagetitle";
    break;
case "sort_createdon":
   $output = "createdon";
    break;
case "sort_editedon":
   $output ="editedon";
    break;
case "sort_reiting":
   $output ="Рейтинг модели по оценке эксперта";
    break;
  case "sort_id":
   $output ="id";
    break;
}
$output = ($sort == 'sort_reiting')?'&sortbyTV=`'.$output.'`':'&sortby=`{"'.$output.'":"ASC"}`';


 return $output;