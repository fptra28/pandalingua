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
  <title>Home | PandaLingua</title>
</head>

<body>
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
  <!-- Hero Section Start -->
  <div class="w-full px-64 py-24 flex justify-between items-center gap-12">
    <img class="w-[500px] h-[500px]" src="./assets/img/42579140847.png" />
    <div class="flex-col justify-center items-start gap-5 inline-flex">
      <div class="flex-col justify-start items-start flex gap-3">
        <div class="text-black text-xl font-normal font-['Poppins']">Selamat datang di</div>
        <div class="flex-col justify-center items-start flex">
          <div class="text-black text-6xl font-bold font-['Poppins']">PandaLingua</div>
          <div class="text-black text-[25px] font-semibold font-['Poppins']">LEARN MANDARIN</div>
        </div>
        <div class="text-black text-xl font-normal font-['Poppins']">Temukan berbagai materi kursus Mandarin di sini dan
          selesaikan kuisnya.</div>
      </div>
      <div class="w-full flex-col justify-center items-center gap-3 flex">
        <button
          class="w-full px-[20px] py-[20px] bg-red-700 shadow-md rounded-xl border-2 border-black justify-center items-center gap-2.5 inline-flex hover:bg-red-900 transition duration-300 ease-in-out transform">
          <div class="text-white text-base font-bold font-['Poppins']">Mulai Belajar Dari Awal!</div>
        </button>
        <button
          class="w-full px-[20px] py-[20px] rounded-xl shadow-md border-2 border-black justify-center items-center gap-2.5 inline-flex hover:bg-neutral-300 transition duration-300 ease-in-out transform">
          <div class="text-red-700 text-base font-bold font-['Poppins']">Lihat Tingkatan Kursus</div>
        </button>
      </div>
    </div>
  </div>
  <!-- Hero Section End -->
  <!-- Course Level Section -->
  <div class="w-full py-24 px-64 gap-12 flex flex-col">
    <div class="w-full flex justify-center items-center flex-col gap-3">
      <div class="text-red-500 font-semibold text-xl">Kursus Bahasa Mandarin Terbaru</div>
      <div class="h-[10px] w-[200px] bg-red-800 rounded-full"></div>
    </div>
    <div class="w-full flex justify-center items-center gap-5">
      <div
        class="w-full max-w-[435px] bg-white rounded-[15px] flex flex-col overflow-hidden transition-all duration-300 hover:bg-neutral-300 hover:scale-105 shadow-xl">
        <div class="w-full h-[182px] flex justify-center items-center overflow-hidden">
          <img class="w-full h-full object-cover transition-transform duration-300 scale-100"
            src="./assets/img/BEGINNER-BLACK.png" />
        </div>
        <div class="w-full px-5 py-2.5 flex flex-col justify-center items-center gap-4">
          <div class="w-full flex justify-between items-center">
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">PandaLingua</div>
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">20 Lessons</div>
          </div>
          <div class="text-black text-2xl font-semibold font-['Poppins']">Mandarin Beginner</div>
        </div>
      </div>
      <div
        class="w-full max-w-[435px] bg-white rounded-[15px] flex flex-col overflow-hidden transition-all duration-300 hover:bg-neutral-300 hover:scale-105 shadow-xl">
        <div class="w-full h-[182px] flex justify-center items-center overflow-hidden">
          <img class="w-full h-full object-cover transition-transform duration-300 scale-100"
            src="./assets/img/INTER-BLACK.png" />
        </div>
        <div class="w-full px-5 py-2.5 flex flex-col justify-center items-center gap-4">
          <div class="w-full flex justify-between items-center">
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">PandaLingua</div>
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">20 Lessons</div>
          </div>
          <div class="text-black text-2xl font-semibold font-['Poppins']">Mandarin Intermediate</div>
        </div>
      </div>
      <div
        class="w-full max-w-[435px] bg-white rounded-[15px] flex flex-col overflow-hidden transition-all duration-300 hover:bg-neutral-300 hover:scale-105 shadow-xl">
        <div class="w-full h-[182px] flex justify-center items-center overflow-hidden">
          <img class="w-full h-full object-cover transition-transform duration-300 scale-100"
            src="./assets/img/ADVAN-BLACK.png" />
        </div>
        <div class="w-full px-5 py-2.5 flex flex-col justify-center items-center gap-4">
          <div class="w-full flex justify-between items-center">
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">PandaLingua</div>
            <div class="text-neutral-500 text-base font-semibold font-['Poppins']">20 Lessons</div>
          </div>
          <div class="text-black text-2xl font-semibold font-['Poppins']">Mandarin Advanced</div>
        </div>
      </div>
    </div>
  </div>
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
      <div class="text-center text-white text-xl font-semibold font-['Poppins']">© 2024 - PandaLingua. All Rights
        Reserved</div>
    </div>
  </div>
  <!-- Footer End -->
</body>

</html>