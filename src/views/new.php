<h1 class="h2 text-dark mt-4 mb-4 pb-4 border-bottom"><a href="index.php" class="text-body text-decoration-none">読書ログ</a></h1>
<h2>読書ログの登録</h2>
<form action="create.php" method="post">
  <div>
    <?php if(count($errors)) : ?>
      <ul class="text-danger">
        <?php foreach($errors as $error) : ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="title">書籍名</label>
    <input type="text" name="title" id="title" value="<?php echo $review['title'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">著者名</label>
    <input type="text" name="author" id="author" value="<?php echo $review['author'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>読書状況</label>
    <div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status1" value="未読" <?php echo ($review['status'] === '未読')? 'checked' : ''; ?> >
        <label class="form-check-label" for="status1">未読</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status2" value="読んでいる" <?php echo ($review['status'] === '読んでいる') ? 'checked' : ''; ?>>
        <label class="form-check-label"  for="status2">読んでいる</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status3" value="読了" <?php echo ($review['status'] === '読了') ? 'checked' : ''; ?>>
        <label class="form-check-label"  for="status3">読了</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="score">評価（５点満点の整数）</label>
    <input type="number" name="score" id="score" value="<?php echo $review['score'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="summary">感想</label>
    <textarea rows="4" cols="50" name="summary" id="summary" class="form-control"><?php echo $review['summary'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">登録する</button>
</form>
