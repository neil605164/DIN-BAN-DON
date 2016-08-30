<div class="w3-card-4">

	<form class="w3-container" action="store" method="post" enctype="multipart/form-data">

		<p>
		<div class="w3-container w3-green">
			  	<h2>基本資料</h2>
		</div>
		</p>

		<label class="w3-label">店家名稱</label>
		<input class="w3-input" type="text" name="store_name" required>

		<label class="w3-label">店家電話</label>
		<input class="w3-input" type="text" name="store_tel" required>

		<label class="w3-label">店家地址</label>
		<input class="w3-input" type="text" name="store_addr" required>

		<p>
		<div class="w3-container w3-green">
	  		<h2>圖片上傳</h2>
		</div>
		</p>

		<label class="w3-label">上傳菜單</label>
		<input class="w3-input" type="file" name="file" required>

		<p>
		<div class="w3-container w3-green">
	  		<h2>其他資訊</h2>
		</div>
		</p>

		<label class="w3-label">類型</label>

		<p>
		<?php
			$menu = ['便當', '麵食', '素食', '飲料', '冰品', '小吃', '中式', '西式', '日式', '南洋', '餅類', '蛋糕', '麵包', '早點', '禮品', '甜點', '其他',];
			foreach ($menu as $value) {
		?>
			<input type="checkbox" value="<?= $value ?>" name="mycheckbox[]" >
			<label class="checkbox-inline"><?= $value ?></label>
		
		<?php } ?>
		</p>
		
		<button class="w3-btn w3-teal  w3-margin">存儲新增</button>
		<?= Html::anchor('/', '取消新增', ['class' => 'w3-btn w3-teal  w3-margin']); ?>
	</form>

</div>