<?php
/* @var $this PoDetailController */
/* @var $model PoDetail */

$this->breadcrumbs=array(
	'Po Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PoDetail', 'url'=>array('index')),
	array('label'=>'Create PoDetail', 'url'=>array('create')),
	array('label'=>'View PoDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PoDetail', 'url'=>array('admin')),
);
?>

<h1>Update PoDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>