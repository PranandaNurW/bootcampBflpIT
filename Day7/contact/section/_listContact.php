<section class="section">
    <div class="container">
        <?php foreach ($contactViews as $data) {
            if ($contact->isBirthday($data["birthday"])) {
        ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Happy Birthday, <?= $data["name"] ?>!</strong> You should wish them a good luck!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-12 content">
                <div class="d-flex my-3 justify-content-end">
                    <div class="me-auto">
                        <a class="btn btn-success mx-1" href="addContact.php">Add</a>
                    </div>
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search username or email">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <form action="index.php?" method="GET">
                                <th>Name 
                                    <button class="badge text-bg-light p-0 border-0" type="submit" name="sort" value="name-asc">🔼</button>
                                    <button class="badge text-bg-light p-0 border-0" type="submit" name="sort" value="name-desc">🔽</button>
                                </th>
                            </form>
                            <form action="index.php?" method="GET">
                                <th>Email 
                                    <button class="badge text-bg-light p-0 border-0" type="submit" name="sort" value="email-asc">🔼</button>
                                    <button class="badge text-bg-light p-0 border-0" type="submit" name="sort" value="email-desc">🔽</button>
                                </th>
                            </form>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                        <?php foreach ($contactViews as $data) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data["name"] ?></td>
                                <td><?= $data["email"] ?></td>
                                <td><?= $data["phone"] ?></td>
                                <td><?= $data["birthday"] ?></td>
                                <td style="width: 250px;">
                                    <a class="btn btn-primary mx-1" href="editContact.php?id=<?= $data["id"] ?>">Edit</a>
                                    <a class="btn btn-danger mx-1" href="deleteContact.php?id=<?= $data["id"] ?>" onclick="return confirm('Are u Sure?');">Delete</a>
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