<div class="w3-card-4">
	<form class="w3-container" method="post" name="myform" action="delete">
		<p>
			<?php $store_id=0; foreach ($DB_store_datas as $store) { ?>
				<div class="w3-container w3-green">
				  	<h2><?= $store->name; ?></h2>
				</div>
			<?php $store_id=$store->id; } ?>
		</p>

		<?php //宣告$store_id，儲存menu資料表內的store_id，最後透過hidden傳給post_view方法去執行
		$menu_id=0; foreach ($DB_menu_datas as $menu) { ?>
			<p>
			
			<input type="checkbox" value="<?= $menu->id ?>" name="mycheckbox[]" >
			<label class="checkbox-inline"><?= $menu->name ?></label>||
			<label class="checkbox-inline"><?= $menu->price ?></label>元
			</p>
		<?php $menu_id=$menu->id; } ?>

		<input type="text" name="username" required>(RD1-柚子)<br>
		<input type="hidden" value="<?= $DB_boards_datas->id ?>" name="board_id" >
		<input type="hidden" value="<?=$store_id ?>" name="store_id" >
		<button class="w3-btn w3-teal  w3-margin" >儲存資料</button>
	</form>

</div>