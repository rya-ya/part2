<h1>読書ログ</h1>
<a href="new.php" class="btn btn-primary mb-4">読書ログを登録する</a>
<main>
<?php if($reviews): ?>
  <?php foreach($reviews as $review): ?>
    <section class="card shadow-sm mb-4">
      <div class="card-body">
        <h2 class="card-title h4 mb-4"><?php echo escape($review['title']); ?></h2>
        <div><?php echo escape($review['author']); ?>&nbsp;/&nbsp;<?php echo escape($review['status']); ?>&nbsp;/&nbsp;<?php echo escape($review['score']); ?>点</div>
        <p><?php echo escape($review['summary']) ?></p>
      </div>
    </section>
  <?php endforeach; ?>
<?php else: ?>
  <p>読書ログがありません</p>
<?php endif; ?>
</main>
