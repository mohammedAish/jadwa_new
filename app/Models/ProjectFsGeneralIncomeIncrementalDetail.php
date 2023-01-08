<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFsGeneralIncomeIncrementalDetail extends Model
{
    use HasFactory;
    protected $table = 'project_fs_general_income_incremental_details';

    protected $fillable = [
        'project_fs_income_incremental_id','year','incremental',
    ];
}

