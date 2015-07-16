<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property string $idCotizacion
 * @property string $fecha_registro
 * @property string $idCliente
 * @property string $total
 * @property string $fecha_entrega
 * @property string $registrado_por
 * @property string $estado
 * @property string $eliminado
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 * @property Detallecotizacion[] $detallecotizacions
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCotizacion, fecha_registro', 'required'),
			array('idCotizacion, idCliente, registrado_por, estado', 'length', 'max'=>10),
			array('total', 'length', 'max'=>8),
			array('eliminado', 'length', 'max'=>1),
			array('fecha_entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCotizacion, fecha_registro, idCliente, total, fecha_entrega, registrado_por, estado, eliminado', 'safe', 'on'=>'search'),
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
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
			'detallecotizacions' => array(self::HAS_MANY, 'Detallecotizacion', 'idCotizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCotizacion' => 'Id Cotizacion',
			'fecha_registro' => 'Fecha Registro',
			'idCliente' => 'Id Cliente',
			'total' => 'Total',
			'fecha_entrega' => 'Fecha Entrega',
			'registrado_por' => 'Registrado Por',
			'estado' => 'Estado',
			'eliminado' => 'Eliminado',
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
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('idCliente',$this->idCliente,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('registrado_por',$this->registrado_por,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('eliminado',$this->eliminado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
