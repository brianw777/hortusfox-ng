<?php

/**
 * This class extends the base model class and represents your associated table
 */ 
class CustAttrSchemaModel extends \Asatru\Database\Model {
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getAll($filter_active = true)
    {
        try {
            if ($filter_active) {
                return static::raw('SELECT * FROM `' . self::tableName() . '` WHERE active = 1');
            } else {
                return static::raw('SELECT * FROM `' . self::tableName() . '`');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $label
     * @param $datatype
     * @return void
     * @throws \Exception
     */
    public static function addSchema($label, $datatype)
    {
        try {
            static::raw('INSERT INTO `' . self::tableName() . '` (label, datatype, active) VALUES(?, ?, 1)', [
                $label, $datatype
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @param $label
     * @param $datatype
     * @param $active
     * @return void
     * @throws \Exception
     */
    public static function editSchema($id, $label, $datatype, $active)
    {
        try {
            static::raw('UPDATE `' . self::tableName() . '` SET label = ?, datatype = ?, active = ? WHERE id = ?', [
                $label, $datatype, $active, $id
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @return void
     * @throws \Exception
     */
    public static function removeSchema($id)
    {
        try {
            static::raw('DELETE FROM `' . self::tableName() . '` WHERE id = ?', [$id]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Return the associated table name of the migration
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'custattrschema';
    }
}