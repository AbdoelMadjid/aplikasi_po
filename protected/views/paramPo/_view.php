<?php
/* @var $this ParamPoController */
/* @var $data ParamPo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spek')); ?>:</b>
	<?php echo CHtml::encode($data->spek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->Deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->Tujuan); ?>
	<br />


</div>