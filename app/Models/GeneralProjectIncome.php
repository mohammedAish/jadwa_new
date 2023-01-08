<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralProjectIncome extends Model
{
    protected $table = 'general_project_income';
    protected $guarded = [];

    public function increments()
    {
        return $this->hasMany(GeneralProjectIncomeIncremental::class,'item_id');
    }
}
