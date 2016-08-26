<div class="w3-card-4">

	<?php foreach ($DB_store_data as $store){ ?>
		<li>
			<a href="/view/<?= $store->id ?>"><?= $store->name ?></a>
		</li>
	<?php } ?>
</div>
