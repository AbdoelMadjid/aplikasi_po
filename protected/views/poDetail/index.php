<?php
/* @var $this PoDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Po Details',
);

$this->menu=array(
	array('label'=>'Create PoDetail', 'url'=>array('create')),
	array('label'=>'Manage PoDetail', 'url'=>array('admin')),
);
?>

<h1>Po Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
