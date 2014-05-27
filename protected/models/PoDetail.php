<?php

/**
 * This is the model class for table "po_detail".
 *
 * The followings are the available columns in table 'po_detail':
 * @property integer $id
 * @property integer $id_po
 * @property integer $part_no
 * @property integer $jml_pesan
 * @property integer $satuan
 * @property double $harga
 */
class PoDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'po_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_po, part_no, jml_pesan, satuan, harga,diskon,ppn', 'required'),
			array('id_po, part_no, jml_pesan,jml_terima', 'numerical', 'integerOnly'=>true),
			array('harga', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_po, part_no, jml_terima,jml_pesan, satuan, harga,diskon,ppn', 'safe', 'on'=>'search'),
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
				   'po'=>array(
                    self::BELONGS_TO,'Po','id_po'
                                ),
				   'barang'=>array(
                    self::BELONGS_TO,'Barang','part_no'
                                ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_po' => 'Id Po',
			'part_no' => 'Part No',
			'jml_pesan' => 'Jumlah Pesan',
			'satuan' => 'Satuan',
			'harga' => 'Harga',
			'brg'=>'Barang',
			'hrg'=>'harga',
			'diskon'=>'Diskon %',
			'ppn'=>'ppn %',
			'jml_terima'=>'Jumlah Penerimaan',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_po',$this->id_po);
		$criteria->compare('part_no',$this->part_no);
		$criteria->compare('jml_pesan',$this->jml_pesan);
		$criteria->compare('satuan',$this->satuan);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('diskon',$this->diskon);
		$criteria->compare('ppn',$this->ppn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchpo($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$this->id_po=$id;
		$criteria->compare('id',$this->id);
		$criteria->compare('id_po',$this->id_po);
		$criteria->compare('part_no',$this->part_no);
		$criteria->compare('jml_pesan',$this->jml_pesan);
		$criteria->compare('satuan',$this->satuan);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('diskon',$this->diskon);
		$criteria->compare('ppn',$this->ppn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getBrg() {
		//$npp1=Yii::app()->user->id;
		//$status=0;
		//$id_sup="";
		$npp2=Barang::model()->findByPk($this->part_no);
		$telo="";
		if(isset($npp2))
		{
		$telo=$npp2->deskripsi;
		}
        return $telo;
    }
	public function gethrg()
	{
	return number_format($this->harga);	
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PoDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
