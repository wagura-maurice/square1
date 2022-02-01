<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use App\Http\Resources\SettingResource;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\SettingFormRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item',
        'default_value',
        'current_value',
        '_status'
    ];

    public static function createRules() {
        return [
            'item'          => 'required|string|unique:settings',
            'default_value' => 'required|string',
            'current_value' => 'nullable|string'
        ];
    }

    public static function updateRules(Int $id) {
        return [
            'item'          => 'nullable|string|' . Rule::unique('settings', 'item')->ignore($id),
            'default_value' => 'nullable|string',
            'current_value' => 'nullable|string'
        ];
    }
}
