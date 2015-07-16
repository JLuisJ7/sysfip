<?php

/**
 * This is the model class for table "detallecotizacion".
 *
 * The followings are the available columns in table 'detallecotizacion':
 * @property string $idCotizacion
 * @property string $idProducto
 * @property string $idServicio
 * @property integer $cantidad
 * @property integer $tiempo
 * @property string $costo
 *
 * The followings are the available model relations:
 * @property Cotizacion $idCotizacion0
 * @property Producto $idProducto0
 * @property Servicio $idServicio0
 */
class Detallecotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detallecotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, tiempo', 'numerical', 'integerOnly'=>true),
			array('idCotizacion, idProducto, idServicio', 'length', 'max'=>10),
			array('costo', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCotizacion, idProducto, idServicio, cantidad, tiempo, costo', 'safe', 'on'=>'search'),
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
			'idCotizacion0' => array(self::BELONGS_TO, 'Cotizacion', 'idCotizacion'),
			'idProducto0' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCotizacion' => 'Id Cotizacion',
			'idProducto' => 'Id Producto',
			'idServicio' => 'Id Servicio',
			'cantidad' => 'Cantidad',
			'tiempo' => 'Tiempo',
			'costo' => 'Costo',
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

		$criteria->compare('idCotizacion',$this->idCotizacion,true);
		$criteria->compare('idProducto',$this->idProducto,true);
		$criteria->compare('idServicio',$this->idServicio,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('tiempo',$this->tiempo);
		$criteria->compare('costo',$this->costo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detallecotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
