<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use SoftDeletes;
    protected $table = "branch";
    protected $primaryKey = "branch_Id";
    protected $fillable = ["bid_Id","branchName"];

    public function bid(){
        
        return $this->belongsTo('Hz\Bid');
    }
}
