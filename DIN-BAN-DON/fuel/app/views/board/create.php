<div class="w3-card-4 ">

	<form class="" action="/create" method="post" style="margin-left: 10px;margin-right: 10px";>
		<p>
			<div class="w3-container  w3-green ">
			  	<h2>假奔啦</h2>
			</div>
		</p>
	
				
		<label class="w3-label">標題(單位名稱)RD-1</label>
		<input class="w3-input" type="text" name="board_name" required>

		<p>
	  	<label class="w3-label">店家名稱</label>
	  		<select class="form-control" id="sel1" name='store_id'>
				<?php foreach ($DB_store_data as $store){ ?>
					<option value="<?= $store->id ?>"><?= $store->name?></option>
				<?php } ?>
			</select><br>
		</p>

		<label class="w3-label">截止時間</label>
		<input type="text" name="end_time" required>
		<br>
		<button class="w3-btn w3-teal  w3-margin">直接儲存</button>
	</form>
</div>