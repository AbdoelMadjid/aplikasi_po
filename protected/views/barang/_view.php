<?php
/* @var $this BarangController */
/* @var $data Barang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('key')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->key), array('view', 'id'=>$data->key)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grup')); ?>:</b>
	<?php echo CHtml::encode($data->grup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subgrup')); ?>:</b>
	<?php echo CHtml::encode($data->subgrup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unt')); ?>:</b>
	<?php echo CHtml::encode($data->unt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_price')); ?>:</b>
	<?php echo CHtml::encode($data->last_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>