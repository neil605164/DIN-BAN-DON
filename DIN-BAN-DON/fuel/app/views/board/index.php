<div class="w3-card-4">
	<?= Form::open(['myform' => '/create', 'method' => 'post', 'class' => 'w3-container']); ?>
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
				<p><?= Html::anchor('member_add/' . $board->id, '我也要訂', ['class' => 'w3-btn-block w3-theme-l4']); ?></p>
				<p><?= Html::anchor('order/' . $board->id, '查詢訂購結果', ['class' => 'w3-btn-block w3-dark-grey']); ?></p>
				<p><?= Html::anchor('delete/' . $board->id, '訂餐截止', ['class' => 'w3-btn-block w3-grey']); ?></p>
			</div>
		<?php } ?>
	<?php echo Form::close(); ?>
</div>