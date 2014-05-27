<?php
/* @var $this PoDetailController */
/* @var $data PoDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po')); ?>:</b>
	<?php echo CHtml::encode($data->id_po); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('part_no')); ?>:</b>
	<?php echo CHtml::encode($data->part_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jml_pesan')); ?>:</b>
	<?php echo CHtml::encode($data->jml_pesan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>