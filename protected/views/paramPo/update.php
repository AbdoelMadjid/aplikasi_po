<?php
/* @var $this ParamPoController */
/* @var $model ParamPo */

$this->breadcrumbs=array(
	'Param Pos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ParamPo', 'url'=>array('index')),
	array('label'=>'Create ParamPo', 'url'=>array('create')),
	array('label'=>'View ParamPo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ParamPo', 'url'=>array('admin')),
);
?>

<h1>Update ParamPo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>