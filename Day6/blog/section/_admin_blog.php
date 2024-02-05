<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 content">
                <div class="float-end mb-3">
                    <a class="btn btn-primary mx-1" href="admin_add.php">Add</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($blog_posts as $blog_post): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $blog_post["title"] ?></td>
                            <td style="width: 250px;">
                                <a class="btn btn-secondary mx-1" href="admin_edit.php?id=<?= $blog_post["id"] ?>">Edit</a>
                                <a class="btn btn-danger mx-1" href="admin_delete.php?id=<?= $blog_post["id"] ?>" onclick="return confirm('Are u Sure?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
