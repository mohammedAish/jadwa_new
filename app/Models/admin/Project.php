<?php

namespace App\Models\admin;

use App\Models\CapitalStructure;
use App\Models\FsAccountReceivable;
use App\Models\FsWorkingCapital;
use App\Models\FundingSource;
use App\Models\ProjectType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{

    use HasFactory ,SoftDeletes;
    protected $guarded = [];

    public $timestamps = true;

    // protected $fillabel = [];

    // protected $start_date =' datetime:m/d/y';
        public function user(){
        return $this->belongsTo(User::class , "owner_id" , "id");
    }

    public function projectType(){
        return $this->belongsTo(ProjectType::class );
    }

    public function fsAccountReceivable(){
        return $this->belongsTo(FsAccountReceivable::class );
    }

    public function fsWorkingCapital(){
        return $this->belongsTo(FsWorkingCapital::class );
    }

    public function fundingResource(){
        return $this->belongsTo(FundingSource::class );
    }

    public function capitalStructure(){
        return $this->belongsTo(CapitalStructure::class );
    }

    // public function setCreatedByAttribute() {
    //     $this->created_by = Auth::user()->id;
    // }

    // public function getStartDateAtAttribute($start_date) {
    //     return Carbon::parse($start_date)->format('m/d/Y');
    // }
}
