<?php

/**
 * This is the model class for table "param_po".
 *
 * The followings are the available columns in table 'param_po':
 * @property integer $id
 * @property string $spek
 * @property string $Deskripsi
 * @property string $Tujuan
 */
class ParamPo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'param_po';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spek, Deskripsi, Tujuan', 'required'),
			array('spek', 'length', 'max'=>10),
			array('Deskripsi', 'length', 'max'=>100),
			array('Tujuan', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, spek, Deskripsi, Tujuan', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'spek' => 'Spek',
			'Deskripsi' => 'Deskripsi',
			'Tujuan' => 'Tujuan',
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
		$criteria->compare('spek',$this->spek,true);
		$criteria->compare('Deskripsi',$this->Deskripsi,true);
		$criteria->compare('Tujuan',$this->Tujuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParamPo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
