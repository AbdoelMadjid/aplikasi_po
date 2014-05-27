<?php
/* @var $this PoDetailController */
/* @var $model PoDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_po'); ?>
		<?php echo $form->textField($model,'id_po'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'part_no'); ?>
		<?php echo $form->textField($model,'part_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jml_pesan'); ?>
		<?php echo $form->textField($model,'jml_pesan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->