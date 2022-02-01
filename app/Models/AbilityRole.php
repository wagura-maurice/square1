<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\AbilityRoleResource;
use App\Http\Requests\AbilityRoleFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbilityRole extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'ability_role';

    protected $primaryKey = 'ability_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'ability_id',
        '_status'
    ];

    public static function createRules() {
        return [
            'role_id'    => 'required|integer',
            'ability_id' => 'required|integer'
        ];
    }

    public static function updateRules() {
        return [
            'role_id'    => 'nullable|integer',
            'ability_id' => 'nullable|integer'
        ];
    }
}
