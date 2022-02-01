<?php

namespace App\Models;

use App\Http\Resources\RoleResource;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function allowTo($ability)
    {
        if (is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }

        return $this->abilities()->sync($ability, false);
    }

    public function disallowTo($ability)
    {
        return $this->abilities()->detach($ability);
    }

    public static function createRules() {
        return [
            'name'        => 'required|string|unique:roles',
            'description' => 'nullable|string'
        ];
    }

    public static function updateRules() {
        return [
            'name'        => 'nullable|string',
            'description' => 'nullable|string'
        ];
    }
}
