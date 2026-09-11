<h1 class="h2 text-dark mt-4 mb-4">会社情報の登録</h1>
<form action="create.php" method="POST">
  <?php if(count($errors)) : ?>
    <ul class="text-danger">
      <?php foreach($errors as $error) : ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <div class="form-group">
    <label for="name">会社名</label>
    <input type="text" id="name" name="name" value="<?php echo $company['name'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="establishment_date">設立日</label>
    <input type="date" id="establishment_date" name="establishment_date" value="<?php echo $company['establishment_date'] ?>" class="form-control">
  </div>
  <div>
    <label for="founder" class="form-group">代表者</label>
    <input type="text" id="founder" name="founder" value="<?php echo $company['founder'] ?>" class="form-control">
  </div>
    <button type="submit" class="btn btn-primary mt-4">登録する</button>
</form>
