<?php

class Controller_Insert extends Controller_Template
{
	public function before()
	{
		parent::before(); // 沒有這一行，樣板不會運作！
		$this->template->title = 'LAI JIA BAN DON';
		$this->template->login = View::forge('user/login');
		$this->template->register = View::forge('user/register');
	}

	public function get_store()
	{
		$this->template->content = View::forge('insert/store');	
	}

	public function post_store()
	{	
		//接收表單傳遞過來的值
		$store_name = input::post('store_name');
		$store_tel = input::post('store_tel');
		$store_add = input::post('store_addr');
		$mycheckbox = input::post('mycheckbox');

		// 自訂此上傳的配置
		$config = array(
		    'path' => DOCROOT.'files',
		    'randomize' => true,
		    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);

		//將接收到的資料存成陣列，並指定給$DB_store
		$DB_store = new Model_store();

		// 處理 $_FILES 中上傳的檔案
		Upload::process($config);

		//判斷get_files有沒有抓到值
		if(Upload::get_files()){

			// 如果有任何有效檔案
			if (Upload::is_valid())
			{
				// 儲存上傳檔案
			    Upload::save();

				//取得第一個上傳的檔案，並指定給$file
				$file = Upload::get_files(0);

				//store資料庫的photo欄位去存取檔案完整名稱
				$DB_store->photo = $file['saved_as'];
			    
			    Session::set_flash('success','Sucessful');

			}else{
				Session::set_flash('error','Unsucessful');
			}
		}

		//指定資料表欄位負責儲存哪個接收到的資料
		$DB_store->name = $store_name;
		$DB_store->tel = $store_tel;
		$DB_store->addr = $store_add;
		$DB_store->type = implode(",",$mycheckbox);

		//若有資料→存入資料庫；沒有則回傳存入不成功，在結束IF指令後回首頁
		if($DB_store->save()){
			Session::set_flash('success','Sucessful');
		}else{
			Session::set_flash('error','Unsucessful');
		}
		return Response::redirect('store');
	}

	public function get_menu()
	{	
		$DB_store_data = Model_store::find('all');
		$data = ['DB_store_data' => $DB_store_data];

		//指派$DB_store_data的值，到瀏覽器輸出
		$this->template->content = view::forge('insert/menu', $data);
	}

	public function post_menu()
	{
		//取得表單POST的值
		$store_id = input::post('store_id');
		$food_name = input::post('food_name');
		$price = input::post('price');

		//將接收到的資料存成陣列，並指定給$DB_menu
		$DB_menu = new Model_menu();
		$DB_menu->store_id = $store_id;
		$DB_menu->name = $food_name;
		$DB_menu->price = $price;

		//若有資料→存入資料庫；沒有則回傳存入不成功，在結束IF指令後回首頁
		if($DB_menu->save()){
			Session::set_flash('success','Sucessful');
		}else{
			Session::set_flash('error','Unsucessful');
		}

		return Response::redirect('insert/menu');
	}

	public function get_show_store()
	{
		$DB_store_data = Model_store::find('all');
		$data = ['DB_store_data' => $DB_store_data];

		//指派$DB_store_data的值，到瀏覽器輸出
		$this->template->content = view::forge('insert/show_store', $data);
	}

	//$id內的值，由show_store.php那裡的localhost/insert/view/ <?= $store->id ?//>
	public function get_view()
	{
		$store_id = $this->param('id');
		$DB_menus_data = Model_Menu::find('all', [
			'where' => [
				'store_id' => $store_id,//where menus資料表底下的 store_id欄位 = sotre資料表底下的 id欄位
			],
		]);
		$data = ['DB_menus_data' => $DB_menus_data];

		//指派$DB_menus_data的值，到瀏覽器輸出
		$this->template->content = view::forge('insert/view', $data);
	}

	public function post_view()
	{
		$store_id = input::post('store_id');
		$menu_name = input::post('name');
		$menu_price = input::post('price');

		if($store_id){
			$DB_menus_data = Model_Menu::find('all',[
				'where' =>[
					'store_id' => $store_id
				],
			]);

			$i = 0;
			foreach ($DB_menus_data as $menu) {
				//將接收到的資料存成陣列，並指定給$menu
				$menu->name = $menu_name[$i];
				$menu->price = $menu_price[$i];

				//若有資料→存入資料庫；沒有則回傳存入不成功，在結束IF指令後回首頁
				$menu->save();

				$i++;
			}
			Session::set_flash('success','修改成功');
		}
		return Response::redirect('view/'.$store_id);
	}

	public function post_delete()
	{
		$store_id = input::post('store_id');
		if($store_id){
			
			//$store_id吻合menu資料表下的store_id欄位的值
			$DB_menus_data = Model_Menu::find('all',[
				'where' =>[
					'store_id' => $store_id
				],
			]);

			//刪除資料
			foreach ($DB_menus_data as $menu) {
				$menu->delete();
			}

			//$store_id吻合store資料表下的id欄位的值
			$store = Model_store::find($store_id);
			$store->delete();
			Session::set_flash('success','刪除成功');
			return Response::redirect('/');
		}else{
			Session::set_flash('error','刪除失敗'.$store_id);
			return Response::redirect('view/'.$store_id);
		}
	}
}
