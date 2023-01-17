<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesDetails extends Model
{
    use HasFactory;

    protected $table = 'employees_details';
    protected $fillable = [
        'employes_id','quantity','year','incremental',
    ];
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employes_id', 'id')
            ->withDefault();
    }
}
