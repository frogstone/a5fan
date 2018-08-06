<h1 class="page-header">スクール削除</h1>
<p>このスクールを削除しますか？</p>
<form action="<?= Uri::base(false); ?>adminyy/school/delete_end/<?= $param["schoolId"] ?>" method="post">
	<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th>スクール名</th>
				<td><?= $param["name"] ?></td>
			</tr>
			<tr>
				<th>URL</th>
				<td><?= $param["url"] ?></td>
			</tr>
		</table>
		<p class="text-center"><button type="submit" class="btn btn-primary btn-lg">削除します</button></p>
	</div>
</form>