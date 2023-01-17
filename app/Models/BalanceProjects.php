<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceProjects extends Model
{
    use HasFactory;
    protected $table = 'balance_projects';
    protected $fillable = [
        'project_id','item','quantity','cost','depreciation','balance_type','purchase_year',
    ];

}
