      <?php require_once __DIR__ . "/../layout/user/header.php"; ?>
      <div class="w-full py-5 container mx-auto space-y-10 px-2 sm:px-5">
        <div class="  mx-auto bg-white p-5">
          <div class="sm:grid md:grid-cols-2 gap-5">
            <div class="flex flex-col space-y-1">
              <div class="w-full h-auto overflow-hidden ">
                <img src="/images/<?= $product->images ?>" alt="" class="transition-transform hover:scale-110 w-[500px] h-full object-cover ml-[100px]">
              </div>
            </div>
            <div class="text-center md:text-left">
              <h2 class="text-base sm:text-xl text-center md:text-left">
                <?= $product->title ?>
              </h2>
              <div class=" grid grid-cols-2 mt-4 text-xs sm:text-base">
                <p>Đánh giá:
                  ???
                </p>
                <p>số lương đã bán :
                  <?= $product->sold ?>
                </p>
                <p>số lương trong kho :
                  <?= $product->quantity ?>
                </p>
                <p>lượt xem:
                  <?= $product->view ?>
                </p>
              </div>
              <div class="text-red-500 font-bold mt-4 ">giá:
                <?= number_format($product->price) ?>
              </div>

              <form action="/addProduct" method="post" >
                <input type="text" hidden name="title" value="<?= $product->title  ?>">
                <input type="text" hidden name="price" value="<?= $product->price  ?>">
                <input type="text" hidden name="images" value="<?= $product->images  ?>">
                <div class="sm:flex space-y-2 sm:space-y-0 mt-5 justify-center md:justify-start text-xs sm:text-base">
                  <div class="mr-2 ">số lượng: </div>
                  <div class="sm:w-40 flex justify-center mx-14">
                    <button type="button" onClick="decreaseCount(event, this)" class="prevNumberProduct w-8 sm:w-1/3 border-2 border-black border-r-0 translate-x-1 rounded-l-[3px]">-</button>
                    <input type="text" class="inputNumberProduct w-8  sm:w-1/3 appearance-none  outline-none border-2 border-black m-0 text-center" value="1" name="numberQuantity" id="">
                    <button type="button" class="nextNumberProduct w-8  sm:w-1/3 border-2 border-black border-l-0 -translate-x-1 rounded-r-[3px]" onClick="increaseCount(event, this)">+</button>
                  </div>
                  <div class="text-red-500">
                    <?= $err['numberProduct'] ?? '' ?>
                  </div>
                </div>
                <div class="mt-10 mx-auto w-40">
                  <button class="w-full h-11 bg-green-500 rounded-md text-white" name="" type="submit">Thêm vào giỏ hàng</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="w-full mx-auto bg-white p-5 ">
          <h2 class="font-bold text-base sm:text-2xl">Mô tả </h2>
          <p class="mt-5 sm:text-base text-xs whitespace-pre-wrap leading-8">
            <?= $product->description ?>
          </p>
        </div>
        <div class="w-full mx-auto bg-white p-5 ">
          <h2 class="font-bold text-base sm:text-2xl">Bình luận</h2>

          <!-- component -->
          <!-- comment form -->
          <div class="flex mx-auto items-center justify-center shadow-lg mt-5 mx-2 mb-4 max-w-lg">
            <form method="post" action="/post_comment?id=<?php echo $product->id ?>" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
              <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                  <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="description" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                  <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs md:text-sm pt-px">hãy nhập đúng sự thật.</p>
                  </div>
                  <div class="-mr-1">
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <!-- end comment -->
        <div>
          <?php foreach ($comments as $comment) : ?>
            <div class="mt-5">
              <div class="flex gap-5">
                <div class="rounded-full h-10 w-10 overflow-hidden">
                  <img class="w-full h-full" src="/images/<?= $comment->image ?>" alt="">
                </div>
                <div class="text-xs md:text-base">
                  <p>
                    <?= $comment->full_name ?>
                  </p>
                  <p>
                    <?= $comment->created_at ?>
                  </p>
                </div>
              </div>
              <div class="mt-5 text-xs sm:text-base">
                <?= $comment->description ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="mt-11">
          <h2 class="text-2xl text-center mb-5">Sản phẩm mới nhất</h2>
          <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2.5">
            <?php foreach ($hds as $san_pham) : ?>
              <a href="product-detail?id=<?= $san_pham->id ?>" class="p-2.5 text-xs sm:text-sm bg-white shadow-lg border-4 border-green-600">
                <img class="w-full transition-transform  hover:-translate-y-2 object-cover min-h-[100px]" src="/images/<?= $san_pham->images ?>" alt="">
                <h3 class="mt-2.5 ">
                  <?= $san_pham->title ?>
                </h3>
                <div>
                  Số lượng : <?= $san_pham->quantity ?>
                </div>
                <div class="mt-2.5">
                  <div>
                    Giá : <?= $san_pham->price ?>
                  </div>
                </div>
                <div class="mt-2.5">
                  bán được: <?= $san_pham->sold ?>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      </div>
      <?php require_once __DIR__ . "/../layout/user/footer.php"; ?>
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
      </body>

      </html>