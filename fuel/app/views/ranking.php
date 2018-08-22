<section class="ranking">
	<h2 class="hd1 brown1 ranking">ランキング</h2>
	<?php for($i=0; $i<$num; $i++): ?>
	<section class="full schoolList rank cf">
		<a href="#">
			<div class="body">
				<h3>DMM英会話</h3>
				<p>満足度4部門でNo.1獲得。毎日話せる英会話レッスン</p>
			</div>
<?php if(!empty($param["school"]["v_imgTag"])): ?>
			<figure><?= $param["school"]["v_imgTag"] ?></figure>
<?php endif; ?>
		</a>
	</section>
	<?php endfor; ?>
</section>
