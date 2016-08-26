<?php

class Controller_User extends Controller_Template
{

	public function before()
	{
		parent::before(); // 沒有這一行，樣板不會運作！
		$this->template->title = 'LAI JIA BAN DON';
		$this->template->login = View::forge('user/login');
		$this->template->register = View::forge('user/register');
	}

	//登入系統:將表單資料與資料庫做驗證
	public function post_login()
	{
		$name = Input::post('name');
		$password = Input::post('password');
		$data = Model_User::find('first',[
			'where' => [
				'account' => $name,
			]
		]);

		if($data){
			if($data->password != $password){
				Session::set_flash('error','account or password error');
			}
			else{
				Session::set('user',$data->account);//record all account data
				//Session::set('login',true);
			}
		}else{
			Session::set_flash('error','account is not exist ');
		}
		return Response::redirect('/');
	}

	//登出並回到首頁
	public function get_logout()
	{
		Session::delete('user');
		return Response::redirect('/');
	}

	//註冊系統:將表單存入資料庫，再存入前做一些條件判斷
	public function post_register()
	{
		//接收表單的值
		$name = Input::post('name');
		$password = Input::post('password');
		$confirm = Input::post('confirm');

		//驗證帳號密碼欄位
		if($name == ''){
			Session::set_flash('error','your account is empty');
			return Response::redirect('/');
		}
		if($password == ''){
			Session::set_flash('error','your password is empty');
			return Response::redirect('/');
		}
		if($password != $confirm){
			Session::set_flash('error','your password and confrim is not same');
			return Response::redirect('/');
		}
		$user = Model_User::find('first', [
			'where' => [ 
				'account' => $name,
				],
		]);

		if($user){
			Session::set_flash('error','repeat account');
			return Response::redirect('/');
		}

		//將資料存成陣列並存入資料庫
		$data = new Model_User();
		$data->account = $name;
		$data->password = $password;

		//若有資料→存入資料庫；沒有則回傳存入不成功，在結束IF指令後回首頁
		if($data->save()){
			Session::set_flash('success','Sucessful');
		}else{
			Session::set_flash('error','Unsucessful');
		}

		return Response::redirect('/');

	}

}
