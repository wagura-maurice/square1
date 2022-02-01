<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\RoleUserResource;
use App\Http\Requests\RoleUserFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'role_user';

    protected $primaryKey = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id',
        '_status'
    ];

    public static function createRules() {
        return [
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ];
    }

    public static function updateRules() {
        return [
            'user_id' => 'nullable|integer',
            'role_id' => 'nullable|integer'
        ];
    }
}
