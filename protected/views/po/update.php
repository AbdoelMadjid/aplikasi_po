<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->nomor=>array('view','id'=>$model->nomor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Create Po', 'url'=>array('create')),
	array('label'=>'View Po', 'url'=>array('view', 'id'=>$model->nomor)),
	array('label'=>'Manage Po', 'url'=>array('admin')),
);
?>

<h1>Update Po <?php echo $model->nomor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'suplier'=>$suplier)); ?>