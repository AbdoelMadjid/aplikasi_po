<?php
/* @var $this PoDetailController */
/* @var $model PoDetail */
/*
$this->breadcrumbs=array(
	'Po Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PoDetail', 'url'=>array('index')),
	array('label'=>'Manage PoDetail', 'url'=>array('admin')),
);*/
?>

<h1>Update Penerimaan Detail</h1>

<?php $this->renderPartial('_formdetail2', array('model'=>$model,'barang'=>$barang)); ?>