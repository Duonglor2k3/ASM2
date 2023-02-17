    <?php require __DIR__ . '/../views/layout/user/header.php'; ?>
    <main class="">
        <section class="mb-[33px] ">
            <img src="images/banner.png" alt="" class="w-full">
        </section>
        <section class="bg-[#F9F9F9] text-[15px] flex justify-center space-x-[75px] mb-[21px]">
            <div class="mt-[10px] mb-[19px]">
                <img src="images/brand1.png" alt="">
                <p class="text-center mt-[26px]">Vinamilk</p>
            </div>
            <div class="mt-[10px] mb-[19px]">
                <img src="images/brand2.png" alt="">
                <p class="text-center mt-[26px]">TH true milk</p>
            </div>
            <div class="mt-[10px] mb-[19px]">
                <img src="images/brand3.png" alt="">
                <p class="text-center mt-[26px]">Ba vì</p>
            </div>
            <div class="mt-[10px] mb-[19px]">
                <img src="images/brand4.png" alt="">
                <p class="text-center mt-[26px]">Cô gái Hà Lan</p>
            </div>
        </section>
        <section class="pb-[40px]">
            <div class="bg-[#004031] rounded-[5px] mx-[10px] h-[40px] mb-[40px]">
                <p class="text-center italic font-bold text-[14px] text-white pt-[10px]">Danh mục</p>
            </div>
            <div class="border-b-gray-400 border-b-[3px] border-solid  ">
                <ul class="text-[20px] flex justify-center space-x-[50px]  pb-[20px]">
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="" class="hover:text-red-600"><?= $category->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="bg-[#F9F9F9] px-[10px] pb-[31px] mb-[31px]">
            <div class="mt-11">
                <h2 class="text-3xl text-center mb-5 font-bold">Sản phẩm</h2>
                <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2.5">
                    <?php foreach ($products as $product) : ?>
                        <a href="/product-detail?id=<?= $product->id ?>" class="p-2.5 text-xs sm:text-sm bg-white shadow-lg border-4 border-green-600">
                            <img class="w-full transition-transform  hover:-translate-y-2 object-cover min-h-[100px]" src="/images/<?= $product->images ?>" alt="">
                            <h3 class="mt-2.5 font-[600]">
                                <?= $product->title ?>
                            </h3>
                            <div>
                                Số lượng : <?= $product->quantity ?>
                            </div>
                            <div class="mt-2.5">
                                <div>
                                    Giá : <?= $product->price ?>
                                </div>
                            </div>
                            <div class="mt-2.5">
                                bán được: <?= $product->sold ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <?php require_once __DIR__ . "/../views/layout/user/footer.php"; ?>