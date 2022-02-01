<?php

namespace App\Models;

use App\Http\Resources\AbilityResource;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AbilityFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ability extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        '_status'
    ];

    public static function createRules() {
        return [
            'name'        => 'required|string|unique:abilities',
            'description' => 'nullable|string'
        ];
    }

    public static function updateRules() {
        return [
            'name'        => 'nullable|string',
            'description' => 'nullable|string'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
