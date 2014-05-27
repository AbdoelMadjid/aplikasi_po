<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->nomor,
);

$this->menu=array(
	array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Create Po', 'url'=>array('create')),
	array('label'=>'Update Po', 'url'=>array('update', 'id'=>$model->nomor)),
	array('label'=>'Delete Po', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nomor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Po', 'url'=>array('admin')),
);
?>

<h1>View Po #<?php echo $model->nomor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nomor',
		'tanggal',
		'tujuan',
		'catatan',
		'suplay',
	),
)); 


?>
