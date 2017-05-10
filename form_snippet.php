<?php
// Начальное значение

$face_options = '';
$hair_options = '';
$l_hair_options = '';
$eyes_array_options = '';
$breast_size_array_options = '';
$work_array_options = '';
$language_array_options = '';
$abroad_array_options = '';
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

if($get_gender == 'Муж')
	$id_gender = 'active_gender_man';
if($get_gender == 'Жен')
	$id_gender1 = 'active_gender_woman';



$get_face = (isset($_GET['face']))?$_GET['face']:'';
if(!empty($get_face))
$face_class = "select_active";
$get_hair = (isset($_GET['hair']))?$_GET['hair']:'';
if(!empty($get_hair))
$hair_class = "select_active";
$get_l_hair = (isset($_GET['l_hair']))?$_GET['l_hair']:'';
if(!empty($get_l_hair))
$l_hair_class = "select_active";
$get_eyes = (isset($_GET['eyes']))?$_GET['eyes']:'';
if(!empty($get_eyes))
$eyes_class = "select_active";
$get_age1 = (isset($_GET['age1']))?$_GET['age1']:'';
$get_growth1 = (isset($_GET['growth1']))?$_GET['growth1']:'';
$get_growth2 = (isset($_GET['growth2']))?$_GET['growth2']:'';
$get_chest1 = (isset($_GET['chest1']))?$_GET['chest1']:'';
$get_chest2 = (isset($_GET['chest2']))?$_GET['chest2']:'';
$get_waist1 = (isset($_GET['waist1']))?$_GET['waist1']:'';
$get_waist2 = (isset($_GET['waist2']))?$_GET['waist2']:'';
$get_hip1 = (isset($_GET['hip1']))?$_GET['hip1']:'';
$get_hip2 = (isset($_GET['hip2']))?$_GET['hip2']:'';
$get_breast_size = (isset($_GET['breast_size']))?$_GET['breast_size']:'';
if(!empty($get_breast_size))
$breast_size_class = "select_active";
$get_clothing1 = (isset($_GET['clothing1']))?$_GET['clothing1']:'';
$get_clothing2 = (isset($_GET['clothing2']))?$_GET['clothing2']:'';
$get_shoes1 = (isset($_GET['shoes1']))?$_GET['shoes1']:'';
$get_shoes2 = (isset($_GET['shoes2']))?$_GET['shoes2']:'';
$get_work = (isset($_GET['work']))?$_GET['work']:'';
if(!empty($get_work))
$work_class = "select_active";
$get_language = (isset($_GET['language']))?$_GET['language']:'';
if(!empty($get_language))
$language_class = "select_active";
$get_abroad = (isset($_GET['abroad']))?$_GET['abroad']:'';
if(!empty($get_abroad))
$abroad_class = "select_active";
$get_expert = (isset($_GET['expert']))?$_GET['expert']:'';
$get_client = (isset($_GET['client']))?$_GET['client']:'';



// Формируем данные вывода


$face_array = array(	array('option' => '', 'val' => 'Тип лица'),
						array('option' => 'европейская', 'val' => 'европейский'),
						array('option' => 'азиатская', 'val' => 'азиатский'),
						array('option' => 'мулат', 'val' => 'мулат'),
						array('option' => 'афро', 'val' => 'африканский'),
						array('option' => 'метис', 'val' => 'метис'));
$hair_array = array(	array('option' => '', 'val' => 'Цвет волос'),
						array('option' => 'Блондин(ка)', 'val' => 'светлый'),
						array('option' => 'русый', 'val' => 'русый'),
						array('option' => 'Рыжий(ая)', 'val' => 'рыжий'),
						array('option' => 'Шатен(ка)', 'val' => 'каштановый'),
						array('option' => 'Брюнет(ка)', 'val' => 'черный'));
$l_hair_array = array(	array('option' => '', 'val' => 'Длина волос'),
						array('option' => 'Длиные', 'val' => 'длинные'),
						array('option' => 'Средние', 'val' => 'средние'),
						array('option' => 'Короткие', 'val' => 'короткие'),
						array('option' => 'Шатен(ка)', 'val' => 'каштановый'),
						array('option' => 'Без волос', 'val' => 'отсутствуют'));

$eyes_array = array(	array('option' => '', 'val' => 'Цвет глаз'),
						array('option' => 'Карие', 'val' => 'карие'),
						array('option' => 'Зеленые', 'val' => 'зеленые'),
						array('option' => 'Голубые', 'val' => 'голубые'),
						array('option' => 'Серые', 'val' => 'серые'));

$breast_size_array = array(	array('option' => '', 'val' => 'Размер груди'),
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

$work_array = array(	array('option' => '', 'val' => 'Опыт работы'),
						array('option' => 'менее года', 'val' => 'без опыта'),
						array('option' => '1-3 года', 'val' => 'небольшой'),
						array('option' => 'более 3-х лет', 'val' => 'большой'));
				

$language_array = array(	array('option' => '', 'val' => 'Знание языков'),
						array('option' => 'английский', 'val' => 'английский'),
						array('option' => 'немецкий', 'val' => 'немецкий'),
						array('option' => 'французский', 'val' => 'французский'),
						array('option' => 'итальянский', 'val' => 'итальянский'),
						array('option' => 'испанский', 'val' => 'испанский'),
						array('option' => 'китайский', 'val' => 'китайский'),
						array('option' => 'японский', 'val' => 'японский'));

$abroad_array = array(	array('option' => '', 'val' => 'Готовность работать за границей'),
						array('option' => 'Готова к работе за рубежом', 'val' => 'да'),
						array('option' => 'Не готова к работе за рубежом', 'val' => 'нет'));



// Формируем разметку для селекта face
foreach ($face_array as $val)
	$face_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_face)?'selected':'').'>'.$val['val'].'</option>';
foreach ($hair_array as $val)
	$hair_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_hair)?'selected':'').'>'.$val['val'].'</option>';
foreach ($l_hair_array as $val)
	$l_hair_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_l_hair)?'selected':'').'>'.$val['val'].'</option>';
foreach ($eyes_array as $val)
	$eyes_array_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_eyes)?'selected':'').'>'.$val['val'].'</option>';
foreach ($breast_size_array as $val)
	$breast_size_array_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_breast_size)?'selected':'').'>'.$val['val'].'</option>';
foreach ($work_array as $val)
	$work_array_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_work)?'selected':'').'>'.$val['val'].'</option>';
foreach ($language_array as $val)
	$language_array_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_language)?'selected':'').'>'.$val['val'].'</option>';
foreach ($abroad_array as $val)
	$abroad_array_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $get_abroad)?'selected':'').'>'.$val['val'].'</option>';
// формируем форму


$result = '<div class="l_block">
<form action="" method="get" name="model">
<select name="services" class="f_select">
	<option>Вид работы</option>
	<option value="услуги">наши услуги</option>
</select>
<div class="gender_block">
	<label class="gender_man '.$id_gender.'" for="men"><input type="radio" name="gender" id="men" value="Муж">Мужчина</label><span></span>
	<label class="gender_woman '.$id_gender1.'" for="women"><input type="radio"   name="gender" id="women" value="Жен">Женщина</label>
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
	'.$eyes_array_options.'
</select>
<div class="block_inp">
	<span>Возраст: </span>
	<div class="range_inp">
		<input name="age1" type="number" placeholder="от '.$get_age1.'"> - 
		<input name="age2" type="number" placeholder="до  '.$get_age2.'">
	</div>
</div>
<div class="block_inp">
	<span>Рост: </span>
	<div class="range_inp">
		<input name="growth1" type="number" placeholder="от '.$get_growth1.'"> - 
		<input name="growth2" type="number" placeholder="до  '.$get_growth2.'">
	</div>
</div>
<div class="block_inp">
	<span>Грудь: </span>
	<div class="range_inp">
		<input name="chest1" type="number" placeholder="от '.$get_chest1.'"> - 
		<input name="chest2" type="number" placeholder="до '.$get_chest1.'">
	</div>
</div>
<div class="block_inp">
	<span>Талия: </span>
	<div class="range_inp">
		<input name="waist1" type="number" placeholder="от '.$get_waist1.'"> - 
		<input name="waist2" type="number" placeholder="до '.$get_waist1.'">
	</div>
</div>
<div class="block_inp">
	<span>Бедра: </span>
	<div class="range_inp">
		<input name="hip1" type="number" placeholder="от  '.$get_hip1.'"> - 
		<input name="hip2" type="number" placeholder="до  '.$get_hip2.'">
	</div>
</div>
<div class="block_inp">
	<span>Вес: </span>
	<div class="range_inp">
		<input name="weight1" type="number" placeholder="от"> - 
		<input name="weight2" type="number" placeholder="до">
	</div>
</div>
<select class="f_select '.$breast_size_class.'" name="breast_size">
	'.$breast_size_array_options.'
</select>
<div class="block_inp dress">
	<span>Размер одежды: </span>
	<div class="range_inp">
		<input name="clothing1" type="number" placeholder="от '.$get_clothing1.'"> - 
		<input name="clothing2" type="number" placeholder="до '.$get_clothing1.'">
	</div>
</div>
<div class="block_inp dress">
	<span>Размер обуви: </span>
	<div class="range_inp">
		<input name="shoes1" type="number" placeholder="от '.$get_shoes1.'"> - 
		<input name="shoes2" type="number" placeholder="до '.$get_shoes2.'">
	</div>
</div>
<select class="f_select '.$work_class.'" name="work">
	'.$work_array_options.'
</select>
<select class="f_select '.$language_class.'" name="language">
	'.$language_array_options.'
</select>
<select class="f_select '.$abroad_class.'" name="abroad">
	'.$abroad_array_options.'
</select>
<div class="dop_opt">
	<div class="clean_inp">
		<input  type="radio" name="clean_p" id="clean_p" value="пустые_поля"><label for="clean_p">Анкеты с пустыми<br>(незаполненными) полями</label>
	</div>
	<div class="exp_inp">
		<span>Выбор по рейтингу эксперта: </span>
		<div class="range_inp">
			<input name="expert" type="text" placeholder="1 - 10 '.$get_expert.'">
		</div>
	</div>
	<div class="exp_inp">
		<span>Выбор по рейтингу клиента: </span>
		<div class="range_inp">
			<input name="client" type="text" placeholder="1 - 10 '.$get_client.'">
		</div>
	</div>
</div>
<div class="butt_block">
	<button id="pokazat" type="submit">Показать</button>
	<a href="[[~30]]" id="reset">Очистить все поля</a>


</div>

</form>
</div>';

print $result;
