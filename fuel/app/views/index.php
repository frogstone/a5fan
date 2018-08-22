<main class="outer ps_r">
	<div class="inner">
		<h1 class="hd1">オンライン英会話比較</h1>
		<button id="searchBtn" type="button" class="jsSearchBtn"><img src="images/ico_search.svg"></button>
		<div id="searchBox" class="full outer">
			<form action="#" method="post">
				<dl class="cf">
					<dt>並び順</dt>
					<dd>
						<select name="sort">
							<option value="人気順で表示">人気順で表示</option>
							<option value="人気順で表示">人気順で表示</option>
							<option value="人気順で表示">人気順で表示</option>
						 </select>
					</dd>
					<dt>条件</dt>
					<dd>
						<ul class="condition">
							<li><label><input type="checkbox" name="condition[]" value="">無料体験あり</label></li>
							<li><label><input type="checkbox" name="condition[]" value="">ネイティブ講師</label></li>
							<li><label><input type="checkbox" name="condition[]" value="">日本人講師</label></li>
							<li><label><input type="checkbox" name="condition[]" value="">チケット制度</label></li>
							<li><label><input type="checkbox" name="condition[]" value="">キッズ対応</label></li>
						</ul>
					</dd>
				</dl>
				<p class="ta_c"><button type="submit" class="btn"><span>15</span>件を表示</button></p>
			</form>
			<p class="ta_c close"><button type="button" class="jsSearchClose"></button></p>
		</div>
		<?php foreach($param["schools"] as $school): //Debug::dump($school);exit;?>
			<section class="full schoolList jsSchoolList cf">
				<div class="body">
					<h2 class="hd2">
						<?= $school["name"]; ?>
					</h2>
					<dl class="merit">
						<dt>無料体験</dt>
						<dd>
							<?= $school["freeTrial"]; ?>
						</dd>
					</dl>
					<section>
						<h3><span><?= $school["heading"]; ?></span></h3>
						<p class="sp detail">
							<?= $school["excerpt"]; ?>
						</p>
					</section>
				</div>
				<figure>
					<img src="images/15.jpg">
				</figure>
				<div class="detail">
					<?php $show=false;foreach(Config::get("C.school.flg") as $k => $v): if(!empty($school["flg".$k])): ?>
					<?php if(!$show): $show=true; ?>
					<ul class="feature detail">
						<?php endif; ?>
						<li>
							<a href="#">
								<?= $v ?>
							</a>
						</li>
						<?php endif;endforeach; ?>
						<?php if($show): ?>
					</ul>
					<?php endif; ?>
					<ul class="btns cf detail">
						<li><a href="#" target="_blank" class="btn green1">公式サイトへ</a></li>
						<li><a href="<?= Uri::base(false); ?>スクール詳細/<?= $school['name']; ?>" class="btn orange1">詳しくみる</a></li>
					</ul>
					<p class="bm"></p>
				</div>
			</section>
			<?php endforeach; ?>
	</div>
</main>
<div id="twitter_n_ranking" class="outer">
	<?php echo View::forge("twitter",array("num"=>10)); ?>
	<?php echo View::forge("ranking",array("num"=>10)); ?>
</div>
