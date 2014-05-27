<?php
/* @var $this PoDetailController */
/* @var $model PoDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'po-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_po'); ?>
		<?php echo $form->textField($model,'id_po'); ?>
		<?php echo $form->error($model,'id_po'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'part_no'); ?>
		<?php echo $form->textField($model,'part_no'); ?>
		<?php echo $form->error($model,'part_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jml_pesan'); ?>
		<?php echo $form->textField($model,'jml_pesan'); ?>
		<?php echo $form->error($model,'jml_pesan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan'); ?>
		<?php echo $form->error($model,'satuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->