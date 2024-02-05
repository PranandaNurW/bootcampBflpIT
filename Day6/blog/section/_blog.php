<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="me-lg-4">
					<div class="row gy-5">
						<?php foreach($blog_posts as $blog_post): ?>
						<div class="col-md-6" data-aos="fade">
							<article class="blog-post">
								<div class="rounded">
									<img loading="lazy" decoding="async" src="<?= $blog_post["image"] ?>" alt="Post Thumbnail">
								</div>
								<div class="pt-4">
									<div class="mb-3">
										<span class="badge bg-light text-dark p-2"><?= $blog_post["category"] ?? "Unknown" ?></span>
										<span class="mr-5 float-end">Author: <?= $blog_post["username"] ?? "Unknown" ?></span>
									</div>
									<h2 class="h4"><a class="text-black" href="blog_detail.php?id=<?= $blog_post["id"] ?>"><?= $blog_post["title"] ?></a></h2>
									<p><?= $blog_post["excerpt"] ?>…</p> <a href="blog_detail.php?id=<?= $blog_post["id"] ?>" class="text-primary fw-bold">Read More</a>
								</div>
							</article>
						</div>
						<?php endforeach; ?>
						<div class="col-12">
							<nav class="mt-4">
								<!-- pagination -->
								<!-- <nav class="mb-md-50">
									<ul class="pagination justify-content-center">
										<li class="page-item active "> <a href="blog.html" class="page-link">1</a>
										</li>
										<li class="page-item"> <a href="blog.html" class="page-link">2</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="blog.html" aria-label="Pagination Arrow"> <i class="fas fa-angle-right"></i>
											</a>
										</li>
									</ul>
								</nav> -->
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<!-- categories -->
				<div class="widget widget-categories">
					<h5 class="widget-title"><span>Category</span></h5>
					<ul class="list-unstyled widget-list">
						<li><a href="#!">Four seasone <small class="ml-auto">(1)</small></a>
						</li>
					</ul>
				</div>
				<!-- tags -->
				<div class="widget widget-tags">
					<h4 class="widget-title"><span>Tags</span></h4>
					<ul class="list-inline widget-list widget-list-inline taxonomies-list">
						<li class="list-inline-item"><a href="#!">Booth</a>
						</li>
					</ul>
				</div>
				<!-- latest post -->
				<div class="widget">
					<h5 class="widget-title"><span>Latest Article</span></h5>
					<!-- post-item -->
					<ul class="list-unstyled widget-list">
						<li class="d-flex widget-post align-items-center">
							<a class="text-black" href="/blog/elements/">
								<div class="widget-post-image flex-shrink-0 me-3">
									<img class="rounded" loading="lazy" decoding="async" src="images/blog/post-4.jpg" alt="Post Thumbnail">
								</div>
							</a>
							<div class="flex-grow-1">
								<h5 class="h6 mb-0"><a class="text-black" href="blog_detail.php">Elements That You Can Use To Create A New Post On This Template.</a></h5>
								<small>March 15, 2020</small>
							</div>
						</li>
					</ul>
				</div>
				<!-- Social -->
				<div class="widget">
					<h4 class="widget-title"><span>Social Links</span></h4>
					<ul class="list-unstyled list-inline mb-0 social-icons">
						<li class="list-inline-item me-3"><a title="Explorer Facebook Profile" class="text-black" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li class="list-inline-item me-3"><a title="Explorer Twitter Profile" class="text-black" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
						</li>
						<li class="list-inline-item me-3"><a title="Explorer Instagram Profile" class="text-black" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>