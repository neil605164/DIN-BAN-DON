<?php

/**
 * Created by PhpStorm.
 * User: hsieh
 * Date: 2016/8/25
 * Time: 上午 9:31
 */
class BankAccount
{
    public $balance=0;

    public function get_account(){
        return $this->balance;
    }

    public function set_account($money)
    {
        if($money>=0){
            $this->balance = $money;
            return true;
        }
        else{
            return false;
        }
    }


    public function deposit($money)
    {
        if($money > 0){
            $this->balance += $money;
            return true;
        }else {
            return false;
        }
    }

    public function Withdrawal($money)
    {
        $balance=500;
        if($balance>0 && $balance >= $money){

            $balance -= $money;
            return true;
        }
        return false;
    }
}