<?php

/**
 * This is the model class for table "muestra".
 *
 * The followings are the available columns in table 'muestra':
 * @property integer $idMuestra
 * @property string $nombre
 * @property string $estado
 * @property string $detalles
 * @property integer $idCliente
 * @property string $presentacion
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 * @property Detallecotizacion[] $detallecotizacions
 * @property Cliente $idCliente0
 */
class Muestra extends CActiveRecord
{

	public function RegistrarMuestra($nombre,$idCliente){
		$resultado = array('valor'=>1,'message'=>'Muestra Registrado correctamente.');
		$muestra=new Muestra;
		$muestra->nombre=$nombre;
		$muestra->idCliente=$idCliente;
		$muestra->idMuestra=$idCliente+100;
		if(!$muestra->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar la muestra, intentelo nuevamente','idMuestra');

}
			

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'muestra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMuestra, idCliente', 'required'),
			array('idMuestra, idCliente', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
			array('detalles', 'length', 'max'=>200),
			array('presentacion', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMuestra, nombre, estado, detalles, idCliente, presentacion', 'safe', 'on'=>'search'),
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
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'Muestra_idMuestra'),
			'detallecotizacions' => array(self::HAS_MANY, 'Detallecotizacion', 'idMuestra'),
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMuestra' => 'Id Muestra',
			'nombre' => 'Nombre',
			'estado' => 'Estado',
			'detalles' => 'Detalles',
			'idCliente' => 'Id Cliente',
			'presentacion' => 'Presentacion',
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

		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('detalles',$this->detalles,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('presentacion',$this->presentacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Muestra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
