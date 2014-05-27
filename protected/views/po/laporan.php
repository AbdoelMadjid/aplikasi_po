<?php
/* @var $this DokumenController */
/* @var $model Dokumen */
/*
$this->breadcrumbs=array(
	'Dokumens'=>array('index'),
	'Manage',
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dokumen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Laporan PO</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php 

    $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider' => $dp,
      'mergeColumns' => array('id_po'),
	  'extraRowColumns' => array('id_po'),
      'extraRowPos' => 'below',
      'extraRowTotals' => function($data, $row, &$totals) {
          if(!isset($totals['count'])) $totals['count'] = 0;
          $totals['count']++;
          
          if(!isset($totals['sum_age'])) $totals['sum_age'] = 0;
          $totals['sum_age'] +=($data->jml_pesan*$data->harga)+(($data->ppn/100)*($data->jml_pesan*$data->harga))-(($data->diskon/100)*($data->jml_pesan*$data->harga));
      },
      'extraRowExpression' => '"<span class=\"subtotal\">".$data->po->no_dokumen.": ".$totals["count"]." items,".$data->po->suplayidr."  - ".number_format($totals["sum_age"])."</span>"',
      'columns' => array(
		//'id_lokasi_kampus',
        //'id_thn_ajar',
		'id_po',
		array(
		'name'=>'id_po',
		'header'=>'Tanggal',
		'value'=>'$data->po==null?"":date("d-m-Y",strtotime($data->po->tanggal))',
		),
		array(
		'name'=>'id_po',
		'header'=>'Nomor PO',
		'value'=>'$data->po==null?"":$data->po->no_dokumen',
		),
		array(
		'name'=>'id_po',
		'header'=>'Suplier',
		'value'=>'$data->po==null?"":$data->po->suplyar',
		),
		'brg',
		'jml_pesan',
		'satuan',
		'hrg',
		'diskon',
		'ppn',
		
		array(
		'name'=>'hrg',
		'header'=>'Total',
		'value'=>'number_format(($data->jml_pesan*$data->harga)+(($data->ppn/100)*($data->jml_pesan*$data->harga))-(($data->diskon/100)*($data->jml_pesan*$data->harga)))',
		),
		

      ),
    ));
?>
