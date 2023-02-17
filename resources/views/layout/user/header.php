<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Roboto+Serif:ital,opsz,wght@0,8..144,400;0,8..144,700;1,8..144,400;1,8..144,700&family=Yeseva+One&display=swap" rel="stylesheet">
</head>

<body class=" bg-[#F9F9F9]">
    <header class="">
        <div class="flex items-center justify-between py-5">
            <div class="logo w-[70px] ">
                <img src="./images/logo (1).png" class="w-full h-full" alt="">
            </div>
            <form class="flex">
                <input type="text" name="" id="" class="py-2 outline-none w-[340px]  pl-[10px] bg-[#E8E8E8] rounded-l-[5px]" placeholder="Tìm sản phẩm ở đây...">
                <button class=" px-3 flex items-center  bg-[#E8E8E8] rounded-r-[5px]">
                    <img src="./images/bx_search-alt-2.png" alt="">
                </button>
            </form>

            <div class="phone items-center flex pl-[80px] ">
                <img src="./images/Group 33.png" alt="">
                <div class="pl-[10px]">
                    <p class="font-['Roboto Serif'] text-[#414141]">Hỗ trợ khách hàng</p>
                    <p class="font-[700] text-[#414141] ">0123456789</p>
                </div>
            </div>
            <div class="login flex items-center pl-[50px]">
                <?php if (!isset($_SESSION['user'])) :  ?>
                    <img src="./images/login.png" alt="">
                    <div class="pl-[10px]">
                        <div>
                            <a class="font-['Roboto Serif'] underline text-[#414141]" href="/login">Đăng nhập</a>
                        </div>
                        <a class="text-[#414141] underline" href="/register">Đăng kí</a>
                    </div>
                <?php else : ?>
                    <?php $user = $_SESSION['user']; ?>
                    <img class="w-[60px] h-[60px] rounded-full" src="/images/<?= $user->image ?>" />
                    <div class="pl-[10px]">
                        <div>
                            <a class="font-['Roboto Serif'] underline text-[#414141]" href="/profile"><?= $user->full_name ?></a>
                        </div>
                        <a class="text-[#414141] underline" href="/log_out">Log out</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cart flex pl-[75px]">
                <div class="w-[157px] h-[44px] border-[3px] bg-red rounded-[10px] items-center flex">
                    <img src="./images/cart.png" alt="" class="pl-[5px]">
                    <span class="px-[10px] text-[15] text-[#414141] text-center">Giỏ hàng</span>
                    <div class="bg-[#FFC107] w-[17px] h-[18px] text-center rounded-[3px] text-[13px] text-[#414141]">
                        0</div>
                </div>
            </div>
        </div>
        <nav class="menu w-full h-[65px] bg-[#198754] flex items-center justify-center ">
            <ul class="flex justify-around gap-9">
                <li class="text-[#ffffff]"><a href="/home">Trang chủ</a></li>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li class="text-[#ffffff]"><a href="/login">Đăng nhập</a></li>
                    <li class="text-[#ffffff]"><a href="/register">Đăng ký</a></li>
                <?php else : ?>
                    <li class="text-[#ffffff]"><a href="/profile">Tài khoản</a></li>
                <?php endif; ?>
                <li class="text-[#ffffff]"><a href="/cart">Giỏ hàng</a></li>
            </ul>
        </nav>

    </header>