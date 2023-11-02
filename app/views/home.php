<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div id="header" class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<!-- sidebar -->
			<div id="sidebar" class="col-md-2 mt-2 px-1 p-0 sidebar">
				<?php require_once __DIR__ . '/components/sidebar.php'; ?>
			</div>

			<div class="col-md-10 p-0">
				<div class="ms-2">

					<!-- search result -->
					<?php if(isset($_SESSION['search-input'])): ?>
						<div id="notify-search" class="mt-2 mb-3">
							<div class="bg-white rounded-2 p-3">
								<?php 
									$count = count($_SESSION['products']);

									if($count > 0) {
										echo "<span>Tìm thấy <strong>{$count}</strong> sản phẩm phù hợp với từ khóa \"</span><strong>{$_SESSION['search-input']}</strong>\"";
									}
									else {
										echo "<span>Không tìm thấy sản phẩm phù hợp với từ khóa \"</span><strong>{$_SESSION['search-input']}</strong>\"";
									}
								?>
							</div>
						</div>
					<?php endif ?>

					<!-- sort bar -->
					<?php if((isset($_SESSION['select-by-type']) && $_SESSION['select-by-type']) || isset($_SESSION['search-input'])): ?>
						<?php require_once __DIR__ . '/components/sort_bar.php'; ?>
					<?php else: ?>
						<div class="p-3 mt-2 mx-0 bg-white">
							<!-- newest products -->
							<h2 class="m-0"><strong>SẢN PHẨM MỚI NHẤT</strong></h2>

							<div class="m-4">
								<div class="row justify-content-around rounded-3 py-4" style="background-color: #d1e550;">
									<?php foreach($_SESSION['newest-products'] as $product): ?>
										<div class="col-md-3 p-0 shadow-lg">
											<?php
												$image = 'no_image.jpg';
												if(strlen($product['images']) > 0){
													$image = (explode(';', $product['images']))[0];
												}
											?>
											<div class="card w-100" style="width: 18rem;" id="product_<?= $product['id_product'] ?>">
												<a href="/view/item/<?= $product['id_product'] ?>" title="<?= $product['name'] ?>">
													<img src="/uploads/<?= $image ?>" class="card-img-top" alt="<?= $product['name'] ?>">
												</a>
												<div class="card-body p-3">
													<a href="/view/item/<?= $product['id_product'] ?>">
														<h4 class="card-title m-0 item-title"><?= $product['name'] ?></h4>
														<div class="d-flex justify-content-between mt-3 mb-2 item-text">
															<strong>
																<?= $product['price'] ?>
																<span><u>đ</u></span>
															</strong>
															<p class="m-0">Đã bán 100</p>
														</div>
													</a>
													<div class="text-center">
														<button class="btn btn-fill-primary">Thêm vào giỏ</button>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php endif ?>

					<?php if(!isset($_SESSION['search-input'])): ?>
						<div id="products" class="row products p-3 mt-3 mx-0 bg-white">
							<h2 class="m-0"><strong>GỢI Ý HÔM NAY</strong></h2>

							<!-- products -->
							<?php foreach($_SESSION['products'] as $product): ?>
								<div class="col-md-3 mt-3 px-2">
									<?php
										$image = 'no_image.jpg';
										if(strlen($product['images']) > 0){
											$image = (explode(';', $product['images']))[0];
										}
									?>
									<div class="card w-100" style="width: 18rem;" id="product_<?= $product['id_product'] ?>">
										<a href="/view/item/<?= $product['id_product'] ?>" title="<?= $product['name'] ?>">
											<img src="/uploads/<?= $image ?>" class="card-img-top" alt="<?= $product['name'] ?>">
										</a>
										<div class="card-body p-3">
											<a href="/view/item/<?= $product['id_product'] ?>">
												<h4 class="card-title m-0 item-title"><?= $product['name'] ?></h4>
												<div class="d-flex justify-content-between mt-3 mb-2 item-text">
													<strong>
														<?= $product['price'] ?>
														<span><u>đ</u></span>
													</strong>
													<p class="m-0">Đã bán 100</p>
												</div>
											</a>
											<div class="text-center">
												<button class="btn btn-fill-primary">Thêm vào giỏ</button>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					<?php endif ?>

				</div>

				<!-- footer -->
				<div id="footer" class="container mt-3 bg-white rounded-top-2">
					<?php require_once __DIR__ . '/components/footer.php'; ?>
				</div>

			</div>
		</div>
	</div>
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
