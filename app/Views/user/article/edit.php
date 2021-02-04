<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <?php /** @var \App\Entities\Article $item */ ?>
    <div class="content-wrapper p-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form method="post">
              <div class="d-flex mb-3">
                <h1 class="h3 mb-0 mr-auto">Edit Article</h1>
                <a href="/user/article/" class="btn btn-outline-secondary ml-2">Back</a>
              </div>
              <label class="d-block mb-3">
                <span>Title</span>
                <input type="text" class="form-control" name="title" value="<?= esc($item->title) ?>" required>
              </label>
              <label class="d-block mb-3">
                <span>Category</span>
                <select name="category" class="form-control">
                  <?= implode('', array_map(function ($x) use ($item) {
                    return '<option ' . ($item->category === $x ? 'selected' : '') .
                      ' value="' . $x . '">' . ucfirst($x) . '</option>';
                  }, \App\Models\ArticleModel::$categories)) ?>
                </select>
              </label>
              <label class="d-block mb-3">
                <span>Content</span>
                <textarea id="summernote" name="content" class="form-control w-100"><?= esc($item->content) ?></textarea>
              </label>
              <div class="d-flex mb-3">
                <input type="submit" value="Save" class="btn btn-primary mr-auto">
                <?php if ($item->id) : ?>
                  <label for="delete-form" class="btn btn-danger mb-0"><i class="fa fa-trash"></i></label>
                <?php endif ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form method="POST" action="/user/article/delete/<?= $item->id ?>">
    <input type="submit" hidden id="delete-form" onclick="return confirm('Do you want to delete this article permanently?')">
  </form>
  <?= view('shared/summernote') ?>
</body>

</html>