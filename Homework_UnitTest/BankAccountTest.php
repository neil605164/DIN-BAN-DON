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
    public function testBankAccount(){

        $myAccount= new BankAccount();

        $Account = $myAccount->get_account();
        $this->assertEquals(0,$Account);

        $Account = $myAccount->set_account(200);
        $this->assertEquals(200,$Account);

        $Account = $myAccount->deposit(40);
        $this->assertEquals(240,$Account);

        if($myAccount->Withdrawal(30)) {
            $Account=$myAccount->get_account();
            $this->assertEquals(210, $Account);
        }
    }
}
