<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->nomor=>array('view','id'=>$model->nomor),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Po', 'url'=>array('index')),
	//array('label'=>'Create Po', 'url'=>array('create')),
	array('label'=>'View Penerimaan', 'url'=>array('view4', 'id'=>$model->nomor)),
	array('label'=>'Manage Penerimaan', 'url'=>array('terimapo')),
);
?>

<h1>Update Po <?php echo $model->nomor; ?></h1>

<?php $this->renderPartial('_formterima', array('model'=>$model,'suplier'=>$suplier)); ?>