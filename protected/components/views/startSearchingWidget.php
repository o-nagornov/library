<?php

	$types[""] = "";
	$types += CHtml::listData(Type::model()->findAll(), 'id_type', 'type');
	
echo CHtml::beginForm(CHtml::normalizeUrl(array('/book/index')), 'get', array('id'=>'filter-form'))
    ."<br>Название".CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title'))
	."<br>Авторы".CHtml::textField('authors', (isset($_GET['authors'])) ? $_GET['authors'] : '', array('id'=>'authors'))
	."<br>Ключевые слова".CHtml::textField('keywords', (isset($_GET['keywords'])) ? $_GET['keywords'] : '', array('id'=>'keywords'))
	."<br>Тип".CHtml::dropDownList('type', (isset($_GET['type'])) ? $_GET['type'] : '', $types, array('id'=>'type'))
	."<br>Описание".CHtml::textField('description', (isset($_GET['description'])) ? $_GET['description'] : '', array('id'=>'description'))
	."<br>Год".CHtml::textField('year', (isset($_GET['year'])) ? $_GET['year'] : '', array('id'=>'year'))
    ."<br>".CHtml::submitButton('Search', array('name'=>''))
    .CHtml::endForm();

?>