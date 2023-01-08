<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemPage extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guraded =[];
protected $table = 'system_pages';
    protected $fillable = [
        'title',
        'content',
        'type',
        'key',
       'id',
    ];
}
