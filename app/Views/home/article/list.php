<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('home/navbar') ?>
    <div class="content-wrapper p-4">
      <div class="row">
        <?php /** @var \App\Entities\Article[] $data */ ?>
        <?php foreach ($data as $item) : ?>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h3 class="card-head mb-3"><a href="/article/<?= $item->id?>/"><?= esc($item->title) ?></a></h3>
                <div class="text-gray mb-2"><?= $item->updated_at->toDateString() ?></div>
                <p><?= $item->getExcerpt() ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</body>

</html>