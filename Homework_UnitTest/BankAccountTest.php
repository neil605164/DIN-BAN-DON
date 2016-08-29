<?php
require_once "BankAccount.php";
/**
 * Created by PhpStorm.
 * User: hsieh
 * Date: 2016/8/26
 * Time: 上午 8:25
 * 測試順序為：
 * 初始值設定
 * 取的帳戶餘額
 * 設定帳戶餘額
 * 存款
 * 提款
 *
 */
class BankAccountTest extends PHPUnit_Framework_TestCase
{
    public function testgetaccount()
    {
        $myAccount = new BankAccount();
        $Account = $myAccount->get_account();
        $this->assertEquals(0, $Account);
    }

    public function testsetaccount()
    {
        $myAccount= new BankAccount();
        $this->assertTrue($myAccount->set_account(50));
        $this->assertfalse($myAccount->set_account(-1));
    }

    public function testdeposit()
    {
        $myAccount= new BankAccount();
        $this->assertTrue($myAccount->deposit(50));

        $myAccount= new BankAccount();
        $this->assertfalse($myAccount->deposit(-1));
    }

    public function testWithdrawal()
    {
        $myAccount= new BankAccount();
        $this->assertTrue($myAccount->Withdrawal(300));
        $this->assertfalse($myAccount->Withdrawal(600));


    }

}
