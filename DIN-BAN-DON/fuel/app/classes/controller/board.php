<?php

class Controller_Board extends Controller_Template
{
	public function before()
	{
		parent::before(); // 沒有這一行，樣板不會運作！
		$this->template->title = 'LAI JIA BAN DON';
		$this->template->login = View::forge('user/login');
		$this->template->register = View::forge('user/register');
	}

	public function action_index()
	{
		$DB_board_data = Model_board::find('all');
		$data = ['DB_board_data' => $DB_board_data];
		$this->template->content = View::forge('board/index', $data);
	}

	//發起團購的表單create.php
	public function get_create()
	{	
		$DB_store_data = Model_store::find('all');
		$data = ['DB_store_data' => $DB_store_data];
		$this->template->content = View::forge('board/create', $data);
	}
	//將發起團購的表單，存進資料庫
	public function post_create()
	{	
		//取得表單POST的值
		$board_name = input::post('board_name');
		$store_id = input::post('store_id');
		$end_time = input::post('end_time');

		//將接收到的資料存成陣列，並指定給$DB_board
		$DB_board = new Model_board();
		$DB_board->name = $board_name;
		$DB_board->store_id = $store_id;
		$DB_board->end_time = $end_time;

		//若有資料→存入資料庫；沒有則回傳存入不成功，在結束IF指令後回首頁
		if($DB_board->save()){
			Session::set_flash('success','Sucessful');
		}else{
			Session::set_flash('error','Unsucessful');
		}

		return Response::redirect('/');
	}

	//訂購功能member_add.php
	public function get_member_add()
	{
		//運用在index.php
		//公佈欄的ID(會同時有很多筆團購)
		//用法解釋:從routes.php取得member_add/:id的id的值，然後丟給資料庫，最後去前端，將宣告在「後端的'變數A'」名稱轉換給「前端的'變數B'」，然後'變數B'去指定要哪個欄位的東西
		$DB_board_id = $this->param('id');
		$DB_board_data = Model_Board::find($DB_board_id);


		//拿公佈欄的store_id,去找menu資料表的store_id欄位(呈現菜單)
		$DB_menu_data = Model_menu::find('all', [
			'where' => [
				'store_id' => $DB_board_data->store_id,//where menus資料表底下的 store_id欄位 = board資料表底下的 store_id欄位
			],
		]);			

		//公佈欄的store_id,去找store資料表的id欄位(呈現店名)
		$DB_store_data = Model_store::find('all',[
			'where' => [
				'id' => $DB_board_data->store_id,//where store資料表底下的 id欄位 = board資料表底下的 store_id欄位
			],
		]);

		$data = ['DB_boards_datas' => $DB_board_data, 'DB_menu_datas' => $DB_menu_data, 'DB_store_datas' => $DB_store_data,];

		//指派$DB_menus_data的值，到瀏覽器輸出
		$this->template->content = view::forge('board/member_add', $data);
	}

	//將訂購的結果傳至資料表儲存
	public function post_member_add()
	{
		//接收表單傳遞過來的值
		$username = input::post('username');
		$board_id = input::post('board_id');
		$store_id = input::post('store_id');
		$menu_ids = input::post('mycheckbox');

		foreach ($menu_ids as $menu_id) {

			//將接收到的資料存成陣列，並指定給$DB_store
			$DB_member = new Model_member();

			//指定資料表欄位負責儲存哪個接收到的資料
			$DB_member->name = $username;
			$DB_member->board_id = $board_id;
			$DB_member->store_id = $store_id;
			$DB_member->menu_id = $menu_ids;

			$DB_member->save();
		}

		Session::set_flash('success','Sucessful');
		return Response::redirect('/');
	}

	//檢視訂購結果
	public function get_order()
	{
		$DB_board_id = $this->param('id');
		$DB_board_data = Model_board::find($DB_board_id);
		

		//拿公佈欄的store_id,去找member資料表的store_id欄位(呈現菜單)
		$DB_member_data = Model_member::find('all', [
			'where' => [
				'store_id' => $DB_board_data->store_id,//where menus資料表底下的 store_id欄位 = board資料表底下的 store_id欄位
			],
		]);

		//拿公佈欄的store_id,去找menu資料表的store_id欄位(呈現菜單)
		$DB_menu_data = Model_menu::find('all', [
			'where' => [
				'store_id' => $DB_board_data->store_id,//where menus資料表底下的 store_id欄位 = board資料表底下的 store_id欄位
			],
		]);			

		//公佈欄的store_id,去找store資料表的id欄位(呈現店名)
		$DB_store_data = Model_store::find('all',[
			'where' => [
				'id' => $DB_board_data->store_id,//where store資料表底下的 id欄位 = board資料表底下的 store_id欄位
			],
		]);
		
		$data = ['DB_boards_datas' => $DB_board_data, 'DB_menu_datas' => $DB_menu_data, 'DB_store_datas' => $DB_store_data, 'DB_member_datas' =>$DB_member_data];

		//指派$data的值，到瀏覽器輸出
		$this->template->content = view::forge('board/order', $data);
	}
	//刪除訂購餐點
	public function post_order()
	{
		$member_id = input::post('member_id');
		if($member_id){

			//$store_id吻合member資料表下的store_id欄位的值
			$DB_member_data = Model_member::find('all',[
				'where' => [
					'id' => $member_id
				],
			]);

			//刪除資料
			foreach ($DB_member_data as $member) {
				$member->delete();
			}

			//判斷是否刪除成功
			Session::set_flash('success','刪除成功');
			return Response::redirect('/');
		}else{
			ession::set_flash('error','刪除失敗'.$member_id);
			return Response::redirect('/');
		}
	}

	//刪除功能index.php
	public function get_delete()
	{
		$board_id = $this->param('id');
		$DB_board_data = Model_board::find('all', [
			'where' => [
				'id' => $board_id,//where menus資料表底下的 store_id欄位 = sotre資料表底下的 id欄位
			],
		]);

		$data = ['DB_board_datas' => $DB_board_data];

		$this->template->content = view::forge('board/delete', $data);
	}

	//刪除發起揪團的資訊
	public function post_delete()
	{
		$board_id = input::post('board_id');
		if($board_id){
			
			//$board_id吻合board資料表下的board_id欄位的值
			$DB_board_data = Model_board::find('all',[
				'where' =>[
					'id' => $board_id
				],
			]);

			//刪除資料
			foreach ($DB_board_data as $board) {
				$board->delete();
			}

			Session::set_flash('success','刪除成功');
			return Response::redirect('/');
		}else{
			Session::set_flash('error','刪除失敗'.$board_id);
			return Response::redirect('/');
		}
	}
}
