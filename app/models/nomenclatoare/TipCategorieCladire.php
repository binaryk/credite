<?php

namespace Imobiliare\Nomenclator;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class TipCategorieCladire extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'tip_categorii_cladire';
    protected $fillable = ['nume'];

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
        return [0 => ' -- Selectaţi tip categorie cladire --'] + self::orderBy('id')->lists('nume', 'id');
    }
}