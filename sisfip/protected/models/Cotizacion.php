<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property string $idCotizacion
 * @property string $fecha_registro
 * @property integer $idCliente
 * @property string $cond_tecnica
 * @property string $detalle_servicios
 * @property string $total
 * @property string $fecha_Entrega
 * @property integer $cant_Muestra_necesaria
 * @property string $estado
 * @property string $muestra
 * @property string $eliminado
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 */
class Cotizacion extends CActiveRecord
{
	public function registrarCotizacion($idCliente,$cond_tecnica,$detalle_servicios,$total,$fecha_Entrega,$cant_Muestra_necesaria,$muestra){

		$resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');

		
		$cotizacion=new Cotizacion;
$cotizacion->idCliente=$idCliente;
$cotizacion->cond_tecnica=$cond_tecnica;
$cotizacion->detalle_servicios=$detalle_servicios;
$cotizacion->total=$total;
$cotizacion->fecha_Entrega=$fecha_Entrega;
$cotizacion->cant_Muestra_necesaria=$cant_Muestra_necesaria;
$cotizacion->muestra=$muestra;

      		
if(!$cotizacion->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		return $resultado;
	}
	
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
			array('idCliente', 'required'),
			array('idCliente, cant_Muestra_necesaria', 'numerical', 'integerOnly'=>true),
			array('cond_tecnica, detalle_servicios', 'length', 'max'=>200),
			array('total', 'length', 'max'=>8),
			array('estado', 'length', 'max'=>12),
			array('muestra', 'length', 'max'=>30),
			array('eliminado', 'length', 'max'=>1),
			array('fecha_registro, fecha_Entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCotizacion, fecha_registro, idCliente, cond_tecnica, detalle_servicios, total, fecha_Entrega, cant_Muestra_necesaria, estado, muestra, eliminado', 'safe', 'on'=>'search'),
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
			'cond_tecnica' => 'Cond Tecnica',
			'detalle_servicios' => 'Detalle Servicios',
			'total' => 'Total',
			'fecha_Entrega' => 'Fecha Entrega',
			'cant_Muestra_necesaria' => 'Cant Muestra Necesaria',
			'estado' => 'Estado',
			'muestra' => 'Muestra',
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
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('cond_tecnica',$this->cond_tecnica,true);
		$criteria->compare('detalle_servicios',$this->detalle_servicios,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('fecha_Entrega',$this->fecha_Entrega,true);
		$criteria->compare('cant_Muestra_necesaria',$this->cant_Muestra_necesaria);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('muestra',$this->muestra,true);
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
