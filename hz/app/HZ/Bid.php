<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bid extends Model
{
    use SoftDeletes;
    protected $table = 'bid';
    protected $primaryKey = 'bid_Id';
    
    protected $fillable = ['bidName','bidAbbreviation','bidMoney','bidBond','startDate','endDate','bidType'];
    //protected $hidden  =['_method','_token'];
    
    public function branch()
    {
        return $this->hasMany('HZ\Branch');
    }
}
