<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" integrity="sha512-5D0ofs3AsWoKsspH9kCWlY7qGxnHvdN/Yz2rTNwD9L271Mno85s+5ERo03qk9SUNtdgOZ4A9t8kRDexkvnWByA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../contents/css/parsley.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <style type="text/css">
        body {
            background-color: #d7d5d5;
        }
    </style>
</head>

<body>
    <div class="container px-4  mx-auto ">
        <div class="w-full h-screen flex items-center justify-center">
            <form class="w-96 LgnForm max-w-xl mx-auto  shadow-md bg-white rounded-lg pt-6 pb-8 mb-4 px-5" action="../process/dataProcess.php" method="POST" autocomplete="" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['errorMessageRegister'])) {
                    echo $_SESSION['errorMessageRegister'];
                    unset($_SESSION['errorMessageRegister']);
                }
                ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Email
                    </label>
                    <input class=" apperance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="..@gmail.com" required="" data-parsley-trigger="keyup">
                </div>
                <div class="form-group">
                    <button name="forgotEmail" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
          $('#validate_form').parsley();


          function myFunction1() {
            var x = document.getElementById("password");
            var y = document.getElementById("cpassword");
            if (x.type === "password" || y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
</body>

</html>