<!-- login.php -->
<?php
include './controller/login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/assets/img/logo-pandaLingua.png" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./script/script.js"></script>
    <title>Admin Login | PandaLingua</title>
</head>

<body>
    <div class="w-screen h-screen flex justify-center items-center flex-col gap-5">
        <h1 class="text-4xl font-bold">Admin Login</h1>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="" class="flex flex-col bg-neutral-200 py-5 px-3 justify-center items-center rounded-xl">
            <input type="text" name="username" id="username" placeholder="Username" required class="border-2 border-black text-base py-2 px-3 rounded-full"><br>
            <input type="password" name="password" id="password" placeholder="Password" required class="border-2 border-black text-base py-2 px-3 rounded-full"><br>
            <button type="submit" class="bg-blue-300 p-3 w-full rounded-lg">Login</button>
        </form>
    </div>
</body>

</html>