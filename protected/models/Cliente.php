<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property string $idCliente
 * @property string $dni
 * @property string $nombres
 * @property string $atencion
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 * @property string $referencia
 * @property string $fecha_registro
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, fecha_registro', 'required'),
			array('idCliente', 'length', 'max'=>10),
			array('dni', 'length', 'max'=>11),
			array('nombres, atencion, direccion, referencia', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>15),
			array('correo', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCliente, dni, nombres, atencion, direccion, telefono, correo, referencia, fecha_registro, estado', 'safe', 'on'=>'search'),
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
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'dni' => 'Dni',
			'nombres' => 'Nombres',
			'atencion' => 'Atencion',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'correo' => 'Correo',
			'referencia' => 'Referencia',
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('idCliente',$this->idCliente,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('atencion',$this->atencion,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
