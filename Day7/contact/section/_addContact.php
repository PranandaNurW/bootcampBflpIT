<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h4>Add Contact</h4>
                <div class="contact-form mt-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control shadow-none" name="name" required>
                        </div>
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control shadow-none" name="email" required>
                        </div>
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control shadow-none" name="phone" required
                            pattern="[0][0-9]{12}" title="Phone number with 0 and remaining 12 digit with 0-9">
                        </div>
                        <div class="form-group mb-4 pb-2">
                            <label class="form-label">Birthday</label>
                            <input type="date" class="form-control shadow-none" name="birthday" required>
                        </div>
                        <button class="btn btn-primary float-end" type="submit" name="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>