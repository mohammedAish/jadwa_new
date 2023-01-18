<?php

namespace App\Models;

use App\Models\admin\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FsStartupCost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['name','project_id','cost'];
    public function projects(){
        return $this->hasMany(Project::class );
    }
}
