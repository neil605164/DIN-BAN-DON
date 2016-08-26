<div class="w3-card-4">
	<form class="w3-container" method="post" action="order">

		<p>
			<?php foreach ($DB_store_datas as $store) { ?>
				<div class="w3-container w3-green">
					<h1><?= $DB_boards_datas->name ?>發起的---<?= $store->name; ?></h1>
				</div>
			<?php } ?>
		</p

		<?php foreach ($DB_member_datas as $member) { 
			$menu = Model_Menu::find($member->menu_id)?>
			<p><input type="checkbox" value="<?= $member->id ?>" name="member_id" ><?= $member->name ?>--<?= $menu->name ?>...<?= $menu->price ?></p>
		<?php } ?>

		<button class="w3-btn w3-teal  w3-margin">刪除訂購</button>
	</form>
</div>
 
 
 
