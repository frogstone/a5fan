<div class="outer parent cf">
	<main class="inner">
		<div class="schoolDetail">
			<h1 class="hd1 blue full ps_r"><?= $param["school"]["name"]; ?><span class="icon-folder-plus"></span></h1>
			<nav id="pz" class="full">
				<ul>
					<li><a class="icon-home" href="<?= Uri::base(false); ?>"><span class="sp_n">オンライン英会話比較</span></a></li>
					<li>
						<?= $param["school"]["name"]; ?>
					</li>
				</ul>
			</nav>
			<section class="intro">
				<div class="text">
					<h2 class="hd2 blue">
						<?= $param["school"]["heading"]; ?>
					</h2>
					<?php if(!empty($param["school"]["v_imgTag"])): ?>
						<figure class="mainBnr"><?= $param["school"]["v_imgTag"] ?></figure>
					<?php endif; ?>
					<p>
						<?= $param["school"]["excerpt"]; ?>
					</p>
					<p><a href="#" target="_blank" class="btn green ws_nw">公式サイト</a></p>
				</div>
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
			</section>
			<section class="cl_b pc_colum3 cf">
				<h2 class="hd1 dgray">
					<?= $param["school"]["name"]; ?>の特長</h2>
				<section class="child">
					<h2 class="hd2 blue">
						<?= $param["school"]["spTitle1"]; ?>
					</h2>
					<p>
						<?= $param["school"]["spText1"]; ?>
					</p>
				</section>
				<section class="child">
					<h2 class="hd2 blue">
						<?= $param["school"]["spTitle2"]; ?>
					</h2>
					<p>
						<?= $param["school"]["spText2"]; ?>
					</p>
				</section>
				<section class="child">
					<h2 class="hd2 blue">
						<?= $param["school"]["spTitle3"]; ?>
					</h2>
					<p>
						<?= $param["school"]["spText3"]; ?>
					</p>
				</section>
			</section>
			<?php if(file_exists(APPPATH."views/price/".$param["school"]["id"].".php")): ?>
			<section>
				<h2 class="hd1 dgray">レッスン料金</h2>
				<?php echo View::forge("price/".$param["school"]["id"]); ?>
			</section>
			<?php endif; ?>
			<p class="btnWrap"><a href="#" target="_blank" class="btn green">イングレッシュベル英会話へ</a></p>
		</div>
	</main>
	<div id="tw_n_ranking">
		<section class="tw">
			<h2 class="hd1 blue full">twitterの反応</h2>
			<ul class="tweets full">
				<?php echo View::forge("twitter",array("num"=>10)); ?>
			</ul>
		</section>
		<section class="ranking">
			<h2 class="hd1 blue mb_0 full">ランキング</h2>
			<?php echo View::forge("ranking",array("num"=>10)); ?>
		</section>
	</div>
</div>
