<!DOCTYPE html>
<html lang="en">

<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <div class="content-wrapper p-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <?php /** @var \App\Entities\Article[] $data */ ?>
            <div class="d-flex">
              <form method="get" class="btn-group">
                <?= implode('', array_map(function ($x) {
                  return '<button type="submit" name="category" class="btn ' . (($_GET['category'] ?? '') === $x ? ' btn-primary active' : 'btn-outline-primary') .
                    '" value="' . $x . '">' . ucfirst($x) . '</button>';
                }, \App\Models\ArticleModel::$categories)) ?>
              </form>
              <div class="ml-auto">
                <?= view('shared/button', [
                  'actions' => ['add'],
                  'target' => '',
                  'size' => 'btn-lg'
                ]); ?>
              </div>
            </div>
            <?= view('shared/table', [
              'data' => $data,
              'columns' => [
                'Title' => function (\App\Entities\Article $x) {
                  return $x->title;
                },
                'Author' => function (\App\Entities\Article $x) {
                  return $x->user->name;
                },
                'Updated' => function (\App\Entities\Article $x) {
                  return $x->updated_at;
                },
                'Edit' => function (\App\Entities\Article $x) {
                  return view('shared/button', [
                    'actions' => ['edit'],
                    'target' => $x->id,
                    'size' => 'btn-sm'
                  ]);
                }
              ]
            ]) ?>
            <?= view('shared/pagination') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>