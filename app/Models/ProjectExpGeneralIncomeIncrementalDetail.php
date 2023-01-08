<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectExpGeneralIncomeIncrementalDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_exp_income_incremental_id','year','incremental',
    ];
}
