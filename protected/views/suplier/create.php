<?php
/* @var $this SuplierController */
/* @var $model Suplier */

$this->breadcrumbs=array(
	'Supliers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suplier', 'url'=>array('index')),
	array('label'=>'Manage Suplier', 'url'=>array('admin')),
);
?>

<h1>Create Suplier</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>