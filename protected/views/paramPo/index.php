<?php
/* @var $this ParamPoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Param Pos',
);

$this->menu=array(
	array('label'=>'Create ParamPo', 'url'=>array('create')),
	array('label'=>'Manage ParamPo', 'url'=>array('admin')),
);
?>

<h1>Param Pos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
