<?php

class PoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','updateterima','terimapo','updatepraja2','view4','cetakterima','cetakterimadot','update21'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','view3','update2','rilis','view2','tambahpraja','deletepraja','cetak','updatepraja','laporan','laporanbarang'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionView4($id)
	{
		$podet=new PoDetail('search');
		$podet->unsetAttributes();  // clear any default values
		if(isset($_GET['PoDetail']))
		$podet->attributes=$_GET['PoDetail'];
		$this->render('view4',array(
			'model'=>$this->loadModel($id),'podet'=>$podet,
		));
	}
	public function actionView3($id)
	{
		$podet=new PoDetail('search');
		$podet->unsetAttributes();  // clear any default values
		if(isset($_GET['PoDetail']))
		$podet->attributes=$_GET['PoDetail'];
		$this->render('view3',array(
			'model'=>$this->loadModel($id),'podet'=>$podet,
		));
	}
	
	public function actionView2($id)
	{
		$podet=new PoDetail('search');
		$podet->unsetAttributes();  // clear any default values
		if(isset($_GET['PoDetail']))
		$podet->attributes=$_GET['PoDetail'];
		$this->render('view2',array(
			'model'=>$this->loadModel($id),'podet'=>$podet,
		));
	}
		
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Po;
		$suplier = new Suplier('search');
		$suplier->unsetAttributes();
        if(isset($_GET['Suplier']))
		$suplier->attributes=$_GET['Suplier'];
		$prpo=ParamPo::model()->findAll();
		// $kelas = Kelas::model()->findAll();$thnAjar = TahunAjar::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Po']))
		{
			
			$model->attributes=$_POST['Po'];
			$model->id_param=$model->tujuan;
			$poparam=ParamPo::model()->findByPk($model->tujuan);
			if(isset($poparam))
			{
			$pp =$poparam->spek;
			$model->tujuan=$poparam->Tujuan;
			
			if($model->save())
			{
				$today = date("ymd");  
				$pp .=".".$today."-".$model->nomor;
				Po::model()->updateByPk($model->nomor,array('no_dokumen'=>$pp));
				$this->redirect(array('view2','id'=>$model->nomor));
				
				}
			}
			}	
		

		$this->render('create',array(
			'model'=>$model,'suplier'=>$suplier,'prpo'=>$prpo
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$suplier = new Suplier('search');
		$suplier->unsetAttributes();
        if(isset($_GET['Suplier']))
		$suplier->attributes=$_GET['Suplier'];
		$prpo=ParamPo::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Po']))
		{
			$model->attributes=$_POST['Po'];
			$model->id_param=$model->tujuan;
			$poparam=ParamPo::model()->findByPk($model->tujuan);
			if(isset($poparam))
			{
			$pp =$poparam->spek;
			$model->tujuan=$poparam->Tujuan;
			if($model->save())
			{
				$today = date("ymd");  
				$pp .=".".$today."-".$model->nomor;
				Po::model()->updateByPk($model->nomor,array('no_dokumen'=>$pp));			
			$this->redirect(array('view2','id'=>$model->nomor));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,'suplier'=>$suplier,'prpo'=>$prpo
		));
	}

	public function actionUpdateterima($id)
	{
		$model=$this->loadModel($id);
		$suplier = new Suplier('search');
		$suplier->unsetAttributes();
        if(isset($_GET['Suplier']))
		$suplier->attributes=$_GET['Suplier'];
		$prpo=ParamPo::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Po']))
		{
			$model->attributes=$_POST['Po'];
			$model->tgl_terima=$_POST['Po']['tgl_terima'];
			$poini=Po::model()->findByPk($id);
			$pp=substr($poini->no_dokumen,0,6);
			//$model->id_param=$model->tujuan;
//			$poparam=ParamPo::model()->findByPk($model->tujuan);
//			if(isset($poparam))
//			{
//			$pp =$poparam->spek;
			//$model->tujuan=$poparam->Tujuan;
			if($model->save())
			{
				$today = date("ymd");  
				$pp .=".".$today."-".$model->nomor;
				Po::model()->updateByPk($model->nomor,array('no_terima'=>$pp));			
				$this->redirect(array('view4','id'=>$model->nomor));
				}
	//		}
		}

		$this->render('updateterima',array(
			'model'=>$model,'suplier'=>$suplier,'prpo'=>$prpo
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Po');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionUpdate21($id)
	{
	//$this->layout=false;
	$relis=1;
	Po::model()->UpdatebyPk($id,array('sts'=>$relis));
	$this->redirect(array('terimapo'));
	//$this->redirect('Po/admin');
	/*
	$this->render('cetak',
                    array(
                        'po'=>$po,'kelas'=>$kelas
            ));*/
	}
	

	public function actionUpdate2($id)
	{
	//$this->layout=false;
	$relis=1;
	Po::model()->UpdatebyPk($id,array('sts'=>$relis));
	$this->redirect(array('admin'));
	//$this->redirect('Po/admin');
	/*
	$this->render('cetak',
                    array(
                        'po'=>$po,'kelas'=>$kelas
            ));*/
	}

	public function actionCetakterimadot($id)
	{
	$this->layout=false;
	$po=Po::model()->findByPk($id);
	    $sql="SELECT id
				FROM po_detail
				WHERE id_po=:id";
		$command =Yii::app()->db->createCommand($sql);
	    $command->bindValue(":id", $id, PDO::PARAM_STR);
		$kelas =$command->queryAll();
	
	$this->render('cetakgrn_ctb_matrix',
                    array(
                        'po'=>$po,'kelas'=>$kelas
            ));
	}	

	public function actionCetakterima($id)
	{
	$this->layout=false;
	$po=Po::model()->findByPk($id);
	    $sql="SELECT id
				FROM po_detail
				WHERE id_po=:id";
		$command =Yii::app()->db->createCommand($sql);
	    $command->bindValue(":id", $id, PDO::PARAM_STR);
		$kelas =$command->queryAll();
	
	$this->render('cetakgrn_ctb',
                    array(
                        'po'=>$po,'kelas'=>$kelas
            ));
	}	
	public function actionCetak($id)
	{
	$this->layout=false;
	$po=Po::model()->findByPk($id);
	    $sql="SELECT id
				FROM po_detail
				WHERE id_po=:id";
		$command =Yii::app()->db->createCommand($sql);
	    $command->bindValue(":id", $id, PDO::PARAM_STR);
		$kelas =$command->queryAll();
	
	$this->render('cetak',
                    array(
                        'po'=>$po,'kelas'=>$kelas
            ));
	}

	public function actionLaporanbarang($no_part)
	{
//	$this->layout="column1";
	$this->layout=false;
	$criteria=new CDbCriteria;
	$criteria->condition = "part_no = :id";
    $criteria->params = array(
                            ':id'=>$no_part
                            );
	//$criteria->compare('id_thn_ajar', $model->id_thn_ajar, true);
			$dp = new CActiveDataProvider('PoDetail', array(
			'criteria' => $criteria,
            'sort'=>array(
                'attributes'=>array(
                      'id_po',
                 ),
                 'defaultOrder' => 'id_po,id',  
            ),
            'pagination' =>false,
			/*'pagination' => array(
              'pagesize' => 30,
            ),*/
        )); 
					
				
	//	}
		
	$this->render('laporan2', array('dp' => $dp,
	));

	
	}
	public function actionLaporan()
	{
//	$this->layout="column1";
	$this->layout=false;
			$dp = new CActiveDataProvider('PoDetail', array(
            'sort'=>array(
                'attributes'=>array(
                      'id_po',
                 ),
                 'defaultOrder' => 'id_po,id',  
            ),
            'pagination' =>false,
			/*'pagination' => array(
              'pagesize' => 30,
            ),*/
        )); 
					
				
	//	}
		
	$this->render('laporan', array('dp' => $dp,
	));

	
	}
	public function actionDeletepraja($id)
        {
            
            if(Yii::app()->request->isPostRequest)
		{
			/*// we only allow deletion via POST request
                        $kelasDetailCriteria = new CDbCriteria;
                        $kelasDetailCriteria->condition = 'id_kelas_thn_ajar =:thn AND npp = :npp';
                        $kelasDetailCriteria->params = array(
                                            ':thn'=>$thn,
                                            ':npp'=>$id
                                        );*/
                        $kelasDetail = PoDetail::model()->findByPk($id);
                        $kelasDetail->delete();
			//$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), 
                        // we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
            
        }
        
        public function actionUpdatepraja2($id)
		{
		$model=$this->loadModel2($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
            $barang = new Barang('search');
			$barang->unsetAttributes();
			if(isset($_GET['Barang']))
			$barang->attributes=$_GET['Barang'];
		if(isset($_POST['PoDetail']))
		{
			$model->attributes=$_POST['PoDetail'];
			
			if($model->save())
				$this->redirect(array('view4','id'=>$model->id_po));
		}

		$this->render('updatepraja2',array(
			'model'=>$model,'barang'=>$barang
		));
		}

        public function actionUpdatepraja($id)
		{
		$model=$this->loadModel2($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
            $barang = new Barang('search');
			$barang->unsetAttributes();
			if(isset($_GET['Barang']))
			$barang->attributes=$_GET['Barang'];
		if(isset($_POST['PoDetail']))
		{
			$model->attributes=$_POST['PoDetail'];
			
			if($model->save())
				$this->redirect(array('view2','id'=>$model->id_po));
		}

		$this->render('updatepraja',array(
			'model'=>$model,'barang'=>$barang
		));
		}

        public function actionTambahpraja($id_po)
        {
            $model = new PoDetail;;
            $barang = new Barang('search');
			$barang->unsetAttributes();
			if(isset($_GET['Barang']))
			$barang->attributes=$_GET['Barang'];
			
            if(isset($_POST['PoDetail']))
            {
                $model->attributes=$_POST['PoDetail'];
				Barang::model()->updateByPk($model->part_no,array('last_price'=>$model->harga));		
				$model->id_po=$id_po;
				if($model->save())
                {
				
                    $this->redirect(array('view2','id'=>$id_po));
                }
            }
            
            $this->render('tambahpraja',
                    array(
                        'model'=>$model,'barang'=>$barang
            ));
        }
		
		public function loadModel2($id)
	{
		$model=PoDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Po('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Po']))
			$model->attributes=$_GET['Po'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionTerimapo()
	{
		$model=new Po('search');
		$model->unsetAttributes();  // clear any default values
		$this->layout="column1";
		if(isset($_GET['Po']))
			$model->attributes=$_GET['Po'];

		$this->render('admin3',array(
			'model'=>$model,
		));
	}
	public function actionRilis()
	{
		$model=new Po('search');
		$model->unsetAttributes();  // clear any default values
		$this->layout="column1";
		if(isset($_GET['Po']))
			$model->attributes=$_GET['Po'];

		$this->render('admin2',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Po the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Po::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Po $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='po-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
