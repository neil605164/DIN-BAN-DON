<div class="w3-card-4">
	<?= Form::open(array('action' => 'menu', 'method' => 'post', 'style' => 'margin-left: 10px;margin-right: 10px')); ?>
		<p>
			<div class="w3-container w3-green">
			  	<h2>產品設定</h2>
			</div>
		</p>

	  	<p>
	  	<label class="w3-label">店家</label>
	  		<select class="form-control" id="sel1" name='store_id'>
				<?php foreach ($DB_store_data as $store){ ?>
					<option value="<?= $store->id ?>"><?= $store->name?></option>
				<?php } ?>
			</select><br>
		</p>		
				
		<label class="w3-label">菜單名稱</label>
		<input class="w3-input" type="text" name="food_name" required>

		<label class="w3-label">價格</label>
		<input class="w3-input" type="text" name="price" required>

		<button class="w3-btn w3-teal  w3-margin">直接儲存</button>
		<?= Html::anchor('/', '取消新增', ['class' => 'w3-btn w3-teal  w3-margin']); ?>
	<?php echo Form::close(); ?>
</div>