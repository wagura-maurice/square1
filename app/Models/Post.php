<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'publication_date'
    ];

    // protected $dates = ['publication_date'];

    /**
     * This function creates a set of rules for the validation of the form
     * 
     * @return An array of rules.
     */
    public static function createRules() {
        return [
            'title'            => 'required|string',
            'description'      => 'required|string',
            'publication_date' => 'nullable|string'
        ];
    }

    /**
     * This function returns an array of rules for the validation of the updateRules() function
     * 
     * @return An array of rules for the validation of the question.
     */
    public static function updateRules() {
        return [
            'title'            => 'nullable|string',
            'description'      => 'nullable|string',
            'publication_date' => 'nullable|string'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(PostUser::class, 'post_id');
    }
}
