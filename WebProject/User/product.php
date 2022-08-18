<?php
    if(isset($_COOKIE['TokenID'])){
        $TokenID = $_COOKIE['TokenID'];
    }
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
    }

    $sqlSelect = "SELECT * FROM Users WHERE Token = '$TokenID'";
    $sqlSelectProduct = "SELECT * FROM Products WHERE ID = '$ID'";

    require("../connect.php");

    $records = mysqli_query($conn, $sqlSelect);
    $record = mysqli_fetch_array($records);
    $Avatar = $record['Avatar'];
    $Full_name= $record['Full_name'];
    $Email = $record['Email'];

    $recordProductObject = mysqli_query($conn, $sqlSelectProduct);
    $recordProduct = mysqli_fetch_array($recordProductObject);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-slate-100" >
    
    <!-- nav and tab start-->
    <?php require('navAndTab.php'); ?>
    <!-- nav and tab end -->

    <!-- Container have main content start -->
    <div class="w-[80%] h-fit mt-[15px] mx-[10%]">
        
        <!-- Breadcrumbs start -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                </a>
                </li>
                <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                </div>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
                </div>
                </li>
            </ol>
        </nav>
        <!-- Breadcrumbs end -->

        <!-- Container have product information start-->
        <div class="bg-white py-[10]" >
            <div class="m-[10px] grid grid-cols-3 gap-5" >
                <!-- Product Image start -->
                <div class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href=<?=$recordProduct['Image']?> target="_blank">
                        <img class="p-8 rounded-t-lg" src=<?= $recordProduct['Image']?> alt="product image" />
                    </a>
                </div>
                <!-- Product Image end -->
                <!-- Product Information start -->
                <div class="ml-[10px] mt-[10px] py-[10px]">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?=$recordProduct['Name'] ?></h5>
                    <div class="flex items-center mt-2.5 mb-5">
                        <?php for($i = 1; $i  <= $recordProduct['Rate']; $i++) { ?>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <?php }; ?>
                        <?php for($i = 1; $i  <= 5-$recordProduct['Rate']; $i++) { ?>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <?php }; ?>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?= $recordProduct[6] ?></span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900 dark:text-white"><?=  "Old price: ".number_format($recordProduct[4], 0) ?> vnd</span>
                        <span class="text-2xl font-bold text-red-500 dark:text-white"><?php echo('-'); echo $recordProduct[5]; echo '%'; ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="mt-[10px] text-2xl font-bold text-gray-900 dark:text-white"><?=  "New price: ".number_format($recordProduct[4] - $recordProduct[4]*$recordProduct[5]/100, 0) ?> vnd</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="mt-[10px] text-xl text-gray-500 dark:text-white"><?=  "(There are ".number_format($recordProduct[2], 0)." products available)" ?> </span>
                    </div>

                    <div class="flex items-center md:order-2 mt-[50px]">
                        <!-- Cart -->
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" stroke="currentColor" viewBoxaria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                            Add to cart
                        </button>
                        <!-- History -->
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buy</button>
                </div>
                </div>
                <!-- Product Information end -->
            </div>
        </div>
        <!-- Container have product information end-->

    </div>
    <!-- Container have main content end -->

    <!-- Footer start -->
    <?php require('footer.php'); ?>
    <!-- Footer end -->

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>
</html>