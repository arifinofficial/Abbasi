<?php $active='about'; $title = 'Tentang | Abbasi Textile';?>
<?php ob_start() ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(assets/img/banner-04.jpg);">
		<h2 class="l-text2 t-center">
			Tentang
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="assets/img/kategori/katun.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Tentang Kami
					</h3>

					<p class="p-b-28">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod aliquam nisl ultrices rutrum. Mauris sem enim, varius sed libero sodales, ultricies dictum lorem. Nulla lectus mauris, maximus id justo ut, tempus pretium neque. Fusce pulvinar ultricies nisl, sit amet molestie sem. Etiam elit quam, ornare at commodo quis, porta id libero. Fusce iaculis dui mi, a dictum elit mattis egestas. Aenean feugiat nibh eget consequat congue. Ut id est pharetra, consectetur lectus auctor, maximus ligula. Donec dignissim mauris et faucibus euismod.
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
							Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
						</p>

						<span class="s-text7">
							- Steve Job’s
						</span>
					</div>
				</div>
			</div>
		</div>
    </section>

<?php $content = ob_get_clean() ?>
<?php include 'template/main.php'; ?>