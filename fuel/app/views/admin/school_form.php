<h1 class="page-header">スクール登録フォーム</h1>
<form action="<?= Uri::base(false); ?>adminyy/school/end/<?= $param["schoolId"] ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>スクール名</th>
				<td><input type="text" name="name" value="<?= $param["name"] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>URL</th>
				<td><input type="text" name="url" value="<?= $param["url"] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>画像</th>
				<td>
					<input type="text" name="img" value="<?= $param["img"] ?>" class="form-control"><br>
					<input type="file" name="upload">
				</td>
			</tr>
			<tr>
				<th>見出し</th>
				<td><input type="text" name="heading" value="<?= $param["heading"] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>概要</th>
				<td><textarea name="excerpt" rows="5" class="form-control"><?= $param["excerpt"] ?></textarea></td>
			</tr>
<?php for($i=1; $i<=3; $i++): ?>
			<tr>
				<th>セールスポイントタイトル<?= $i ?></th>
				<td><input type="text" name="spTitle<?= $i ?>" value="<?= $param["spTitle".$i] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>セールスポイントテキスト<?= $i ?></th>
				<td><textarea name="spText<?= $i ?>" rows="5" class="form-control"><?= $param["spText".$i] ?></textarea></td>
			</tr>
<?php endfor; ?>
			<tr>
				<th>無料体験回数</th>
				<td><input type="text" name="freeTrial" value="<?= $param["freeTrial"] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>レッスン時間</th>
				<td>
					<table>
					<?php for($i=1; $i<=3; $i++): ?>
						<tr>
							<td><input type="text" name="time<?=$i?>Label" value="<?= $param["time".$i."Label"] ?>" class="form-control" size="8"></td>
							<td><input type="text" name="time<?=$i?>" value="<?= $param["time".$i] ?>" class="form-control"></td>
						</tr>
					<?php endfor; ?>
					</table>
				</td>
			</tr>
			<tr>
				<th>創設</th>
				<td><input type="text" name="establishedTime" value="<?= $param["establishedTime"] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>検索条件</th>
				<td>
					<?php foreach($param["flg"] as $k => $hush): ?>
					<label><input type="checkbox" name="flg<?= $k ?>" value="1" <?php if($hush["value"]) echo ' checked'; ?>> <?= $hush["label"] ?></label><br>
					<?php endforeach; ?>
				</td>
			</tr>
		</table>
		<p class="text-center"><button type="submit" class="btn btn-primary btn-lg">送信</button></p>
	</div>
</form>