<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralProjectIncomeExpenses extends Model
{
    protected $table = 'project_income_expenses';
    protected $guarded = [];

    public function increments()
    {
        return $this->hasMany(GeneralProjectIncomeExpensesIncremental::class,'item_id');
    }
}
