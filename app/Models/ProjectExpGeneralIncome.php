<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectExpGeneralIncome extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id','item','value','quantity','expensis_type','fsIncome_id',
    ];
    public function fsIncome()
    {
        return $this->belongsTo(ProjectFsGeneralIncome::class, 'fsIncome_id', 'id')
            ->withDefault();
    }
}

