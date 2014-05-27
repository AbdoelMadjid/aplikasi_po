<?php
/* @var $this PoController */
/* @var $model Po */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'po-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_terima'); ?>
		<?php //echo $form->textField($model,'tanggal'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Po[tgl_terima]',
           'value' => $model->tgl_terima,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
                   'changeMonth' => 'true',
	            'changeYear' => 'true',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
		
		
		?>
		<?php echo $form->error($model,'tgl_terima'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'catat_terima'); ?>
		<?php echo $form->textField($model,'catat_terima',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'catat_terima'); ?>
	</div>

        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->