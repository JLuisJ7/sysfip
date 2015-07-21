<?php

/**
 * This is the model class for table "detallecotizacion".
 *
 * The followings are the available columns in table 'detallecotizacion':
 * @property integer $idServicio
 * @property integer $idCotizacion
 * @property integer $idMuestra
 * @property string $recomendado
 * @property string $acreditado
 * @property string $estado
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Cotizacion $idCotizacion0
 * @property Muestra $idMuestra0
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
			array('idServicio, idCotizacion, idMuestra', 'required'),
			array('idServicio, idCotizacion, idMuestra', 'numerical', 'integerOnly'=>true),
			array('recomendado, estado', 'length', 'max'=>1),
			array('acreditado', 'length', 'max'=>2),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, idCotizacion, idMuestra, recomendado, acreditado, estado, precio', 'safe', 'on'=>'search'),
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
			'idMuestra0' => array(self::BELONGS_TO, 'Muestra', 'idMuestra'),
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'idCotizacion' => 'Id Cotizacion',
			'idMuestra' => 'Id Muestra',
			'recomendado' => 'Recomendado',
			'acreditado' => 'Acreditado',
			'estado' => 'Estado',
			'precio' => 'Precio',
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

		$criteria->compare('idServicio',$this->idServicio);
		$criteria->compare('idCotizacion',$this->idCotizacion);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('recomendado',$this->recomendado,true);
		$criteria->compare('acreditado',$this->acreditado,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('precio',$this->precio,true);

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
