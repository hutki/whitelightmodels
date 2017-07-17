
<?php
//сравниваем, существует ли в $_GET print_id и выводим результат для чанка

$pattern = '/^print_[0-9]+$/';
foreach($_GET as $key => $value)
{
if(preg_match($pattern, $key))
	$result .= $value.',';
}
$result = substr($result, 0, -1);

echo $result;
