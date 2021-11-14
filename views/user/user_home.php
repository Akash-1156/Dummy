<?php

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['res'])) {
  header('Location: ../auth/index.php');
} else {

  include './user_header.php';
  $email = $_SESSION['res']->email;
  $res = $dbm->emailIsExist($email);
?>
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
  <div class="h-96 mt-16 bg-cover" style="background-image: url('https://s3.ap-south-1.amazonaws.com/cdn-marketplacexyz/sheba_xyz/images/webp/home-banner.webp');">
    <div class="container flex items-center justify-center ">
      <div class="mt-32 opacity-100 pop">
        <div class="mb-3">
          <p class="text-5xl font-bold text-pink-800 text-center">Your Personal Assistant</p>
          <p class="text-xl font-bold text-pink-800">One-stop solution for your services. Order any service, anytime.</p>
        </div>

        <div class="flex flex-col md:flex-row">
          <select class="hidden px-10 py-3 mr-5  rounded-md  focus:shadow focus:outline-none" name="" id="">
            <?php
            $res = $dbm->selectService();
            foreach ($res as $res) {
              echo '<option class="text-xl" value="' . $res->title . '" >' . $res->title . '</option>';
            }
            ?>

          </select>
          <form  action="./search_result.php" method="GET" autocomplete="">
            <div class="relative ml-20">
              <div class="absolute top-4 left-3 ">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
              </div>
              <input name="search_input" type="text" class="h-14 w-96 pl-10 pr-30 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="i need help with...">
              <div class="absolute top-2 right-2">
                <button name="search" type="submit" class="h-10 w-20 text-white rounded-lg bg-pink-500 hover:bg-pink-600">Search</button>
              </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>


  <section class="my-5 mx-3">
    <div class="flex flex-row gap-2 mb-3">
      <p class="text-3xl  text-gray-500 font-bold">Our Services</p>
      <div class="border-t-2 border-gray-500 w-44 h-1 mt-4"></div>
    </div>
    <div class="row">
      <?php
      $res = $dbm->selectService();
      foreach ($res as $res) {
      ?>
        <div class="col-3 mb-2">
          <a href="service_provider.php?service=<?php echo $res->title; ?>">
            <div class="card" style="width: 18rem;">
              <img src="<?php echo $res->feature_image; ?>" class="card-img-top" alt="...">
              <div class="" style="padding: 2px 0;">
                <h5 class="card-title text-center"><?php echo $res->title; ?></h5>
              </div>
            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
  <section class="mx-8 my-12">
    <div class="flex flex-row gap-2">
      <div class="border-t-2 border-gray-600 w-44 h-1 mt-3"></div>
      <p class="text-base  text-gray-700">Why Choose us</p>
    </div>
    <p class="text-xl font-bold text-gray-600 mb-4">Because we care about your safety..</p>
    <div class="grid grid-cols-2 px-2 gap-x-4">
      <div class="grid grid-cols-2 gap-3">
        <div class="rounded-md">
          <img class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_mask.png" alt="">
          <p class="text-xl font-bold text-center">Ensuring Masks</p>
        </div>
        <div class="rounded-md ">
          <img class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_24_7.png" alt="">
          <p class="text-xl font-bold text-center">24/7 Support</p>
        </div>
        <div class="rounded-md ">
          <img class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_sanitized.png" alt="">
          <p class="text-xl font-bold text-center">Sanitising </br> Hands & Equipment</p>
        </div>
        <div class="rounded-md ">
          <img class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_gloves.png" alt="">
          <p class="text-xl font-bold text-center">Ensuring Gloves</p>
        </div>
      </div>
      <div class="">
        <img src="https://s3.ap-south-1.amazonaws.com/cdn-marketplacexyz/sheba_xyz/images/webp/why-choose-us.webp" alt="">
      </div>
    </div>
  </section>
<?php include './user_footer.php';
} ?>