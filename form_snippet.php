<?php
// Начальное значение
$services_options = '';
$face_options = '';
$hair_options = '';
$l_hair_options = '';
$eyes_options = '';
$breast_size_options = '';
$work_options = '';
$language_options = '';
$abroad_options = '';
$face_class = '';
$hair_class = '';
$l_hair_class = '';
$eyes_class = '';
$breast_size_class = '';
$work_class = '';
$language_class = '';
$abroad_class = '';
// Получаем значения с GET
$get_gender = (isset($_GET['gender']))?$_GET['gender']:'';
$s_id = (isset($_GET[s_id]))?$_GET[s_id]:'';
$get_services = (isset($_GET['services']))?$_GET['services']:'';
$services_class = (!empty($get_services))?"select_active":'';
$get_face = (isset($_GET['face']))?$_GET['face']:'';
$face_class = (!empty($get_face))?"select_active":'';
$get_hair = (isset($_GET['hair']))?$_GET['hair']:'';
$hair_class = (!empty($get_hair))?"select_active":'';
$get_l_hair = (isset($_GET['l_hair']))?$_GET['l_hair']:'';
$l_hair_class =(!empty($get_l_hair))?"select_active":'';
$get_eyes = (isset($_GET['eyes']))?$_GET['eyes']:'';
$eyes_class = (!empty($get_eyes))?"select_active":'';
$get_age1 = (isset($_GET['age1']))?$_GET['age1']:'';
$get_age2 = (isset($_GET['age2']))?$_GET['age2']:'';
$get_growth1 = (isset($_GET['growth1']))?$_GET['growth1']:'';
$get_growth2 = (isset($_GET['growth2']))?$_GET['growth2']:'';
$get_chest1 = (isset($_GET['chest1']))?$_GET['chest1']:'';
$get_chest2 = (isset($_GET['chest2']))?$_GET['chest2']:'';
$get_waist1 = (isset($_GET['waist1']))?$_GET['waist1']:'';
$get_waist2 = (isset($_GET['waist2']))?$_GET['waist2']:'';
$get_hip1 = (isset($_GET['hip1']))?$_GET['hip1']:'';
$get_hip2 = (isset($_GET['hip2']))?$_GET['hip2']:'';
$get_weight1 = (isset($_GET['weight1']))?$_GET['weight1']:'';
$get_weight2 = (isset($_GET['weight2']))?$_GET['weight2']:'';
$get_breast_size = (isset($_GET['breast_size']))?$_GET['breast_size']:'';
$breast_size_class = (!empty($get_breast_size))?"select_active":'';
$get_clothing1 = (isset($_GET['clothing1']))?$_GET['clothing1']:'';
$get_clothing2 = (isset($_GET['clothing2']))?$_GET['clothing2']:'';
$get_shoes1 = (isset($_GET['shoes1']))?$_GET['shoes1']:'';
$get_shoes2 = (isset($_GET['shoes2']))?$_GET['shoes2']:'';
$get_work = (isset($_GET['work']))?$_GET['work']:'';
$work_class = (!empty($get_work))?"select_active":'';
$get_language = (isset($_GET['language']))?$_GET['language']:'';
$language_class = (!empty($get_language))?"select_active":'';
$get_abroad = (isset($_GET['abroad']))?$_GET['abroad']:'';
$abroad_class = (!empty($get_abroad))?"select_active":'';
$get_expert = (isset($_GET['expert']))?$_GET['expert']:'';
$get_client = (isset($_GET['client']))?$_GET['client']:'';

// Формируем данные вывода

$tv_array = array();
$sql = "SELECT id,name,elements FROM modx_site_tmplvars";
$result = $modx->query($sql);

while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['id'])
{
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
$tv_array['face'][$data['name']] = $data['elements'];
break;
;
case 31: //Цвет волос
$tv_array['hair'][$data['name']] = $data['elements'];
break;
case 32: //Цвет волос
$tv_array['l_hair'][$data['name']] = $data['elements'];
break;
case 33: //Цвет глаз
$tv_array['eyes'][$data['name']] = $data['elements'];
break;
case 11: //Размер груди
$tv_array['breast_size'][$data['name']] = $data['elements'];
break;
case 14: //Опыт работы
$tv_array['work'][$data['name']] = $data['elements'];
break;
case 15: //Знание языков
$tv_array['language'][$data['name']] = $data['elements'];
break;
case 18: //Знание языков
$tv_array['abroad'][$data['name']] = $data['elements'];
break;
}
}

//параметры бюста вручную, т.к. в анкете вводятся цифрами
$breast_size_array = array( array('option' => '', 'val' => $tv_array['breast_size']),
            array('option' => '0', 'val' => '0'),
            array('option' => '0,5', 'val' => '0,5'),
            array('option' => '1', 'val' => '1'),
            array('option' => '1,5', 'val' => '1,5'),
            array('option' => '2', 'val' => '2'),
            array('option' => '2,5', 'val' => '2,5'),
            array('option' => '3', 'val' => '3'),
            array('option' => '3,5', 'val' => '3,5'),
            array('option' => '4', 'val' => '4'),
            array('option' => '4,5', 'val' => '4,5'),
            array('option' => '5', 'val' => '5'),
            array('option' => '5,5', 'val' => '5,5'),
            array('option' => 'больше 5', 'val' => 'больше 5'));
$abroad_array = array(  array('option' => '', 'val' => 'Готовность работать за границей'),
            array('option' => 'Готова к работе за рубежом', 'val' => 'Готова к работе за рубежом'),
            array('option' => 'Не готова к работе за рубежом', 'val' => 'Не готова к работе за рубежом'));
// Формируем разметку для селектов

$services = $modx->getCollection('modResource',array('parent'=>4));
/*$i  = 1;
foreach($services as $key){
($i == 1)?$services_options .= '<option value="" '.(('' == $get_services)?'selected':'').'>Вид работы</option>':$services_options .= '<option value="'.$key->get('pagetitle').'" '.(($key->get('pagetitle') == $get_services)?'selected':'').'>'.$key->get('pagetitle').'</option>';
$i++;

}*/
$i  = 1;
foreach($services as $key){
($i == 1)?$services_options .= '<option value="" '.(('' == $get_services)?'selected':'').'>Вид работы</option>':$services_options .= '<option value="'.$key->get('pagetitle').'" '.(($key->get('pagetitle') == $get_services)?'selected':'').'>'.$key->get('pagetitle').'</option>';
$i++;

}

/*foreach ($tv_array['services'] as $key=> $value)$services_array .= $key."||" .$value;
	$services_array =  explode(",", str_replace("||", ",", $services_array));
$i  = 1;
foreach ($services_array as $val)
{
($i == 1)?$services_options .= '<option value="" '.(('' == $get_services)?'selected':'').'>'.$val.'</option>':$services_options .= '<option value="'.$val.'" '.(($val == $get_services)?'selected':'').'>'.$val.'</option>';
$i++;
}
*/
foreach ($tv_array['face'] as $key=> $value)$face_array .= $key."||" .$value;
	$face_array =  explode(",", str_replace("||", ",", $face_array));
$i  = 1;
foreach ($face_array as $val)
{
($i == 1)?$face_options .= '<option value="" '.(('' == $get_face)?'selected':'').'>'.$val.'</option>':$face_options .= '<option value="'.$val.'" '.(($val == $get_face)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($tv_array['hair'] as $key=> $value)$hair_array .= $key."||" .$value;
	$hair_array =  explode(",", str_replace("||", ",", $hair_array));
$i  = 1;
foreach ($hair_array as $val)
{
($i == 1)?$hair_options .= '<option value="" '.(('' == $get_hair)?'selected':'').'>'.$val.'</option>':$hair_options .= '<option value="'.$val.'" '.(($val == $get_hair)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($tv_array['l_hair'] as $key=> $value)$l_hair_array .= $key."||" .$value;
	$l_hair_array =  explode(",", str_replace("||", ",", $l_hair_array));
$i  = 1;
foreach ($l_hair_array as $val)
{
($i == 1)?$l_hair_options .= '<option value="" '.(('' == $get_l_hair)?'selected':'').'>'.$val.'</option>':$l_hair_options .= '<option value="'.$val.'" '.(($val == $get_l_hair)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($tv_array['eyes'] as $key=> $value)$eyes_array .= $key."||" .$value;
	$eyes_array =  explode(",", str_replace("||", ",", $eyes_array));
$i  = 1;
foreach ($eyes_array as $val)
{
($i == 1)?$eyes_options .= '<option value="" '.(('' == $get_eyes)?'selected':'').'>'.$val.'</option>':$eyes_options .= '<option value="'.$val.'" '.(($val == $get_eyes)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($breast_size_array as $val)
	$breast_size_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_breast_size)?'selected':'').'>'.$val['val'].'</option>';
foreach ($tv_array['work'] as $key=> $value)$work_array .= $key."||" .$value;
	$work_array =  explode(",", str_replace("||", ",", $work_array));
$i  = 1;
foreach ($work_array as $val)
{
($i == 1)?$work_options .= '<option value="" '.(('' == $get_work)?'selected':'').'>'.$val.'</option>':$work_options .= '<option value="'.$val.'" '.(($val == $get_work)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($tv_array['language'] as $key=> $value)$language_array .= $key."||" .$value;
	$language_array =  explode(",", str_replace("||", ",", $language_array));
$i  = 1;
foreach ($language_array as $val)
{
($i == 1)?$language_options .= '<option value="" '.(('' == $get_language)?'selected':'').'>'.$val.'</option>':$language_options .= '<option value="'.$val.'" '.(($val == $get_language)?'selected':'').'>'.$val.'</option>';
$i++;
}
foreach ($abroad_array as $val)
	$abroad_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_abroad)?'selected':'').'>'.$val['val'].'</option>';
// формируем форму
$result = '<div class="l_block">
<form action="" method="get" name="model">
<div class="block_inp">
	<div class="range_inp search" style="left: 270px;top: -50px;width: 869px;background: #dadada;height: 40px;">
		<input type="text" name="s_id" style="width: 710px;padding: 10px;margin: 7px;font-size:17px;" value="'.$s_id .'" placeholder="Введите ФИО, НИК, или ID анкеты">
		<button id="search" type="submit" name="sub">&#171;  Найти</button>
	</div>

</div>

<select class="f_select '.$services_class.'" name="services">
	'.$services_options.'
</select>
<div class="gender_block">
<span  class="gender '.(('Муж' == $get_gender)?'active_gender':'').'">
	<label  class="myRadio"  for="men">Мужчина</label>
	<input type="radio" name="gender" id="men" class="myRadio" value="Муж" '.(('Муж' == $get_gender)?'checked':'').'>
</span>
	<span></span>
	<span class="gender '.(('Жен' == $get_gender)?'active_gender':'').'">
	<label  class="myRadio" for="women">Женщина</label>
	<input type="radio"  name="gender" id="women" class="myRadio" value="Жен" '.(('Жен' == $get_gender)?'checked':'').'>
	</span>
</div>
<select class="f_select '.$face_class.'" name="face">
	'.$face_options.'
</select>
<select class="f_select '.$hair_class.'" name="hair">
	'.$hair_options.'
</select>
<select class="f_select '.$l_hair_class.'" name="l_hair">
	'.$l_hair_options.'
</select>
<select class="f_select '.$eyes_class.'" name="eyes">
	'.$eyes_options.'
</select>
<div class="block_inp">
	<span style="width:70px;line-height: 0.75;">'.$tv_array['age'].':</span>
	<div class="range_inp">
		<input name="age1" type="number" min="1" value="'.$get_age1.'" placeholder="от"> - 
		<input name="age2" type="number" min="1" value="'.$get_age2.'" placeholder="до">
	</div>
</div>
<div class="block_inp">
	<span>'.$tv_array['growth'].':</span>
	<div class="range_inp">
		<input name="growth1" type="number" min="1" value="'.$get_growth1.'" placeholder="от"> - 
		<input name="growth2" type="number" min="1" value="'.$get_growth2.'"placeholder="до">
	</div>
</div>
<div class="block_inp">
	<span>'.$tv_array['chest'].':</span>
	<div class="range_inp">
		<input name="chest1" type="number" min="1" value="'.$get_chest1.'" placeholder="от"> - 
		<input name="chest2" type="number" min="1" value="'.$get_chest2.'" placeholder="до">
	</div>
</div>
<div class="block_inp">
	<span>'.$tv_array['waist'].':</span>
	<div class="range_inp">
		<input name="waist1" type="number" min="1" value="'.$get_waist1.'" placeholder="от"> - 
		<input name="waist2" type="number" min="1" value="'.$get_waist2.'" placeholder="до">
	</div>
</div>
<div class="block_inp">
	<span>'.$tv_array['hip'].':</span>
	<div class="range_inp">
		<input name="hip1" type="number" min="1" value="'.$get_hip1.'" placeholder="от"> - 
		<input name="hip2" type="number" min="1" value="'.$get_hip2.'" placeholder="до">
	</div>
</div>
<div class="block_inp">
	<span>'.$tv_array['weight'].':</span>
	<div class="range_inp">
		<input name="weight1" type="number" min="1" value="'.$get_weight1.'" placeholder="от"> - 
		<input name="weight2" type="number" min="1" value="'.$get_weight2.'" placeholder="до">
	</div>
</div>
<select class="f_select '.$breast_size_class.'" name="breast_size">
	'.$breast_size_options.'
</select>
<div class="block_inp dress">
	<span>'.$tv_array['clothing'].':</span>
	<div class="range_inp">
		<input name="clothing1" type="number" min="1" value="'.$get_clothing1.'" placeholder="от"> - 
		<input name="clothing2" type="number" min="1" value="'.$get_clothing2.'" placeholder="до">
	</div>
</div>
<div class="block_inp dress">
	<span>'.$tv_array['shoes'].':</span>
	<div class="range_inp">
		<input name="shoes1" type="number"  min="1" value="'.$get_shoes1.'" placeholder="от"> - 
		<input name="shoes2" type="number"  min="1" value="'.$get_shoes2.'" placeholder="до">
	</div>
</div>
<select class="f_select '.$work_class.'" name="work">
	'.$work_options.'
</select>
<select class="f_select '.$language_class.'" name="language">
	'.$language_options.'
</select>
<select class="f_select '.$abroad_class.'" name="abroad">
	'.$abroad_options.'
</select>
<div class="dop_opt">
	<div class="clean_inp">
		<input  type="radio" name="clean_p" id="clean_p" value="пустые_поля"><label for="clean_p">Анкеты с пустыми<br>(незаполненными) полями</label>
	</div>
	<div class="exp_inp">
		<span>'.$tv_array['expert'].':</span>
		<div class="range_inp">
			<input name="expert" type="number"  min="1" max="10" value="'.$get_expert.'" placeholder="1 - 10">
		</div>
	</div>
	<div class="exp_inp">
		<span>'.$tv_array['client'].':</span>
		<div class="range_inp">
			<input name="client" type="number" min="1" max="10" value="'.$get_client.'" placeholder="1 - 10">
		</div>
	</div>
</div>
<div class="butt_block">
	<button id="pokazat" type="submit" name="sub">Показать</button>
	<a href="[[~30]]" id="reset">Очистить все поля</a>
</div>
</form>
</div>';

print $result;
