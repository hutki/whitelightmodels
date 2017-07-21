<?php
$s_id = (isset($_GET['s_id']))?$_GET['s_id']:'';
$services = (isset($_GET['services']))?$_GET['services']:'';
$gender = (isset($_GET['gender']))?$_GET['gender']:'';
$face = (isset($_GET['face']))?$_GET['face']:'';
$hair = (isset($_GET['hair']))?$_GET['hair']:'';
$l_hair = (isset($_GET['l_hair']))?$_GET['l_hair']:'';
$eyes = (isset($_GET['eyes']))?$_GET['eyes']:'';
$new = (isset($_GET['new']))?$_GET['new']:'';
$age1 = (isset($_GET['age1']))?$_GET['age1']:'';
$age2 = (isset($_GET['age2']))?$_GET['age2']:'';
$growth1 = (isset($_GET['growth1']))?$_GET['growth1']:'';
$growth2 = (isset($_GET['growth2']))?$_GET['growth2']:'';
$chest1 = (isset($_GET['chest1']))?$_GET['chest1']:'';
$chest2 = (isset($_GET['chest2']))?$_GET['chest2']:'';
$waist1 =(isset($_GET['waist1']))?$_GET['waist1']:'';
$waist2 = (isset($_GET['waist2']))?$_GET['waist2']:'';
$hip1 = (isset($_GET['hip1']))?$_GET['hip1']:'';
$hip2 = (isset($_GET['hip2']))?$_GET['hip2']:'';
$weight1 = (isset($_GET['weight1']))?$_GET['weight1']:'';
$weight2 = (isset($_GET['weight2']))?$_GET['weight2']:'';
$breast_size = (isset($_GET['breast_size']))?$_GET['breast_size']:'';
$clothing1 = (isset($_GET['clothing1']))?$_GET['clothing1']:'';
$clothing2 = (isset($_GET['clothing2']))?$_GET['clothing2']:'';
$shoes1 = (isset($_GET['shoes1']))?$_GET['shoes1']:'';
$shoes2 = (isset($_GET['shoes2']))?$_GET['shoes2']:'';
$work = (isset($_GET['work']))?$_GET['work']:'';
$abroad = (isset($_GET['abroad']))?$_GET['abroad']:'';
$city = (isset($_GET['city']))?$_GET['city']:'';
//полученную дату переводим в уникс - сбрасываем на 00.00
$date_cr1 = (isset($_GET['date_cr1']))?strtotime($_GET['date_cr1']):'';
$date_cr1 = (!empty($date_cr1))?strtotime("midnight", $date_cr1):'';
$date_cr2 = (isset($_GET['date_cr2']))?strtotime($_GET['date_cr2']):'';
$date_cr2 = (!empty($date_cr2))?strtotime("tomorrow", $date_cr2)-1:'';
$date_red1 = (isset($_GET['date_red1']))?strtotime($_GET['date_red1']):'';
$date_red1 = (!empty($date_red1))?strtotime("midnight", $date_red1):'';
$date_red2 = (isset($_GET['date_red2']))?strtotime($_GET['date_red2']):'';
$date_red2 = (!empty($date_red2))?strtotime("tomorrow", $date_red2)-1:'';
$language = (isset($_GET['language']))?$_GET['language']:'';
$expert =(isset($_GET['expert']))?$_GET['expert']:'';
$client = (isset($_GET['client']))?$_GET['client']:'';
$clean_p = (isset($_GET['clean_p']))?$_GET['clean_p']:'';

//----------------------------------------------------------------------------

$docs_array = array();

$sql = "SELECT tmplvarid,contentid,value FROM modx_site_tmplvar_contentvalues";

$result = $modx->query($sql);

// Подготавливаем данные
while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
  switch ($data['tmplvarid'])
  {
  case 35: // Id tv параметра 'Фио'
    $docs_array[$data['contentid']]['fio'] = $data['value'];
  break;
  case 6: // Id tv параметра 'Псевдоним'
    $docs_array[$data['contentid']]['name'] = $data['value'];
  break;
  case 24: // Id tv параметра 'услуги'
    $docs_array[$data['contentid']]['services'] = $data['value'];
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
  case 51: // Id tv параметра 'new'
    $docs_array[$data['contentid']]['new'] = $data['value'];
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
  case 10: // Id tv параметра 'Место проживания' 
    $docs_array[$data['contentid']]['city'] = $data['value'];
  break;
  case 15: // Id tv параметра 'language'
    $docs_array[$data['contentid']]['language'] = $data['value'];
  break;
  case 19: // Id tv параметра 'expert' 
    $docs_array[$data['contentid']]['expert'] = $data['value'];
  break;
  case 20: // Id tv параметра 'expert' 
    $docs_array[$data['contentid']]['client'] = $data['value'];
  break;
  case 16: // Id tv параметра 'контактный номер телефона' 
    $docs_array[$data['contentid']]['tel'] = $data['value'];
  break;

}
}

$sql = "SELECT createdon,editedon,id,parent FROM modx_site_content WHERE parent =2";

$result = $modx->query($sql);

while($data = $result->fetch(PDO::FETCH_ASSOC))
{
  $docs_array[$data['id']]['createdon'] = $data['createdon'];
  $docs_array[$data['id']]['editedon'] = $data['editedon'];
}


 // Теперь у нас каждый документ имеет полный набор tv параметров!!!!
 // [10] => Array ( [face] => 175 [gender] => 3 ) [16] => Array ( [face] => 175 [gender] => 3 )
 // где 10 и 16 id доукмента

 // Выполняем выборку в соответствии с фильтрами
    $docs_ids = '';
 foreach ($docs_array as $key => $val)
 {
 if (
  ((preg_match('/^(.)*'.$key.'(.)*$/uis',$s_id)) || (preg_match('/^(.)*'.$s_id.'(.)*$/uis', $val['name'])) || (preg_match('/^(.)*'.$s_id.'(.)*$/uis', $val['fio']))) &&
  //услуги

(((empty($services) && isset($_GET['sub'])) || (!empty($services) &&(preg_match('/^(.)*'.$services.'(.)*$/uis', $val['services']))))) &&
   //((!empty($services) && (preg_match('/^(.)*'.$services.'(.)*$/uis', $val['services'])))) &&
  //пол
  ($val['gender'] == $gender || !isset($val['gender']) || empty($gender) || !isset($gender)) &&
  //тип лица
  ($val['face'] == $face || !isset($val['face']) || empty($face) || !isset($face)) &&
  //цвет волос
 ($val['hair'] == $hair || !isset($val['hair']) || empty($hair) || !isset($hair)) &&
  //длина волос
  ($val['l_hair'] == $l_hair || !isset($val['l_hair']) || empty($l_hair) || !isset($l_hair)) &&
  //цвет глаз
  ($val['eyes'] == $eyes || !isset($val['eyes']) || empty($eyes) || !isset($eyes)) &&
 //Новые
  ($val['new'] == $new || empty($new) || !isset($new)) &&
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
  //Вес
  (((empty($weight1) || !isset($weight1)) && ($val['weight1'] >= 0 && $val['weight1'] <= $weight2)) ||
     ((empty($weight2) || !isset($weight2)) && $val['weight1'] >= $weight1)||
     ((empty($weight2) || !isset($weight2)) && (empty($weight1) || !isset($weight1)))||
     ($val['weight1'] >= $weight1 && $val['weight1'] <= $weight2)) &&
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
   //Город
   (trim($val['city']) == $city || !isset($val['city']) || empty($city) || !isset($city)) &&
   //дата создания
    (((empty($date_cr1) || !isset($date_cr1)) && ($val['createdon'] >= 0 && $val['createdon'] <= $date_cr2)) ||
   ((empty($date_cr2) || !isset($date_cr2)) && $val['createdon'] >= $date_cr1)||
   ((empty($date_cr2) || !isset($date_cr2)) && (empty($date_cr1) || !isset($date_cr1)))||
   ($val['createdon'] >= $date_cr1 && $val['createdon'] <= $date_cr2)) && 
     //дата редактирования
    (((empty($date_red1) || !isset($date_red1)) && ($val['editedon'] >= 0 && $val['editedon'] <= $date_red2)) ||
   ((empty($date_red2) || !isset($date_red2)) && $val['editedon'] >= $date_red1)||
   ((empty($date_red2) || !isset($date_red2)) && (empty($date_red1) || !isset($date_red1)))||
   ($val['editedon'] >= $date_red1 && $val['editedon'] <= $date_red2)) && 
   //языки
    ((preg_match('/^(.)*'.$language.'(.)*$/uis', $val['language'])) || empty($language) || !isset($language)) &&
  //эксперт
    ($val['expert'] == $expert || !isset($val['expert']) || empty($expert) || !isset($expert)) &&
  //клиент
    ($val['client'] == $client || !isset($val['client']) || empty($client) || !isset($client)) &&
  //анкеты с пустыми полями
    ((!isset($val['language']) || !isset($val['chest1']) || !isset($val['gender']) || !isset($val['face']) || !isset($val['hair']) || !isset($val['l_hair']) || !isset($val['eyes']) || !isset($val['age1']) || !isset($val['growth1']) || !isset($val['waist1']) || !isset($val['hip1']) || !isset($val['weight1']) || !isset($val['breast_size']) || !isset($val['clothing1']) || !isset($val['shoes1']) || !isset($val['work']) || !isset($val['abroad']) || !isset($val['expert']) || !isset($val['client'])) == $clean_p || empty($clean_p) || !isset($clean_p))
    ) // Если соответствует двум параметрам сразу
         $docs_ids .=  $key.',';
 }
 //Выводим только по id
 /*if (!empty($s_id)){
   $docs_ids .= $s_id.',';
 }
*/
 
 // Удаляем в конце запятую
 $docs_ids = substr($docs_ids, 0, -1);

/*echo "<pre>";
var_dump($date_cr1);
echo "</pre>";*/

return $docs_ids;