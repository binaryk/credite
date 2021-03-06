<?php

namespace Credite;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class BancaProdus extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table    = 'banca_produs';
    protected $guarded  = [];

    public static function getRecord( $id )
    {
        return self::find($id);
    }

    public static function createRecord($data )
    {
        return self::create($data);
    }

    public static function updateRecord($id, $data)
    {
        $record = self::find($id);
        if( ! $record )
        {
            return false;
        }
        return $record->update($data);
    }

    public static function deleteRecord($id, $data)
    {
        $record = self::find($id);
        if( ! $record )
        {
            return false;
        }
        return $record->delete();
    }

    public static function toCombobox()
    {
        return [0 => ' -- Selectaţi banca --'] + self::orderBy('nume')->lists('nume', 'id');
    }

}