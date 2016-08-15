<?php

use Illuminate\Database\Seeder;
use HZ\Bid;
class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
               
        $bid = new Bid;
        $bid->bidName = '104年度各渠道及附屬設施修護(巷口小給二之二等3線)工程';
        $bid->bidMoney = 4000000;
        $bid->bidBond = 200000;
        $bid->startDate = '2016/03/08';
        $bid->endDate = '2016/04/08';
        $bid->bidType = false;
        $bid->save();
        
        $bid = new Bid;
        $bid->bidName = '105年度排水路修護(新化等5站)工程';
        $bid->bidMoney = 3000000;
        $bid->bidBond = 100000;
        $bid->startDate = '2016/03/15';
        $bid->endDate = '2016/04/20';
        $bid->bidType = true;
        $bid->save();
        
        
    }
}
