<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th class="col-md-4">画像</th>
				<td><?php echo $param["v_imgTag"] ?></td>
			</tr>			
			<tr>
				<th class="col-md-4">スクール名</th>
				<td><?= $param["name"] ?></td>
			</tr>
			<tr>
				<th>URL</th>
				<td><?= $param["url"] ?></td>
			</tr>
			<tr>
				<th>見出し</th>
				<td><?= $param["heading"] ?></td>
			</tr>
			<tr>
				<th>概要</th>
				<td><?= $param["excerpt"] ?></td>
			</tr>
<?php for($i=1; $i<=3; $i++): ?>
			<tr>
				<th>セールスポイントタイトル<?= $i ?></th>
				<td><?= $param["spTitle".$i] ?></td>
			</tr>
			<tr>
				<th>セールスポイントテキスト<?= $i ?></th>
				<td><?= $param["spText".$i] ?></td>
			</tr>
<?php endfor; ?>
			<tr>
				<th>無料体験回数</th>
				<td><?= $param["freeTrial"] ?></td>
			</tr>
			<tr>
				<th>レッスン時間</th>
				<td>
					<?php for($i=1; $i<=3; $i++): ?>
						<? if(!empty($param["time".$i."Label"]) or !empty($param["time".$i])): ?>
						<?= $param["time".$i."Label"].$param["time".$i] ?><br>
						<? endif; ?>
					<?php endfor; ?>
				</td>
			</tr>
			<tr>
				<th>創設</th>
				<td><?= $param["establishedTime"] ?></td>
			</tr>
			<tr>
				<th>検索条件</th>
				<td>
					<?php foreach($param["flg"] as $k => $v): if(!empty($param["v_flg".$k])): ?>
					<?= $param["v_flg".$k] ?><br>
					<?php endif;endforeach; ?>
				</td>
			</tr>
		</table>
	</div>
