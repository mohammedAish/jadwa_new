<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdministExpen extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guraded = [];
    protected $fillable = [
        'item',
        'value',
      
    ];

    public function projectFsGeneralExpensesDetails()
    {
        return $this->belongsToMany(ProjectFsGeneralAdministrativeExpenses::class, 'project_fs_general_expenses_details' , 'expensis_type');
    }
}
