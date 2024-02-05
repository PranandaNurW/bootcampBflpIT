<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h4>Edit Blog</h4>
                <div class="contact-form mt-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="blog-id" value="<?= $blog_post["id"] ?>">
                        <input type="hidden" name="old-image" value="<?= $blog_post["image"] ?>">
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control shadow-none" name="blog-title" value="<?= $blog_post["title"] ?>">
                        </div>
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Content</label>
                            <textarea class="form-control shadow-none" name="blog-body"><?= $blog_post["body"] ?></textarea>
                        </div>
                        <img src="<?= $blog_post["image"] ?>" class="mb-3">
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control shadow-none" name="blog-image"></input>
                        </div>
                        <button class="btn btn-secondary float-end" type="submit" name="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>