<?php
/* @var $this ParamPoController */
/* @var $model ParamPo */

$this->breadcrumbs=array(
	'Param Pos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ParamPo', 'url'=>array('index')),
	array('label'=>'Create ParamPo', 'url'=>array('create')),
	array('label'=>'Update ParamPo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ParamPo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ParamPo', 'url'=>array('admin')),
);
?>

<h1>View ParamPo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'spek',
		'Deskripsi',
		'Tujuan',
	),
)); ?>
