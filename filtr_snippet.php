<?php
if (isset($_GET['gender']))
    $gender = $_GET['gender'];

if (isset($_GET['face']))
    $face = $_GET['face'];

if (isset($_GET['hair']))
    $hair = $_GET['hair'];

if (isset($_GET['l_hair']))
    $l_hair = $_GET['l_hair'];

if (isset($_GET['eyes']))
    $eyes = $_GET['eyes'];

if (isset($_GET['age1']))
    $age1 = $_GET['age1'];


if (isset($_GET['age2']))
    $age2 = $_GET['age2'];

if (isset($_GET['growth1']))
    $growth1 = $_GET['growth1'];

if (isset($_GET['growth2']))
    $growth2 = $_GET['growth2'];

if (isset($_GET['chest1']))
    $chest1 = $_GET['chest1'];

if (isset($_GET['chest2']))
    $chest2 = $_GET['chest2'];

if (isset($_GET['waist1']))
    $waist1 = $_GET['waist1'];

if (isset($_GET['waist2']))
    $waist2 = $_GET['waist2'];

if (isset($_GET['hip1']))
    $hip1 = $_GET['hip1'];

if (isset($_GET['hip2']))
    $hip2 = $_GET['hip2'];

if (isset($_GET['breast_size']))
    $breast_size = $_GET['breast_size'];

if (isset($_GET['clothing1']))
    $clothing1 = $_GET['clothing1'];

if (isset($_GET['clothing2']))
    $clothing2 = $_GET['clothing2'];

if (isset($_GET['shoes1']))
    $shoes1 = $_GET['shoes1'];

if (isset($_GET['shoes2']))
    $shoes2 = $_GET['shoes2'];

if (isset($_GET['work']))
    $work = $_GET['work'];

if (isset($_GET['abroad']))
    $abroad = $_GET['abroad'];

if (isset($_GET['language']))
    $language = $_GET['language'];

if (isset($_GET['expert']))
    $expert = $_GET['expert'];

if (isset($_GET['client']))
    $client = $_GET['client'];

if (isset($_GET['clean_p']))
    $clean_p = $_GET['clean_p'];

//----------------------------------------------------------------------------

$docs_array = array();

$sql = "SELECT tmplvarid,contentid,value FROM modx_site_tmplvar_contentvalues";
$result = $modx->query($sql);

// Подготавливаем данные
while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['tmplvarid'])
{
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
 // Теперь у нас каждый документ имеет полный набор tv параметров!!!!
 // [10] => Array ( [face] => 175 [gender] => 3 ) [16] => Array ( [face] => 175 [gender] => 3 )
 // где 10 и 16 id доукмента

 // Выполняем выборку в соответствии с фильтрами
    $docs_ids = '';
 foreach ($docs_array as $key => $val)
 {
 if (
  //пол
  ($val['gender'] == $gender || !isset($val['gender'])) &&
  //тип лица
  ($val['face'] == $face || !isset($val['face']) || empty($face) || !isset($face)) &&
  //цвет волос
  ($val['hair'] == $hair || !isset($val['hair']) || empty($hair) || !isset($hair)) &&
  //длина волос
  ($val['l_hair'] == $l_hair || !isset($val['l_hair']) || empty($l_hair) || !isset($l_hair)) &&
  //цвет глаз
  ($val['eyes'] == $eyes || !isset($val['eyes']) || empty($eyes) || !isset($eyes)) &&
  //возраст
   (((empty($age1) || !isset($age1)) && ($val['age1'] >= 0 && $val['age1'] <= $age2)) ||
   ((empty($age2) || !isset($age2)) && $val['age1'] >= $age1)||
   ((empty($age2) || !isset($age2)) && (empty($age1) || !isset($age1)))||
   ($val['age1'] >= $age1 && $val['age1'] <= $age2)) && 
   //рост
  (((empty($growth1) || !isset($growth1)) && ($val['growth1'] >= 0 && $val['growth1'] <= $growth2)) ||
   ((empty($growth2) || !isset($growth2)) && $val['growth1'] >= $growth1)||
   ((empty($growth2) || !isset($growth2)) && (empty($growth1) || !isset($growth1)))||
   ($val['growth1'] >= $growth1 && $val['growth1'] <= $growth2)) && 
  //грудь
  (((empty($chest1) || !isset($chest1)) && ($val['chest1'] >= 0 && $val['chest1'] <= $chest2)) ||
   ((empty($chest2) || !isset($chest2)) && $val['chest1'] >= $chest1)||
   ((empty($chest2) || !isset($chest2)) && (empty($chest1) || !isset($chest1)))||
   ($val['chest1'] >= $chest1 && $val['chest1'] <= $chest2)) &&
  //талия
  (((empty($waist1) || !isset($waist1)) && ($val['waist1'] >= 0 && $val['waist1'] <= $waist2)) ||
     ((empty($waist2) || !isset($waist2)) && $val['waist1'] >= $waist1)||
     ((empty($waist2) || !isset($waist2)) && (empty($waist1) || !isset($waist1)))||
     ($val['waist1'] >= $waist1 && $val['waist1'] <= $waist2)) &&
  //бедра
  (((empty($hip1) || !isset($hip1)) && ($val['hip1'] >= 0 && $val['hip1'] <= $hip2)) ||
     ((empty($hip2) || !isset($hip2)) && $val['hip1'] >= $hip1)||
     ((empty($hip2) || !isset($hip2)) && (empty($hip1) || !isset($hip1)))||
     ($val['hip1'] >= $hip1 && $val['hip1'] <= $hip2)) &&
  //размер груди
   ($val['breast_size'] == $breast_size || !isset($val['breast_size']) || empty($breast_size) || !isset($breast_size)) &&
  //размер одежды
  (((empty($clothing1) || !isset($clothing1)) && ($val['clothing1'] >= 0 && $val['clothing1'] <= $clothing2)) ||
     ((empty($clothing2) || !isset($clothing2)) && $val['clothing1'] >= $clothing1)||
     ((empty($clothing2) || !isset($clothing2)) && (empty($clothing1) || !isset($clothing1)))||
     ($val['clothing1'] >= $clothing1 && $val['clothing1'] <= $clothing2)) &&
  //размер обуви
  (((empty($shoes1) || !isset($shoes1)) && ($val['shoes1'] >= 0 && $val['shoes1'] <= $shoes2)) ||
   ((empty($shoes2) || !isset($shoes2)) && $val['shoes1'] >= $shoes1)||
   ((empty($shoes2) || !isset($shoes2)) && (empty($shoes1) || !isset($shoes1)))||
   ($val['shoes1'] >= $shoes1 && $val['shoes1'] <= $shoes2)) &&
  //опыт работы
   ($val['work'] == $work || !isset($val['work']) || empty($work) || !isset($work)) &&
   //гастробайтер
   ($val['abroad'] == $abroad || !isset($val['abroad']) || empty($abroad) || !isset($abroad)) &&
   //языки
    ((preg_match('/^(.)*'.$language.'(.)*$/uis', $val['language']))  || empty($language) || !isset($language)) &&
  //эксперт
    ($val['expert'] == $expert || !isset($val['expert']) || empty($expert) || !isset($expert)) &&
  //клиент
     ($val['client'] == $client || !isset($val['client']) || empty($client) || !isset($client)) &&
  //анкеты с пустыми полями
     (!isset($val['language']) == $clean_p || empty($clean_p) || !isset($clean_p))
    ) // Если соответствует двум параметрам сразу

         $docs_ids .=  $key.',';
 }
 // Удаляем в конце запятую
 $docs_ids = substr($docs_ids, 0, -1);

 // Пихаем в дитто и выводим!!!

return $docs_ids;
