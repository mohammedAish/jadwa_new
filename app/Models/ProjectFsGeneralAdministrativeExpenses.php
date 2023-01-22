<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFsGeneralAdministrativeExpenses extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'project_fs_general_expenses' ; 

    public function AdministExpen()
    {
        return $this->belongsToMany(AdministExpen::class, 'project_fs_general_expenses_details' , 'project_id' ,'id');
    }
    
    public function expenses_details()
    {
        return $this->hasMany(ProjectFsGeneralAdministrativeExpensesDetails::class, 'gae_id' );
    }

}
