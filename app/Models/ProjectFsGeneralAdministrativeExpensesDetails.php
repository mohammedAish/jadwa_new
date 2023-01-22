<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFsGeneralAdministrativeExpensesDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'project_fs_general_expenses_details' ;

    public function expenses()
    {
        return $this->hasMany(ProjectFsGeneralAdministrativeExpenses::class, 'id' );
    }
}
