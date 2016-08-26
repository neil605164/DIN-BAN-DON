<div class="w3-card-4">
	<form class="w3-container" method="post" name="myform">
		<?php foreach ($DB_board_data as $board) { ?>
			<div class="w3-card-4 w3-padding">

				<header class="w3-container w3-light-grey">
					<h3><?= $board->name ?></h3>
				</header>

				<div class="w3-container">
					<p>截止時間:<?= $board->end_time ?></p>
					<br>

					<?php $store = Model_store::find($board->store_id); ?>
					<p><?= $store->name ?></p>
				</div>

				<p><a href="/member_add/<?= $board->id ?>" class="w3-btn-block w3-theme-l4">我也要訂</a></p>
				<p><a href="/order/<?= $board->id ?>" class="w3-btn-block w3-dark-grey">查詢訂購結果</a></p>
				<p><a href="/delete/<?= $board->id ?>" class="w3-btn-block w3-grey">訂餐截止</a></p>

			</div>
	<?php } ?>
	</form>
</div>