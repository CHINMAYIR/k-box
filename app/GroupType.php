<?php

namespace KBox;

use Illuminate\Database\Eloquent\Model;

/**
 * KBox\GroupType
 *
 * @property int $id
 * @property string $type
 * @method static \Illuminate\Database\Query\Builder|\KBox\GroupType type($type)
 * @method static \Illuminate\Database\Query\Builder|\KBox\GroupType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KBox\GroupType whereType($value)
 * @mixin \Eloquent
 */
class GroupType extends Model
{
    /*
    id: increments
    type: string
    */

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_types';

    public $timestamps = false;

    /**
     * Generic group label
     */
    const GENERIC = 'generic';

    /**
     * Physical folder group label
     */
    const FOLDER = 'folder';

    public function scopeType($query, $type)
    {
        return $query->whereType($type);
    }

    public static function getGenericType()
    {
        return GroupType::type(GroupType::GENERIC)->first();
    }

    public static function getFolderType()
    {
        return GroupType::type(GroupType::FOLDER)->first();
    }
}
