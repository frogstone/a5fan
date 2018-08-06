<h1 class="page-header">Schools</h1>
<form action="<?= Uri::base(false); ?>adminyy/school/form" method="post" class="text-right">
	<button type="submit" class="btn btn-primary">追加</button>
</form>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>スクール名</th>
				<th>URL</th>
				<th>Header</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($param["schools"] as $school): ?>
			<tr>
				<td><?= $school["name"] ?></td>
				<td><a href="<?= $school["url"] ?>" target="_blank"><?= $school["url"] ?></a></td>
				<td>
					<form action="<?= Uri::base(false); ?>adminyy/school/detail/<?= $school["schoolId"] ?>" method="post">
						<button type="submit" class="btn btn-info btn-sm">詳細</button>						
						<button type="submit" class="btn btn-success btn-sm" name="edit" value="1">編集</button>
						<button type="submit" class="btn btn-danger btn-sm" name="delete" value="1">削除</button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
