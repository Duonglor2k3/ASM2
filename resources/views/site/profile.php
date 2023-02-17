<?php require_once __DIR__ . '/../layout/user/header.php'; ?>
<main>
  <div class="w-full h-[400px] flex justify-center">
    <div class="m-auto grid grid-2 w-[90px]">
      <div>
        <h1 class="text-[20px] font-bold">Hồ sơ của tôi</h1>
        <span class="text-[#989494] text-[15px]">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
      </div>
      <form action="/profile" method="post" enctype="multipart/form-data">
        <div class="name py-[10px]">
          <div>
            <label class="text-[15px] text-[#414141]">Họ và tên</label>
          </div>
          <input class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" value="<?php echo $user->full_name ?>" type="text" name="full_name" id="" placeholder="Họ và tên" />
        </div>
        <div class="Email py-[10px]">
          <div>
            <label class="text-[15px] text-[#414141]">Email</label>
          </div>
          <input disabled class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" type="text" name="email" id="" placeholder="Email" value="<?php echo $user->email ?>" />
        </div>
        <div class="Phone py-[10px]">
          <div>
            <label class="text-[15px] text-[#414141]">Số điện thoại</label>
          </div>
          <input class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" type="text" name="phone" id="" value="<?php echo $user->phone ?>" placeholder="Số điện thoại" />
        </div>
    </div>
    <div class="image m-auto">
      <div class="m-auto">
        <img id="uploadPreview" class="w-[100px] h-[100px] rounded-full" src="/images/<?= $user->image ?>" />
        <div class="pt-[10px]">
          <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />
        </div>
      </div>
    </div>
  </div>
  <div class="flex justify-center pb-[50px]">
    <div class="save bg-[#198754] w-[240px] h-[46px] rounded-[3px] flex items-center justify-center">
      <button class="text-[#ffffff] text-[22px] font-bold">Lưu</button>
    </div>
  </div>
  </form>
</main>
<?php require_once __DIR__ . '/../layout/user/footer.php'; ?>