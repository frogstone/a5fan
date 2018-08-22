<main class="outer">
	<div class="inner schoolDetail">
		<div id="h1_n_pz">
			<h1 class="hd1 cap ps_r"><?= $param["school"]["name"]; ?><span class="bm"></span></h1>
			<nav id="pz" class="full">
				<ul>
					<li><a class="icon-home" href="<?= Uri::base(false); ?>"><span class="sp_n">オンライン英会話比較</span></a></li>
					<li><?= $param["school"]["name"]; ?></li>
				</ul>
			</nav>
		</div>
		<div class="intro cf">
			<section class="explanation">
				<h2 class="hd4"><?= $param["school"]["heading"]; ?></h2>
				<p><?= $param["school"]["excerpt"]; ?></p>
				<section>
					<h3 class="hd3"><span><?= $param["school"]["spTitle1"]; ?></span></h3>
					<p><?= $param["school"]["spText1"]; ?></p>
				</section>
				<section>
					<h3 class="hd3"><span><?= $param["school"]["spTitle2"]; ?></span></h3>
					<p><?= $param["school"]["spText2"]; ?></p>
				</section>
				<section>
					<h3 class="hd3"><span><?= $param["school"]["spTitle3"]; ?></span></h3>
					<p><?= $param["school"]["spText3"]; ?></p>
				</section>
			</section>
			<div class="figure">
				<?php if(!empty($param["school"]["v_imgTag"])): ?>
					<figure class="mainBnr"><?= $param["school"]["v_imgTag"] ?></figure>
				<?php endif; ?>
				<p class="btnWrap"><a href="#" target="_blank" class="btn green1">公式サイトへ移動</a></p>
				<table class="feature">
					<tr>
						<th>無料レッスン</th>
						<td>
							<?= $param["school"]["freeTrial"]; ?>
						</td>
					</tr>
					<tr>
						<th>ネイティブ講師</th>
						<td>
							<?= $param["school"]["v_flgNative"]; ?>
						</td>
					</tr>
					<tr>
						<th>日本人講師</th>
						<td>
							<?= $param["school"]["v_flgJapanese"]; ?>
						</td>
					</tr>
					<tr>
						<th>キッズ向け</th>
						<td>
							<?= $param["school"]["v_flgKids"]; ?>
						</td>
					</tr>
					<tr>
						<th>レッスン時間</th>
						<td>
							<?= $param["school"]["v_time"]; ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php if(file_exists(APPPATH."views/price/".$param["school"]["id"].".php")): ?>
		<section id="price" class="cf">
			<h2 class="hd5"><span class="sp_n"><?= $param["school"]["name"]; ?>の</span>レッスン料金</h2>
			<?php echo View::forge("price/".$param["school"]["id"]); ?>
		</section>
		<?php endif; ?>
		<p class="btnWrap"><a href="#" target="_blank" class="btn green1">公式サイトへ移動</a></p>
	</div>
</main>
<div id="twitter_n_ranking" class="outer">
	<?php echo View::forge("twitter",array("num"=>10)); ?>
	<?php echo View::forge("ranking",array("num"=>10)); ?>
</div>
