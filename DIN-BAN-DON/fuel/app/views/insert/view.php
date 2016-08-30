<div class="w3-card-4">
	<?= Form::open(array('action' => '/view', 'method' => 'post', 'class' => 'w3-container')); ?>
		<p>
			<div class="w3-container w3-green">
			  	<h2>菜單</h2>
			</div>
		</p>


		<?php //宣告$store_id，儲存menu資料表內的store_id，最後透過hidden傳給post_view方法去執行
		$store_id=0; foreach ($DB_menus_data as $menu) { ?>
			<p>
			<input type="text" value="<?= $menu->name ?>" name="name[]" >,
			<input type="text" value="<?= $menu->price ?>" name="price[]" >元<br>
			</p>
		<?php $store_id=$menu->store_id; } ?>
		<input type="hidden" value="<?= $store_id ?>" name="store_id" >
		<button class="w3-btn w3-teal  w3-margin" onclick="update()">存儲修改</button>
	<?php echo Form::close(); ?>
	
	<?= Form::open(array('action' => '/delete', 'method' => 'post', 'class' => 'w3-container')); ?>
		<button class="w3-btn w3-teal  w3-margin" onclick="dd()">資料刪除</button>
	<?php echo Form::close(); ?>
</div>
