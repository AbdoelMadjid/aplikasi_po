<?php

/**
 * This is the model class for table "po".
 *
 * The followings are the available columns in table 'po':
 * @property integer $nomor
 * @property string $tanggal
 * @property string $tujuan
 * @property string $catatan
 * @property integer $id_sup
 */
class Po extends CActiveRecord
{
	public $supp;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'po';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, tujuan, id_sup', 'required'),
			array('id_sup', 'numerical', 'integerOnly'=>true),
			array('tujuan,catat_terima', 'length', 'max'=>255),
			array('catatan', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nomor, tanggal,tgl_terima,no_terima, tujuan,catat_terima, catatan, no_dokumen,id_sup,supp,id_param,sts', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		
		           'suplier'=>array(
                    self::BELONGS_TO,'Suplier','id_sup'
                                ),
					'parampo'=>array(
                    self::BELONGS_TO,'ParamPo','id_param'
                                ),					
								/*
		           'suplier'=>array(
                    self::BELONGS_TO,'Suplier','id_sup'
                                ),*/
								
		);
	}


	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nomor' => 'Nomor',
			'tanggal' => 'Tanggal PO',
			'tujuan' => 'Tujuan',
			'catatan' => 'Catatan',
			'id_sup' => 'Suplier',
			'suplay'=>'Suplier',
			'catat_terima'=>'Catatan Penerimaan',
			'tgl_terima'=>'Tanggal Penerimaan',
			'no_terima'=>'Nomor Penerimaan',
			'no_dokumen'=>'Nomor Dokumen PO',
			'id_param'=>'parameter',
			'suplyar'=>'Nama Suplier',
			'sts'=>'Status PO'
		);
	}
	public function getSuplay() {
		//$npp1=Yii::app()->user->id;
		//$status=0;
		//$id_sup="";
		$npp2=Suplier::model()->findByPk($this->id_sup);
		$telo="";
		if(isset($npp2))
		{
		$telo=$npp2->nama;
		}
        return $telo;
    }
	public function getsuplyar() {
		//$npp1=Yii::app()->user->id;
		//$status=0;
		//$id_sup="";
		$npp2=Suplier::model()->findByPk($this->id_sup);
		$telo="";
		if(isset($npp2))
		{
		$telo=$npp2->nama;
		}
        return $telo;
    }
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		
		$criteria->compare('suplier.nama',$this->supp,true);
		$criteria->with=array('suplier');
		$criteria->together = true;
		$this->sts=0;
		$criteria->compare('nomor',$this->nomor);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('no_dokumen',$this->no_dokumen,true);
		$criteria->compare('sts',$this->sts,true);
		$criteria->compare('id_sup',$this->id_sup);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchterima()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$usern=Yii::app()->user->name;
		if ($usern=="ctbutara")
		{
		$this->no_dokumen="CTB-30";
		}
		elseif ($usern=="ctbselatan")
		{
		$this->no_dokumen="CTB-20";
		}
		$criteria->compare('suplier.nama',$this->supp,true);
		$criteria->with=array('suplier');
		$criteria->together = true;
		$this->sts=0;
		$criteria->compare('nomor',$this->nomor);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('no_dokumen',$this->no_dokumen,true);
		$criteria->compare('sts',$this->sts,true);
		$criteria->compare('id_sup',$this->id_sup);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function searchrilis()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		
		$criteria->compare('suplier.nama',$this->supp,true);
		$criteria->with=array('suplier');
		$criteria->together = true;
		$this->sts=1;
		$criteria->compare('nomor',$this->nomor);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('no_dokumen',$this->no_dokumen,true);
		$criteria->compare('sts',$this->sts,true);
		$criteria->compare('id_sup',$this->id_sup);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function getSuplayidr() {
		//$npp1=Yii::app()->user->id;
		//$status=0;
		//$id_sup="";
		$npp2=Suplier::model()->findByPk($this->id_sup);
		$telo="";
		if(isset($npp2))
		{
		$telo=$npp2->forex;
		}
        return $telo;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Po the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
