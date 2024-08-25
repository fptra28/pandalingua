<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <style>
        /* Sidebar styling */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            transition: 0.3s;
            overflow-y: auto;
        }

        .sidebar a {
            padding: 15px 8px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar .side-header img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 50%;
        }

        .side-header h5 {
            color: #fff;
            text-align: center;
            margin-top: 10px;
        }

        .sidebar hr {
            margin: 10px 0;
            border: 1px solid #3B3131;
        }

        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Dropdown container, hidden by default */
        .dropdown-container {
            display: none;
            background-color: #333;
            padding-left: 15px;
        }

        /* Dropdown items */
        .dropdown-container a {
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            color: #ddd;
        }

        /* Open button styling */
        #main {
            margin-left: 260px; /* Space for sidebar */
            padding: 16px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Users</a>
    <a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Product Sizes</a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> status</a>
  
        <!-- Materi Dropdown -->
        <a href="javascript:void(0)" onclick="toggleDropdown('materiDropdown')"><i class="fa fa-th-large"></i> Materi</a>
    <div id="materiDropdown" class="dropdown-container">
        <a href="#beginner" onclick="showCategory('beginner')">Beginner</a>
        <a href="#intermediate" onclick="showCategory('intermediate')">Intermediate</a>
        <a href="#advanced" onclick="showCategory('advanced')">Advanced</a>
    </div>
    
    <!-- Quiz Dropdown -->
    <a href="javascript:void(0)" onclick="toggleDropdown('quizDropdown')"><i class="fa fa-th"></i> Quiz</a>
    <div id="quizDropdown" class="dropdown-container">
        <a href="#beginner" onclick="showSizes('beginner')">Beginner</a>
        <a href="#intermediate" onclick="showSizes('intermediate')">Intermediate</a>
        <a href="#advanced" onclick="showSizes('advanced')">Advanced</a>
    </div>
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


<script>
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "260px";
    }
</script>

</body>
</html>