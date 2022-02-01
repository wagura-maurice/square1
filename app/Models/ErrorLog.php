<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    const PENDING = 0;
    const OPEN    = 1;
    const CLOSED  = 2;

    protected $table = 'error_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        '_class',
        'description',
        '_status'
    ];

    public static function createRules() {
        return [
            'title'       => 'required|string',
            '_class'      => 'required|string',
            'description' => 'required|string'
        ];
    }

    public static function updateRules() {
        return [
            'title'       => 'nullable|string',
            '_class'      => 'nullable|string',
            'description' => 'nullable|string'
        ];
    }
}
