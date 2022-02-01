<?php

namespace App\Models;

use App\Traits\HasGravatar;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable 
{
    use HasFactory, Notifiable, HasGravatar, HasApiTokens;

    const PENDING  = 0;
    const ACTIVE   = 1;
    const INACTIVE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        '_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The attributes to be appended on each retrieval.
     *
     * @var array
     */
    protected $appends = [
        'isAdministrator',
        'isManager',
        'isGuest',
        'roles'
    ];

    /**
     * Accessor for isAdministrator attribute
     *
     * @return bool
     **/
    public function getIsAdministratorAttribute(): bool {
        return auth()->user()->roles->contains('name', 'administrator');
    }

    /**
     * Accessor for isManager attribute
     *
     * @return bool
     **/
    public function getIsManagerAttribute(): bool {
        return auth()->user()->roles->contains('name', 'manager');
    }

    /**
     * Accessor for isGuest attribute
     *
     * @return bool
     **/
    public function getIsGuestAttribute(): bool {
        return auth()->user()->roles->contains('name', 'guest');
    }

    /**
     * Accessor for roles attribute
     *
     * @return object
     **/
    public function getIsRolesAttribute(): object {
        return $this->roles();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
            // $role = Role::whereName($role)->firstOrCreate(['name' => $role]);
        }

        return $this->roles()->sync($role, false);
        // return $this->roles()->syncWithoutDetaching($role);
    }

    public function unassignRole($role)
    {
        return $this->roles()->detach($role);
    }

    /* public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    } */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function assignPost($post)
    {
        if (is_string($post)) {
            $post = Post::whereName($post)->firstOrFail();
        }

        return $this->posts()->sync($post, false);
    }

    public function unassignPost($post)
    {
        return $this->posts()->detach($post);
    }

    public static function createRules() {
        return [
            'name'                     => 'required|string',
            'email'                    => 'required|email|unique:users',
            'email_verified_at'        => 'nullable|string|confirmed',
            'password'                 => 'required|string|confirmed',
            'roles'                    => 'required|array|min:1',
            'roles.*'                  => 'required',
            'posts'                    => 'nullable|array|min:1',
            'posts.*'                  => 'nullable'
        ];
    }

    public static function updateRules(Int $id) {
        return [
            'name'                     => 'nullable|string',
            'email'                    => 'nullable|email|' . Rule::unique('users', 'email')->ignore($id),
            'email_verified_at'        => 'nullable|string',
            'password'                 => 'nullable|string',
            'roles'                    => 'nullable|array|min:1',
            'roles.*'                  => 'nullable',
            'posts'                    => 'nullable|array|min:1',
            'posts.*'                  => 'nullable'
        ];
    }

    public static function registrationRules() {
        return [
            'name'                     => 'required|string',
            'email'                    => 'required|email|unique:users',
            'password'                 => 'required|string|confirmed'
        ];
    }

    public static function loginRules() {
        return [
            'email'                    => 'required|email',
            'password'                 => 'required|string'
        ];
    }
}
