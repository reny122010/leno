<?php
/** @package    Sisstc::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CompraMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CompraDAO to the tbcompra datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sisstc::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CompraMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Idcompra"] = new FieldMap("Idcompra","tbcompra","Idcompra",true,FM_TYPE_INT,11,null,true);
			self::$FM["Cpfcliente"] = new FieldMap("Cpfcliente","tbcompra","cpfcliente",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Valor"] = new FieldMap("Valor","tbcompra","valor",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Data"] = new FieldMap("Data","tbcompra","data",false,FM_TYPE_DATE,null,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["tbcompra_ibfk_1"] = new KeyMap("tbcompra_ibfk_1", "Cpfcliente", "Tbcliente", "Cpf", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>