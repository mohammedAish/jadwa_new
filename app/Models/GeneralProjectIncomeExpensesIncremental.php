<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralProjectIncomeExpensesIncremental extends Model
{
    protected $table = 'project_income_expenses_incremental';
    protected $guarded = [];

    public function income()
    {
        return $this->belongsTo(GeneralProjectIncomeExpenses::class,'item_id');
    }
}
