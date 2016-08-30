<h2>i'm in delete</h2>
<div class="w3-card-4 ">
	<?php $board_id=0; foreach ($DB_board_datas as $board){ ?>
	<?php $board_id = $board->id; } ?>
	<?= Form::open(['action' => 'delete/' . $board->id, 'method' => 'post']); ?>
		<p>
		<div class="w3-container w3-green">
			<h2>刪除資料</h2>
		</div>
		</p>

		<div class="w3-card-4">

			<?php $board_id=0; foreach ($DB_board_datas as $board){ ?>
				<input type='text' name=board_name value="<?= $board->name ?>" readonly><br>
				<button class="w3-btn w3-teal  w3-margin">刪除資料</button>
			<?php $board_id = $board->id; } ?>
			<input type='hidden' name=board_id value="<?= $board->id?>">
			<input type='text' name=board_id value="<?= $board->id?>">
		</div>

	<?php echo Form::close(); ?>
</div>