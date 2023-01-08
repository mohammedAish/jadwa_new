<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralProjectIncomeIncremental extends Model
{
    protected $table = 'project_general_income_incremental';
    protected $guarded = [];

    public function income()
    {
        return $this->belongsTo(GeneralProjectIncome::class,'item_id');
    }
}
