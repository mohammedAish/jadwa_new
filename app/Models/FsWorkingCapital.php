<?php

namespace App\Models;

use App\Models\admin\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FsWorkingCapital extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['type','project_id','period'];
    public function projects(){
        return $this->hasMany(Project::class );
    }
}
