<?php
/* @var $this ParamPoController */
/* @var $model ParamPo */

$this->breadcrumbs=array(
	'Param Pos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ParamPo', 'url'=>array('index')),
	array('label'=>'Manage ParamPo', 'url'=>array('admin')),
);
?>

<h1>Create ParamPo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>