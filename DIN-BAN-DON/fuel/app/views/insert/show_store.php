<div class="w3-card-4">

	<?php foreach ($DB_store_data as $store){ ?>
		<li>
			<?= Html::anchor('view/' . $store->id, $store->name); ?>
		</li>
	<?php } ?>
</div>
