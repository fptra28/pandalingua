<?php
include './backend/tbl-dictionary.php';
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
    <title>Kamus | PandaLingua</title>
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
    <div class="w-full px-64 py-24 flex justify-between items-center gap-20">
        <div class="flex-col justify-center items-start gap-5 inline-flex">
            <div class="flex-col justify-start items-start flex gap-3">
                <div class="flex-col justify-center items-start flex">
                    <div class="text-black text-6xl font-bold font-['Poppins']">Kamus Kosakata Mandarin</div>
                </div>
                <div class="text-black text-xl font-normal font-['Poppins']">Materi HSK 1 memperkenalkan dasar Bahasa
                    Mandarin, dimulai dari
                    pengucapan nada, penulisan huruf, dan penggunaan kosakata sederhana
                    dalam percakapan sehari-hari.</div>
            </div>
            <div class="w-full flex-row justify-center items-center gap-3 flex">
                <button onclick="scrollToSection('kamus-section')"
                    class="w-full px-[20px] py-[20px] bg-red-700 shadow-md rounded-xl border-2 border-black justify-center items-center gap-2.5 inline-flex hover:bg-red-900 transition duration-300 ease-in-out transform">
                    <div class="text-white text-base font-bold font-['Poppins']">KOSAKATA</div>
                </button>
                <button
                    class="w-full px-[20px] py-[20px] rounded-xl shadow-md border-2 border-black justify-center items-center gap-2.5 inline-flex hover:bg-neutral-300 transition duration-300 ease-in-out transform">
                    <div class="text-red-700 text-base font-bold font-['Poppins']">DOWNLOAD SOAL</div>
                </button>
            </div>
        </div>
        <img class="w-[500px] h-[500px]" src="./assets/img/logo-panda-fix2.png" />
    </div>
    <!-- Hero Section End -->
    <!-- Kamus Section Start-->
    <section id="kamus-section" class="w-full px-64 py-24 flex flex-col justify-center items-center gap-5">
        <div class="w-full flex-col justify-start items-center gap-3">
            <div class="text-3xl font-bold">Daftar Kosakata</div>
            <div class="text-base">Peserta ujian HSK 1 perlu menguasai 150 kosakata berikut. Klik pada huruf untuk
                melihat pinyin dan arti.</div>
        </div>

        <!-- Search Bar Start -->
        <div class="w-full flex justify-center my-6">
            <form action="" method="GET" class="w-full max-w-xl flex flex-row">
                <div class="relative w-full">
                    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery); ?>"
                        class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out" />
                    <button type="submit" class="absolute right-0 top-0 mt-2 mr-2 text-gray-600 hover:text-gray-900">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <button type="submit" name="clear" value="1" class="ml-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition duration-300 ease-in-out">
                    Clear
                </button>
            </form>
        </div>
        <!-- Search Bar End -->

        <div class="w-full flex flex-col gap-7">
            <!-- List Kamus Start -->
            <div class="w-full grid grid-cols-10 gap-4">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
            <button
                data-id="' . $row["id"] . '"
                class="min-w-[100px] py-4 rounded-[10px] bg-neutral-100 border border-black/20 flex justify-center items-center hover:bg-neutral-300 transition ease-in-out duration-300 transform shadow-md">
                <div class="text-center text-[#333333] text-2xl font-normal leading-[30px] tracking-tight">
                    ' . htmlspecialchars($row["Simplified"]) . '
                </div>
            </button>';
                    }
                } else {
                    echo "<div class='w-full text-center text-gray-500'>No data found</div>";
                }
                ?>
            </div>
            <!-- List Kamus End -->

            <!-- Pagination Start -->
            <div class="flex justify-center items-center gap-3">
                <?php
                $previousPage = ($page > 1) ? $page - 1 : 1;
                $nextPage = ($page < $totalPages) ? $page + 1 : $totalPages;

                // Previous button
                echo "<a href='?page=$previousPage&search=" . urlencode($searchQuery) . "' class='px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-300'>&laquo; Previous</a>";

                // Page numbers
                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $page) ? 'bg-blue-500 text-white' : 'bg-white text-gray-700';
                    echo "<a href='?page=$i&search=" . urlencode($searchQuery) . "' class='px-4 py-2 border border-gray-300 rounded-md $activeClass hover:bg-blue-600 hover:text-white transition ease-in-out duration-300'>$i</a> ";
                }

                // Next button
                echo "<a href='?page=$nextPage&search=" . urlencode($searchQuery) . "' class='px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-300'>Next &raquo;</a>";
                ?>
            </div>
            <!-- Pagination End -->
        </div>
    </section>
    <!-- Kamus Section End -->
    <!-- Footer Start -->
    <div class="w-full bg-red-700 flex-col justify-start items-start inline-flex">
        <div class="w-full px-52 py-10 justify-center items-center gap-[59px] inline-flex">
            <img class="w-[324px] h-[99px]" src="./assets/img/text-pandalingua.png" />
            <div class="w-[1px] h-full bg-white"></div>
            <div class="w-full flex justify-between items-center">
                <a href="./index.html" class="text-center text-white text-xl font-semibold font-['Poppins']">Beranda</a>
                <a href="./index.html" class="text-white text-xl font-semibold font-['Poppins']">Kursus</a>
                <a href="./index.html" class="text-center text-white text-xl font-semibold font-['Poppins']">Kamus</a>
                <a href="./account.html"
                    class="text-center text-white text-xl font-semibold font-['Poppins']">Account</a>
                <a href="#contact" class="text-center text-white text-xl font-semibold font-['Poppins']">Contact</a>
            </div>
        </div>
        <div class="w-full py-5 border-t border-white justify-center items-center gap-[59px] inline-flex">
            <div class="text-center text-white text-xl font-semibold font-['Poppins']">© 2024 - PandaLingua. All Rights
                Reserved</div>
        </div>
    </div>
    <!-- Footer End -->

    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg max-w-lg mx-4 relative">
            <span class="absolute top-2 right-2 text-2xl cursor-pointer" id="close-overlay">&times;</span>
            <div id="overlay-data">Loading...</div>
        </div>
    </div>


    <script>
        // Function to show overlay with data
        function showOverlay(data) {
            document.getElementById('overlay-data').innerHTML = data;
            document.getElementById('overlay').classList.remove('hidden');
            document.body.classList.add('no-scroll'); // Disable scroll
        }

        // Function to hide overlay
        function hideOverlay() {
            document.getElementById('overlay').classList.add('hidden');
            document.body.classList.remove('no-scroll'); // Enable scroll
        }

        // Event listener for button clicks
        document.querySelectorAll('button[data-id]').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                // Fetch data for the clicked item
                fetch('./backend/tbl-dictionary.php?id=' + id)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => showOverlay(data))
                    .catch(error => console.error('There was a problem with the fetch operation:', error));
            });
        });

        // Event listener for close button
        document.getElementById('close-overlay').addEventListener('click', hideOverlay);

        function scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

</body>

</html>