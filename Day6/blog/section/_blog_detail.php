<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="mb-5">
          <h2 class="mb-4" style="line-height:1.5"><?= $blog_post["title"] ?></h2>
          <!-- <span>15 March 2020 <span class="mx-2">/</span> </span> -->
          <p class="list-inline-item">Category : <a href="#!" class="ml-1"><?= $blog_post["category"] ?> </a>
          </p>
          <p class="list-inline-item">Author : <a href="#!" class="ml-1"><?= $blog_post["username"] ?> </a>
          </p>
        </div>
        <div class="mb-5 text-center">
          <div class="rounded overflow-hidden">
            <img loading="lazy" decoding="async" src="<?= $blog_post["image"] ?>" alt="Post Thumbnail">
          </div>
        </div>
        <div class="content">
          <p><?= $blog_post["body"] ?></p>
          <hr>
        </div>
      </div>
    </div>
  </div>
</section>