<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFsGeneralIncomeIncremental extends Model
{
    use HasFactory;
    protected $table = 'project_fs_general_income_incrementals';
    protected $fillable = [
        'project_id','incremental',
    ];
    public function income()
    {
        return $this->belongsTo(ProjectFsGeneralIncome::class,'project_id');
    }

}
