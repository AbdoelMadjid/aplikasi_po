<?php
/* @var $this PoController */
/* @var $model Po */

$this->breadcrumbs=array(
	'Pos'=>array('index'),
	$model->nomor,
);

$this->menu=array(
	//array('label'=>'List Po', 'url'=>array('index')),
	array('label'=>'Cetak Penerimaan', 'url'=>array('cetakterima', 'id'=>$model->nomor),'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Cetak Penerimaan Matrix', 'url'=>array('cetakterimadot', 'id'=>$model->nomor),'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Update Penerimaan', 'url'=>array('updateterima', 'id'=>$model->nomor)),
	array('label'=>'Release Penerimaan Po', 'url'=>array('update21', 'id'=>$model->nomor)),
	//array('label'=>'Delete Po', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nomor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penerimaan PO ', 'url'=>array('terimapo')),
);
?>

<h1>View Po #<?php echo $model->nomor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nomor',
		'tgl_terima',
		'no_terima',
		//'tujuan',
		'catat_terima',
		'suplay',
		'tanggal',
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
		'jml_terima',
		'satuan',
//		'diskon',
//		'ppn',
		/*
		array(
		'name'=>'harga',
		'value'=>'number_format(harga)',
		),*/
//		'number_format(harga)',
		'hrg',
		
		array(
				'class'=>'CButtonColumn',
                'template'=>'{update}',
			'updateButtonUrl'=>'Yii::app()->createUrl("Po/updatepraja2", 
                            array(		
                            "id"=>$data->id
                                ))',
		),
	),
));

?>
