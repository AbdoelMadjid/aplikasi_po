<?php
/* @var $this PoDetailController */
/* @var $model PoDetail */

$this->breadcrumbs=array(
	'Po Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PoDetail', 'url'=>array('index')),
	array('label'=>'Create PoDetail', 'url'=>array('create')),
	array('label'=>'Update PoDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PoDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PoDetail', 'url'=>array('admin')),
);
?>

<h1>View PoDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_po',
		'part_no',
		'jml_pesan',
		'satuan',
		'harga',
	),
)); ?>
