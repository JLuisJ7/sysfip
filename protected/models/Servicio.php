<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property string $idServicio
 * @property string $idProducto
 * @property string $descripcion
 * @property string $metodo
 * @property integer $tiempo_entrega
 * @property integer $cant_muestra
 * @property string $precio
 * @property string $fecha_registro
 * @property string $detalle
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Detallecotizacion[] $detallecotizacions
 * @property Producto $idProducto0
 */
class Servicio extends CActiveRecord
{

	public function listarServicios(){

		$sql = "select * from Servicio";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_registro', 'required'),
			array('tiempo_entrega, cant_muestra', 'numerical', 'integerOnly'=>true),
			array('idServicio, idProducto', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>50),
			array('metodo', 'length', 'max'=>30),
			array('precio', 'length', 'max'=>8),
			array('detalle', 'length', 'max'=>200),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, idProducto, descripcion, metodo, tiempo_entrega, cant_muestra, precio, fecha_registro, detalle, estado', 'safe', 'on'=>'search'),
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
			'detallecotizacions' => array(self::HAS_MANY, 'Detallecotizacion', 'idServicio'),
			'idProducto0' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'idProducto' => 'Id Producto',
			'descripcion' => 'Descripcion',
			'metodo' => 'Metodo',
			'tiempo_entrega' => 'Tiempo Entrega',
			'cant_muestra' => 'Cant Muestra',
			'precio' => 'Precio',
			'fecha_registro' => 'Fecha Registro',
			'detalle' => 'Detalle',
			'estado' => 'Estado',
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

		$criteria->compare('idServicio',$this->idServicio,true);
		$criteria->compare('idProducto',$this->idProducto,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('metodo',$this->metodo,true);
		$criteria->compare('tiempo_entrega',$this->tiempo_entrega);
		$criteria->compare('cant_muestra',$this->cant_muestra);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
