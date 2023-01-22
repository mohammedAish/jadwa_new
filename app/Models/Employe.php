<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $fillable = [
        'job','annual_salary','quantity','value_incremental','project_id',
    ];
    public function employeesDetails()
    {
        return $this->hasMany(EmployeesDetails::class, 'employes_id', 'id');
    }
}
