<h1 class="page-header">スクール詳細</h1>
<form action="<?= Uri::base(false); ?>adminyy/school/detail/<?= $param["schoolId"] ?>" method="post">
	<?php echo View::forge("admin/school_spec",array("param" => $param)); ?>
	<p class="text-center">
		<button type="submit" class="btn btn-success btn-sm" name="edit" value="1">編集</button>
		<button type="submit" class="btn btn-danger btn-sm" name="delete" value="1">削除</button>
	</p>
</form>
