<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostUser extends Model
{
    use HasFactory;

    protected $table = 'post_user';

    protected $primaryKey = 'post_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    /**
     * This function returns an array of Post objects that are related to the current user
     * 
     * @return An array of Post objects.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    /**
     * This function creates the rules for the validation of the data
     * 
     * @return An array of rules.
     */
    public static function createRules() {
        return [
            'user_id' => 'required|integer',
            'post_id' => 'required|integer'
        ];
    }

    /**
     * This function returns an array of rules that will be used to validate the input data
     * 
     * @return An array of rules that will be used to validate the request.
     */
    public static function updateRules() {
        return [
            'user_id' => 'nullable|integer',
            'post_id' => 'nullable|integer'
        ];
    }
}
