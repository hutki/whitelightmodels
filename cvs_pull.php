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

$pattern = '/^print_[0-9]+$/';
foreach($_GET as $key => $value)
{
if(preg_match($pattern, $key))
    $result .= $value."',"."'";
}
$id = substr($result, 0, -3);

$docs_array = array();

$sql = "SELECT tmplvarid,contentid,value FROM modx_site_tmplvar_contentvalues  WHERE contentid IN ('$id') ORDER BY tmplvarid ASC";
$result = $modx->query($sql);

// Подготавливаем данные
while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['tmplvarid'])
{
case 6: //Имя
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
case 15: // Id tv параметра 'language' 
$docs_array[$data['contentid']]['language'] = $data['value'];
break;
case 24: // Id tv параметра 'language' 
$docs_array[$data['contentid']]['tags'] = $data['value'];
break;
case 19: // Id tv параметра 'expert' 
$docs_array[$data['contentid']]['expert'] = $data['value'];
break;
case 20: // Id tv параметра 'expert' 
$docs_array[$data['contentid']]['client'] = $data['value'];
break;
case 10: // Id tv параметра 'city' 
$docs_array[$data['contentid']]['city'] = $data['value'];
break;
case 16: // Id tv параметра 'Контактный номер' 
$docs_array[$data['contentid']]['tel'] = $data['value'];
break;
case 17: // Id tv параметра 'email' 
$docs_array[$data['contentid']]['email'] = $data['value'];
break;
case 35: // Id tv Фио 
$docs_array[$data['contentid']]['fio'] = $data['value'];
break;
case 41: // Id tv параметра 'Instagram' 
$docs_array[$data['contentid']]['instagram'] = $data['value'];
break;
case 42: // Id tv параметра 'vk' 
$docs_array[$data['contentid']]['vk'] = $data['value'];
break;
case 43: // Id tv параметра 'facebook' 
$docs_array[$data['contentid']]['facebook'] = $data['value'];
break;
case 44: // Id tv параметра 'skype' 
$docs_array[$data['contentid']]['skype'] = $data['value'];
break;
}
}
$docs_ids = '';
foreach ($docs_array as $key =>$value) {

$docs_ids .=  $key.';'.$value['name'].';'.$value['gender'].';'.$value['face'].';'.$value['hair'].';'.$value['l_hair'].';'.$value['eyes'].';'.$value['age1'].';'.$value['growth1'].';'.$value['chest1'].';'.$value['waist1'].';'.$value['hip1'].';'.$value['weight1'].';'.$value['breast_size'].';'.$value['clothing1'].';'.$value['shoes1'].';'.$value['work'].';'.$value['language'].';'.$value['abroad'].';'.$value['tags'].';'.$value['expert'].';'.$value['client'].';'.$value['city'].';'.$value['tel'].';'.$value['email'].';'.$value['fio'].';'.$value['instagram'].';'.$value['vk'].';'.$value['facebook'].';'.$value['skype'].";\r\n";
}

$tv_array = array();
$sql = "SELECT id,name,elements FROM modx_site_tmplvars";
$result = $modx->query($sql);

while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['id'])
{
case 6: // Имя
$tv_array['name'] = $data['name'];
break;
;
case 34: // Пол
$tv_array['gender'] = $data['name'];
break;
;
case 1: // Рост
$tv_array['growth'] = $data['name'];
break;
;
case 2: // Грудь
$tv_array['chest'] = $data['name'];
break;
;
case 3: // Талия
$tv_array['waist'] = $data['name'];
break;
;
case 4: // Бедра
$tv_array['hip'] = $data['name'];
break;
;
case 47: // Вес
$tv_array['weight'] = $data['name'];
break;
;
case 5: // Размер одежды
$tv_array['clothing'] = $data['name'];
break;
;
case 11: // Размер груди
$tv_array['breast_size'] = $data['name'];
break;
;
case 12: // Размер одежды
$tv_array['shoes'] = $data['name'];
break;
;
case 19: // Рейтинг по оценке эксперта
$tv_array['expert'] = $data['name'];
break;
;
case 20: // Рейтинг по оценке клиента
$tv_array['client'] = $data['name'];
break;
;
case 9: // Дата рождения
$tv_array['age'] = $data['name'];
break;
;
case 13: // Тип внешности
$tv_array['face'] = $data['name'];
break;
;
case 31: //Цвет волос
$tv_array['hair'] = $data['name'];
break;
case 32: //Цвет волос
$tv_array['l_hair'] = $data['name'];
break;
case 33: //Цвет глаз
$tv_array['eyes'] = $data['name'];
break;
case 11: //Размер груди
$tv_array['breast_size'] = $data['name'];
break;
case 14: //Опыт работы
$tv_array['work'] = $data['name'];
break;
case 15: //Знание языков
$tv_array['language'] = $data['name'];
break;
case 18: //Знание языков
$tv_array['abroad'] = $data['name'];
break;
case 24: //Тэги
$tv_array['tags'] = $data['name'];
break;
case 10: //Знание языков
$tv_array['city'] = $data['name'];
break;
case 16: //Контактный номер
$tv_array['tel'] = $data['name'];
break;
case 17: //email
$tv_array['email'] = $data['name'];
break;
case 35: //email
$tv_array['fio'] = $data['name'];
break;
case 41: //instagram
$tv_array['instagram'] = $data['name'];
break;
case 42: //vk
$tv_array['vk'] = $data['name'];
break;
case 43: //facebook
$tv_array['facebook'] = $data['name'];
break;
case 44: //skype
$tv_array['skype'] = $data['name'];
break;
}
}
$titles = "id;".$tv_array['name'].';'.$tv_array['gender'].';'.$tv_array['face'].';'.$tv_array['hair'].';'.$tv_array['l_hair'].';'.$tv_array['eyes'].';'.$tv_array['age'].';'.$tv_array['growth'].';'.$tv_array['chest'].';'.$tv_array['waist'].';'.$tv_array['hip'].';'.$tv_array['weight'].';'.$tv_array['breast_size'].';'.$tv_array['clothing'].';'.$tv_array['shoes1'].';'.$tv_array['work'].';'.$tv_array['language'].';'.$tv_array['abroad'].';'.$tv_array['tags'].';'.$tv_array['expert'].';'.$tv_array['client'].';'.$tv_array['city'].';'.$tv_array['tel'].';'.$tv_array['email'].';'.$tv_array['fio'].';'.$tv_array['instagram'].';'.$tv_array['vk'].';'.$tv_array['facebook'].';'.$tv_array['skype'].";\r\n";
$docs_ids = $titles .$docs_ids ;

 $docs_ids = iconv("UTF-8","MacCyrillic",  $docs_ids);

//подготавливаем вывод для винды
/*
$win = "Windows";
if (preg_match("/$win/i", $_SERVER['HTTP_USER_AGENT'])){
    $docs_ids = preg_replace("/\./i",",", $docs_ids,1); //точку меняем на запятую, тк 3.5  в exel не катит
    $docs_ids = iconv("UTF-8", "WINDOWS-1251",  $docs_ids);
}
*/
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