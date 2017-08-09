<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\origemservsocial
 *
 * @property int $ID_ORIGEM_SERVSOCIAL
 * @property string $ORIGEM_SERVSOCIAL_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\origemservsocial whereIDORIGEMSERVSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\origemservsocial whereORIGEMSERVSOCIALDESCRICAO($value)
 * @mixin \Eloquent
 */
class origemservsocial extends Model
{
    protected $table      = 'ORIGEM_SERVSOCIAL';
    protected $fillable   = ['ID_ORIGEM_SERVSOCIAL', 'ORIGEM_SERVSOCIAL_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_SERVSOCIAL';

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ORIGEM_SERVSOCIAL_DESCRICAO'   => 'required|min:3',
    );
}
