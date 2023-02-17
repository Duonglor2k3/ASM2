<?php require_once __DIR__ . '/../layout/user/header.php'; ?>

<main>
  <div class="flex shadow-md my-10">
    <div class="w-3/4 bg-white px-10 py-10">
      <div class="flex justify-between border-b pb-8">
        <h1 class="font-semibold text-2xl">Giỏ hàng của tôi</h1>
        <h2 class="font-semibold text-2xl"><?php echo count($_SESSION['products']) ?> Sản Phẩm</h2>
      </div>
      <div class="flex mt-10 mb-5">
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
          Chi tiết sản phẩm
        </h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
          Số lượng
        </h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
          Giá
        </h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
          Tổng thanh toán
        </h3>
      </div>
      <form action="/change_cart" method="post">
        <?php foreach ($cart as $key => $value) : ?>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5">
              <!-- product -->
              <div class="w-20">
                <img class="h-24" src="/images/<?php echo $value['images'] ?>" alt="" />
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm"><?php echo $value['title'] ?></span>
                <a href="/delete_cart?id=<?= $key ?>" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Xóa</a>
              </div>
            </div>
            <div class="sm:w-40 flex justify-center mx-14">
              <button type="button" onClick="decreaseCount(event, this)" class="prevNumberProduct w-8 sm:w-1/3 border-2 border-black border-r-0 translate-x-1 rounded-l-[3px]">-</button>
              <input type="text" class="inputNumberProduct w-8  sm:w-1/3 appearance-none  outline-none border-2 border-black m-0 text-center" value="<?= $value['numberQuantity'] ?>" name="numberQuantity[<?= $key ?>]" id="">
              <button type="button" class="nextNumberProduct w-8  sm:w-1/3 border-2 border-black border-l-0 -translate-x-1 rounded-r-[3px]" onClick="increaseCount(event, this)">+</button>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm tracking-wider"><?php echo $value['price'] ?> ₫</span>
            <span class="text-center w-1/5 font-semibold text-sm tracking-wider"><?php echo  $value['price'] * $value['numberQuantity'] ?> ₫</span>
            <?php $total +=  $value['price'] * $value['numberQuantity'] ?>
          </div>
        <?php endforeach; ?>
        <button class="flex font-semibold text-indigo-600 text-sm mt-10">Sửa giỏ hàng</button>
      </form>
      <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
          <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
        </svg>
        Tiếp tục mua sắm
      </a>

    </div>

    <div id="summary" class="w-1/4 px-8 py-10">
      <h1 class="font-semibold text-2xl border-b pb-8">Tổng</h1>
      <div class="flex justify-between mt-10 mb-5">
        <span class="font-semibold text-sm uppercase">3 Sản phẩm</span>
        <span class="font-semibold text-sm tracking-wider"><?= $total ?> ₫</span>
      </div>
      <div>
        <label class="font-medium inline-block mb-3 text-sm uppercase">Mua sắm</label>
        <select class="block p-2 text-gray-600 w-full text-sm">
          <option>Phí giao hàng - 30.000</option>
        </select>
      </div>
      <div class="py-10">
        <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Mã Voucher</label>
        <input type="text" id="promo" placeholder="Nhập voucher..." class="p-2 text-sm w-full" />
      </div>
      <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
        Áp dụng
      </button>
      <div class="border-t mt-8">
        <div class="flex font-semibold justify-between py-6 text-sm uppercase">
          <span>Tổng thanh toán</span>
          <span class="tracking-wider"><?= $total ?> ₫</span>
        </div>
        <button class="bg-green-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
          Chuyển sang thanh toán
        </button>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function increaseCount(a, b) {
      var input = b.previousElementSibling;
      var value = parseInt(input.value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      input.value = value;
    }

    function decreaseCount(a, b) {
      var input = b.nextElementSibling;
      var value = parseInt(input.value, 10);
      if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
      }
    }
  </script>
</main>
<?php require_once __DIR__ . '/../layout/user/footer.php'; ?>