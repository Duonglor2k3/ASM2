<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $title ?></title>
</head>

<body>
  <form action="/update-product" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->id ?>">
    <br />
    Name: <input type="text" name="name" id="" value="<?php echo $product->name ?>">
    <br>
    <img src="images/<?php echo $product->image ?>" width="100" alt="">
    Image: <input type="file" name="image" id="">
    <br>
    Category:
    <select name="cate_id" id="">
      <?php foreach ($categories as $cate) : ?>
        <option value="<?= $cate->id ?>" <?= ($cate->id === $product->cate_id) ? 'selected' : '' ?>>
          <?= $cate->cate_name ?>
        </option>
      <?php endforeach ?>
    </select>
    <br>
    price: <input type="number" name="price" id="" value="<?php echo $product->price ?>">
    <br>
    Short Description
    <textarea name="short_desc" id="" cols="90" rows="5"><?= $product->short_desc ?></textarea>
    <br>
    Detail:
    <textarea name="detail" id="" cols="90" rows="10"><?= $product->detail ?></textarea>
    <br>
    <button type="submit">update</button>
  </form>
</body>

</html>