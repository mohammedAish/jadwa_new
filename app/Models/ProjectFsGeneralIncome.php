<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFsGeneralIncome extends Model
{
    use HasFactory;
    protected $table = 'project_fs_general_incomes';
    protected $fillable = [
        'project_id','item','value','quantity'
    ];
    public function increments()
    {
        return $this->hasMany(ProjectFsGeneralIncomeIncremental::class,'project_id');
    }
    public function expIncome()
    {
        return $this->hasOne(ProjectExpGeneralIncome::class, 'fsIncome_id', 'id');
    }

}
