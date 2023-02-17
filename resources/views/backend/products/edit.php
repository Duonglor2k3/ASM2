<?php require_once __DIR__ . "/../layout/header.php" ?>
<div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-green-400">
  <div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
      <div class="col-span-12 mt-5">
        <h1 class="font-bold text-3xl mb-5 uppercase text-center">create form</h1>
        <form action="/admin/product/edit" class="w-full" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $product->id ?>">

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                title
              </label>
            </div>
            <div class="md:w-2/3">
              <input name="title" value="<?= $product->title ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text">
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                price
              </label>
            </div>
            <div class="md:w-2/3">
              <input name="price" value="<?= $product->price ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="number">
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                description
              </label>
            </div>
            <div class="md:w-2/3">
              <textarea name="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="">
              <?= $product->description ?>
                            </textarea>
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                images
              </label>
            </div>
            <div class="md:w-2/3">
              <img src="/images/<?= $product->images ?>" class="w-24 h-24" alt="">
              <input name="images" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="file">
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                quantity
              </label>
            </div>
            <div class="md:w-2/3">
              <input name="quantity" value="<?= $product->quantity ?>" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="number">
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                category
              </label>
            </div>
            <div class="md:w-2/3">
              <select name="category_id" id="">
                <?php foreach ($categories as $category) : ?>
                  <option <?= $category->id == $product->category_id ? "selected" : "" ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>


          <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
              <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Edit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . "/../layout/footer.php" ?>