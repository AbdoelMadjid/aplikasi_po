<?php
/* @var $this BarangController */
/* @var $model Barang */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grup'); ?>
		<?php echo $form->textField($model,'grup',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'grup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subgrup'); ?>
		<?php echo $form->textField($model,'subgrup',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'subgrup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unt'); ?>
		<?php echo $form->textField($model,'unt',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'unt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_price'); ?>
		<?php echo $form->textField($model,'last_price'); ?>
		<?php echo $form->error($model,'last_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_part'); ?>
		<?php echo $form->textField($model,'no_part'); ?>
		<?php echo $form->error($model,'no_part'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->