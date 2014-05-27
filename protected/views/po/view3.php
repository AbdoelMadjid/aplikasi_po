<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->nomor,
);

$this->menu=array(
	//array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Cetak Po', 'url'=>array('cetak', 'id'=>$model->nomor),'linkOptions'=>array('target'=>'_blank')),
	/*array('label'=>'Update Po', 'url'=>array('update', 'id'=>$model->nomor)),
	array('label'=>'Release Po', 'url'=>array('update2', 'id'=>$model->nomor)),
	array('label'=>'Delete Po', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nomor),'confirm'=>'Are you sure you want to delete this item?')),*/
	array('label'=>'Manage Po Approve ', 'url'=>array('rilis')),
);
?>

<h1>View Po #<?php echo $model->nomor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nomor',
		'tanggal',
		'tujuan',
		'catatan',
		'suplay',
		'no_dokumen',
	),
)); 

    /*echo CHtml::link("Tambah barang", 
                $this->createUrl('Po/tambahpraja',array('id_po'=>$model->nomor))) ;*/
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'po-detail-grid',
	'dataProvider'=>$podet->searchpo($model->nomor),
	'filter'=>$podet,
	'columns'=>array(
		'id',
		//'id_po',
		'part_no',
		'brg',
		'jml_pesan',
		'satuan',
		'diskon',
		'ppn',
		/*
		array(
		'name'=>'harga',
		'value'=>'number_format(harga)',
		),*/
//		'number_format(harga)',
		'hrg',
		/*
		array(
				'class'=>'CButtonColumn',
                'template'=>'{update}{delete}',
			'updateButtonUrl'=>'Yii::app()->createUrl("Po/updatepraja", 
                            array(		
                            "id"=>$data->id
                                ))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("Po/deletepraja", 
                            array(		
                            "id"=>$data->id
                                ))'
		),*/
	),
));

?>
