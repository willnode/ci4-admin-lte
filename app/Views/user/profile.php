<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>

    <?php /** @var \App\Entities\User $item */ ?>
    <div class="content-wrapper p-4">
      <div class="container" style="max-width: 540px;">
        <div class="card">
          <div class="card-body">
            <form enctype="multipart/form-data" method="post">
              <div class="d-flex mb-3">
                <h1 class="h3 mb-0 mr-auto">Edit Profile</h1>
                <a href="/user/" class="btn btn-outline-secondary ml-2">Back</a>
              </div>
              <label class="d-block mb-3">
                <span>Full Name</span>
                <input type="text" class="form-control" name="name" value="<?= esc($item->name) ?>" required>
              </label>
              <label class="d-block mb-3">
                <span>Email</span>
                <input type="text" class="form-control" name="email" value="<?= esc($item->email) ?>" required>
              </label>
              <label class="d-block mb-3">
                <span>Avatar</span>
                <?= view('shared/file', [
                  'value' => $item->avatar,
                  'name' => 'avatar',
                  'path' => 'avatar',
                  'disabled' => false,
                ]) ?>
              </label>
              <label class="d-block mb-3">
                <span>Password</span>
                <input type="password" class="form-control" name="password" placeholder="<?= $item->id ? 'Only enter when you want to change your password' : '" required="required' ?>">
              </label>
              <div class="d-flex mb-3">
                <input type="submit" value="Save" class="btn btn-primary mr-auto">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>