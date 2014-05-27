<?php

/**
 * This is the model class for table "barang".
 *
 * The followings are the available columns in table 'barang':
 * @property integer $key
 * @property string $deskripsi
 * @property string $grup
 * @property string $subgrup
 * @property string $unt
 * @property double $last_price
 * @property integer $status
 */
class Barang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deskripsi, grup, subgrup, unt, last_price', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('last_price', 'numerical'),
			array('deskripsi', 'length', 'max'=>150),
			array('grup, subgrup,no_part', 'length', 'max'=>50),
			array('unt', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('key, deskripsi, grup, subgrup, unt, last_price, status,no_part', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'key' => 'Key',
			'deskripsi' => 'Deskripsi',
			'grup' => 'Grup',
			'subgrup' => 'Subgrup',
			'unt' => 'Unt',
			'last_price' => 'Last Price',
			'status' => 'Status',
			'no_part'=>'Part Number',
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

		$criteria->compare('key',$this->key);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('grup',$this->grup,true);
		$criteria->compare('subgrup',$this->subgrup,true);
		$criteria->compare('unt',$this->unt,true);
		$criteria->compare('last_price',$this->last_price);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
