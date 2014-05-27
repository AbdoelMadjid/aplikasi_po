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
		<?php //echo $form->labelEx($model,'id_po'); ?>
		<?php //echo $form->textField($model,'id_po'); ?>
		<?php //echo $form->error($model,'id_po'); ?>
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
          'dataProvider'=>$barang->search(),
          'filter'=>$barang,
          'columns'=>array(
                        	'key',
		'deskripsi',
		'unt',
		'grup',
                        array(
                          'header'=>'',
                          'type'=>'raw',

                          'value'=>'CHtml::Button("+", 
                                              array("name" => "send_pendaftar", 
                                                     "id" => "send_pendaftar", 
                                                     "onClick" => "$(\"#suplier_dialog\").dialog(\"close\");
                                                     $(\"#PoDetail_part_no\").val(\"$data->key\"); 
                                                     $(\"#PoDetail_brg\").val(\"$data->deskripsi\"); 
                                                     $(\"#PoDetail_satuan\").val(\"$data->unt\"); 
                                                     $(\"#PoDetail_harga\").val(\"$data->last_price\"); 
                                                     
													 
													 "))',
                                                   ),
                           ),
                                        ));

$this->endWidget('zii.widgets.jui.CJuiDialog');

        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'part_no'); ?>
		<?php echo $form->HiddenField($model,'part_no'); ?>
		<?php echo $form->textField($model,'brg',array('size'=>80,'maxlength'=>100)); ?>
		
		<?php 
            // the link that may open the dialog
/*
			echo CHtml::link('Cari Barang','#',  array(
   'onclick'=>'$("#suplier_dialog").dialog("open"); return false;',
    'class'=>'form-button'
));*/
            ?>
		<?php echo $form->error($model,'part_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jml_pesan'); ?>
		<?php echo $form->textField($model,'jml_pesan',array('readOnly'=>'readOnly')); ?>
		<?php echo $form->error($model,'jml_pesan'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'jml_terima'); ?>
		<?php echo $form->textField($model,'jml_terima'); ?>
		<?php echo $form->error($model,'jml_terima'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->