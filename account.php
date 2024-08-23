<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/svg+xml" href="/assets/img/logo-pandaLingua.png" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Account | PandaLingua</title>
</head>

<body class="body">
  <!-- Navbar Start -->
  <nav class="w-full px-[30px] bg-red-700 shadow-md flex justify-between items-center">
    <div class="flex-shrink-0">
      <img class="h-[90px]" src="./assets/img/logo-navbar.png" alt="Logo" />
    </div>
    <div class="flex grow justify-center">
      <a href="./index.php">
        <div
          class="h-[100px] flex justify-center items-center p-5 text-white text-lg font-bold cursor-pointer hover:bg-red-800">
          Beranda</div>
      </a>
      <a href="./course.php">
        <div
          class="h-[100px] flex justify-center items-center p-5 text-white text-lg font-bold cursor-pointer hover:bg-red-800">
          Kursus</div>
      </a>
      <a href="./kamus.php">
        <div
          class="h-[100px] flex justify-center items-center p-5 text-white text-lg font-bold cursor-pointer hover:bg-red-800">
          Kamus</div>
      </a>
      <a href="./account.php">
        <div
          class="h-[100px] flex justify-center items-center p-5 text-white text-lg font-bold cursor-pointer hover:bg-red-800">
          Akun</div>
      </a>
    </div>
    <div class="flex space-x-4">
      <a href="#signup"><button
          class="px-5 py-2.5 rounded-md border-2 border-white text-white text-lg font-bold font-['Poppins'] hover:bg-red-900">
          SIGN UP
        </button></a>
      <a href="#signin"><button
          class="px-5 py-2.5 rounded-md border-2 border-white text-white text-lg font-bold font-['Poppins'] hover:bg-red-900">
          SIGN IN
        </button></a>
    </div>
  </nav>
  <!-- Navbar End -->
  <!-- Content Start -->
  <div id="main-body" class="w-full max-w-[1920px] h-auto px-[30px] py-[60px] flex flex-col items-center">
    <div class="w-full max-w-[1920px] flex flex-col items-center gap-[35px]">
      <div class="text-sky-950 text-[28px] font-bold font-['Segoe UI'] leading-normal text-center">
        My Courses
      </div>
      <div class="w-full flex flex-col items-center gap-12">
        <div
          class="w-full max-w-[900px] px-[21px] py-7 bg-stone-500 rounded-[10px] border border-gray-200 flex items-center gap-[35px]">
          <div class="rounded-[15px] border-2 border-white">
            <img class="w-[184px] h-[170px]" src="./assets/img/profil.jpeg" alt="Course Thumbnail" />
          </div>
          <div class="flex flex-col gap-2.5">
            <div class="text-black text-[28px] font-normal font-['Poppins'] leading-[27px] text-center">
              NAMA USER
            </div>
            <div class="flex w-full justify-center gap-4">
              <div class="flex flex-col items-center text-center border-r border-gray-200 pr-4">
                <div class="text-black text-xl font-black font-['Segoe UI'] leading-[27px]">
                  3
                </div>
                <div class="text-zinc-400 text-sm font-normal font-['Segoe UI'] leading-[14px]">
                  Courses
                </div>
              </div>
              <div class="flex flex-col items-center text-center border-r border-gray-200 pr-4">
                <div class="text-black text-xl font-black font-['Segoe UI'] leading-[27px]">
                  0
                </div>
                <div class="text-zinc-400 text-sm font-normal font-['Segoe UI'] leading-[14px]">
                  Completed
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full max-w-[900px] p-px rounded-[10px] flex flex-col gap-4">
          <div class="text-sky-950 text-[22px] font-semibold font-['Poppins'] leading-7 text-center py-2.5">
            Your Courses
          </div>
          <div class="flex flex-col gap-2.5">
            <div class="flex justify-between items-center p-2.5 rounded-[10px] border border-black">
              <div class="flex items-center gap-7">
                <i class="fa-solid fa-caret-down fa-rotate-270"></i>
                <div class="text-black text-[22px] font-semibold font-['Poppins'] leading-7">
                  Mandarin Beginner
                </div>
              </div>
              <div class="w-[35px] h-[35px] relative"></div>
            </div>
            <div class="flex justify-between items-center p-2.5 rounded-[10px] border border-black">
              <div class="flex items-center gap-7">
                <i class="fa-solid fa-caret-down fa-rotate-270"></i>
                <div class="text-black text-[22px] font-semibold font-['Poppins'] leading-7">
                  Mandarin Beginner
                </div>
              </div>
              <div class="w-[35px] h-[35px] relative"></div>
            </div>
            <div class="flex justify-between items-center p-2.5 rounded-[10px] border border-black">
              <div class="flex items-center gap-7">
                <i class="fa-solid fa-caret-down fa-rotate-270"></i>
                <div class="text-black text-[22px] font-semibold font-['Poppins'] leading-7">
                  Mandarin Beginner
                </div>
              </div>
              <div class="w-[35px] h-[35px] relative"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content End -->
  <!-- Footer Start -->
  <div class="w-full bg-red-700 flex-col justify-start items-start inline-flex">
    <div class="w-full px-52 py-10 justify-center items-center gap-[59px] inline-flex">
      <img class="w-[324px] h-[99px]" src="./assets/img/text-pandalingua.png" />
      <div class="w-[1px] h-full bg-white"></div>
      <div class="w-full flex justify-between items-center">
        <a href="./index.html" class="text-center text-white text-xl font-semibold font-['Poppins']">Beranda</a>
        <a href="./index.html" class="text-white text-xl font-semibold font-['Poppins']">Kursus</a>
        <a href="./index.html" class="text-center text-white text-xl font-semibold font-['Poppins']">Kamus</a>
        <a href="./account.html" class="text-center text-white text-xl font-semibold font-['Poppins']">Account</a>
        <a href="#contact" class="text-center text-white text-xl font-semibold font-['Poppins']">Contact</a>
      </div>
    </div>
    <div class="w-full py-5 border-t border-white justify-center items-center gap-[59px] inline-flex">
      <div class="text-center text-white text-xl font-semibold font-['Poppins']">
        © 2024 - PandaLingua. All Rights Reserved
      </div>
    </div>
  </div>
  <!-- Footer End -->
</body>

</html>