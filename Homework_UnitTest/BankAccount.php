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
            return $this->balance = $money;
        }else{
        }
    }


    public function deposit($money)
    {
        if($this->balance>=0){
            return $this->balance += $money;
        }
    }


    public function Withdrawal($money)
    {
        if($this->balance>0 && $this->balance >= $money){
            $this->balance -= $money;
            return true;
        }else{
            return false;
        }
    }
}