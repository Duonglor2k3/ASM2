<?php require_once __DIR__ . "/../layout/user/header.php" ?>
<!-- center -->
<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
    <h3 class="text-2xl font-bold text-center">Register to your account</h3>
    <form action="/register" method="post" enctype="multipart/form-data">
      <div class="mt-4">
        <div>
          <label class="block" for="Full_Name">Full_Name<label>
              <input type="text" name="Full_Name" placeholder="Full_Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
        <div>
          <label class="block" for="email">Email<label>
              <input type="text" name="email" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
        <div class="mt-4">
          <label class="block">Password<label>
              <input type="password" name="pass" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
        <div>
          <label class="block" for="phone">Phone<label>
              <input type="text" name="phone" placeholder="phone" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
        <div>
          <label for="image" class="block">Image</label>
          <img id="uploadPreview" class="w-[100px] h-[100px]">
          <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />
        </div>
        <div class="flex items-baseline justify-between">
          <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Register</button>
          <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php require_once __DIR__ . "/../layout/user/footer.php" ?>