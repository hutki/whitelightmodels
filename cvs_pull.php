<?php
function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
 
    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
 
    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}


//$id = "3','27','29";



$docs_array = array();

$sql = "SELECT tmplvarid,contentid,value FROM modx_site_tmplvar_contentvalues  WHERE contentid IN ('$id') ORDER BY tmplvarid ASC ";
$result = $modx->query($sql);

// Подготавливаем данные
while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['tmplvarid'])
{
case 6: // //Имя
$docs_array[$data['contentid']]['name'] = $data['value'];
break;  
case 34: // Id tv параметра 'Пол'
$docs_array[$data['contentid']]['gender'] = $data['value'];
break;
case 13: // Id tv параметра 'Тип лица'
$docs_array[$data['contentid']]['face'] = $data['value'];
break;
case 31: // Id tv параметра 'Цвет волос'
$docs_array[$data['contentid']]['hair'] = $data['value'];
break;
case 32: // Id tv параметра 'Длина волос'
$docs_array[$data['contentid']]['l_hair'] = $data['value'];
break;
case 33: // Id tv параметра 'Цвет глаз'
$docs_array[$data['contentid']]['eyes'] = $data['value'];
break;
case 9: // Id tv параметра 'Год рождения'
$docs_array[$data['contentid']]['age1'] = abs((string)(round((strtotime($data['value'])-strtotime('Y'))/31536000)));
break;
case 1: // Id tv параметра 'Рост' 
$docs_array[$data['contentid']]['growth1'] = $data['value'];
break;
case 2: // Id tv параметра 'Грудь' 
$docs_array[$data['contentid']]['chest1'] = $data['value'];
break;
case 3: // Id tv параметра 'Талия' 
$docs_array[$data['contentid']]['waist1'] = $data['value'];
break;
case 4: // Id tv параметра 'Бедра' 
$docs_array[$data['contentid']]['hip1'] = $data['value'];
break;
case 47: // Id tv параметра 'Вес' 
$docs_array[$data['contentid']]['weight1'] = $data['value'];
break;
case 11: // Id tv параметра 'Размер груди' 
$docs_array[$data['contentid']]['breast_size'] = $data['value'];
break;
case 5: // Id tv параметра 'Размер одежды' 
$docs_array[$data['contentid']]['clothing1'] = $data['value'];
break;
case 12: // Id tv параметра 'Размер обуви' 
$docs_array[$data['contentid']]['shoes1'] = $data['value'];
break;
case 14: // Id tv параметра 'work' 
$docs_array[$data['contentid']]['work'] = $data['value'];
break;
case 18: // Id tv параметра 'abroad' 
$docs_array[$data['contentid']]['abroad'] = $data['value'];
break;
case 15: // Id tv параметра 'language' !!!!!!!!!!!!!!!!!!!!!не workет
$docs_array[$data['contentid']]['language'] = $data['value'];
break;
case 19: // Id tv параметра 'expert' 
$docs_array[$data['contentid']]['expert'] = $data['value'];
break;
case 20: // Id tv параметра 'expert' 
$docs_array[$data['contentid']]['client'] = $data['value'];
break;
}
}
$docs_ids = '';
foreach ($docs_array as $key =>$value) {

 $docs_ids .= $value['name']. ';'.$value['gender'].';'.$value['face'].';'.$value['hair']. ';'.$value['l_hair'].';'.$value['eyes'].';'.$value['age1'].';'.$value['growth1'].';'.$value['chest1']. ';'.$value['waist1'].';'.$value['hip1'].';'.$value['weight1'].  ';'.$value['breast_size'].';'.$value['clothing1'].';'.$value['shoes1'].';'.$value['work'].';'.$value['language'].';'.$value['abroad'].';'.$value['expert'].';'.$value['client'].";\r\n";

}

$titles = "Имя;Пол;Тип внешности;Цвет волос;Длина волос;Цвет глаз;Возраст;Рост;Грудь;Талия;Бедра;Вес;Размер груди;Размер одежды;Размер обуви;Опыт работы;Языки;Работа за рубежом;Оценка эксперта;Оценка эксперта;\r\n";
$docs_ids = $titles .$docs_ids ;

$docs_ids = str_replace(',', '.', $docs_ids); //запятую меняем на точку, тк , - разделитель в csv 3,5 не катит
$docs_ids = iconv("UTF-8", "WINDOWS-1251",  $docs_ids);

$filename = 'data_export.csv';


// Открываем файл, флаг W означает - файл открыт на запись
$f_hdl = fopen("php://output", 'w');

// Записываем в файл $text
fwrite($f_hdl, $docs_ids);



// Закрывает открытый файл
fclose($f_hdl);

download_send_headers("data_export.csv");
echo $text;
die();


//return  $docs_ids;
/*echo "<pre>";
var_dump($docs_ids);
echo "</pre>";*/