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
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php //echo $form->textField($model,'tanggal'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Po[tanggal]',
           'value' => $model->tanggal,
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
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tujuan'); ?>
		<?php //echo $form->textField($model,'tujuan',array('size'=>60,'maxlength'=>255)); 
		//$prpo1=Suplier::model()->findAll();
		$prpo1=paramPO::model()->findAll();
		echo $form->dropDownList($model,'tujuan',  CHtml::listData($prpo1,'id','spek'),array('prompt'=>'Silahkan Pilih'));
		//echo $form->dropDownList($model,'tujuan',  CHtml::listData($prpo1,'deskripsi','spek'),array('prompt'=>'Silahkan Pilih'));
		
		?>
		<?php echo $form->error($model,'tujuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'catatan'); ?>
		<?php echo $form->textField($model,'catatan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'catatan'); ?>
	</div>
   <?php 
        
  $this->beginWidget('zii.widgets.jui.CJuiDialog', 
       array(   'id'=>'suplier_dialog',
                // additional javascript options for the dialog plugin
                'options'=>array(
                                'title'=>'List Suplier',
                                'width'=>'auto',
                                'autoOpen'=>false,
                                'modal'=>false
                                ),
                        ));
/*  */
//$suplay=Suplier::model()->findAll();
$this->widget('zii.widgets.grid.CGridView', 
   array( 'id'=>'suplay-grid',
          'dataProvider'=>$suplier->search(),
          'filter'=>$suplier,
          'columns'=>array(
                        	'id',
		'nama',
		'telp',
		'alamat',
		'forex',
                        array(
                          'header'=>'',
                          'type'=>'raw',

                          'value'=>'CHtml::Button("+", 
                                              array("name" => "send_pendaftar", 
                                                     "id" => "send_pendaftar", 
                                                     "onClick" => "$(\"#suplier_dialog\").dialog(\"close\");
                                                     $(\"#Po_id_sup\").val(\"$data->id\"); 
                                                     $(\"#Po_suplay\").val(\"$data->nama\"); 
                                                     
													 
													 "))',
                                                   ),
                           ),
                                        ));

$this->endWidget('zii.widgets.jui.CJuiDialog');

        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_sup'); ?>
		<?php echo $form->HiddenField($model,'id_sup'); ?>
		<?php echo $form->textField($model,'suplay',array('size'=>60,'maxlength'=>100)); ?>
		 <?php 
            // the link that may open the dialog
echo CHtml::link('Cari Suplier','#',  array(
   'onclick'=>'$("#suplier_dialog").dialog("open"); return false;',
    'class'=>'form-button'
));
            ?>
		<?php echo $form->error($model,'id_sup'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->