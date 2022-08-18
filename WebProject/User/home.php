<?php
    require("../connect.php");

    $sqlSelectTopSale = "SELECT * FROM `Products`
                         ORDER BY Sale DESC
                         LIMIT 4;";
    $sqlSelectAllCategories = "SELECT * FROM Types";
    $sqlSelectAllProducts = "SELECT * FROM `Products`
                             LIMIT 20;";

    $recordSTS = select($sqlSelectTopSale);
    $recordSAC = select($sqlSelectAllCategories);
    $recordSAP = select($sqlSelectAllProducts);
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

    <?php require("navAndTab.php"); ?>

    <!-- Advertisement start-->
    <div class="relative w-[100%]" style="height: 441px; margin-top: 25px; background-image: url('https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/295404889_1251345245603214_1050243785686971245_n.png?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_ohc=twU_fsHyoAkAX9Etv54&tn=vTwwp-d3p2H9mPNW&_nc_ht=scontent.fhan2-2.fna&oh=03_AVK4rp_pYqhh26g8s43Ad4ZG2KOrfwJ5lBueJzHKRIo2ug&oe=630C1E5E'); " >
        <!-- New container have content start-->
        <div class="absolute mx-8 h-fit w-[80%] mx-[10%] bottom-[-136px]">
            <!-- Slider start -->
            <div id="default-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-fit overflow-hidden rounded-3xl md:h-[215px]">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out rounded-lg" data-carousel-item>
                        <span class="absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                        <img src="https://cdn.tgdd.vn/2022/07/banner/720-220-720x220-183.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out rounded-lg" data-carousel-item>
                        <img src="https://cdn.tgdd.vn/2022/08/banner/720-220-720x220-65.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out rounded-lg" data-carousel-item>
                        <img src="https://cdn.tgdd.vn/2022/08/banner/ssgif-06-720x220-9.gif" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button id = "button_next" type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            <!-- Slider end -->
        </div>
        <!-- New container have content end-->
    </div>
    <!-- Advertisement end-->

    <!-- Container have main content start -->

    <div class="w-[80%] h-fit mt-[154px] mx-[10%]">

        <!-- Best Sale start-->
        <section class="bg-white dark:bg-gray-900 rounded-3xl bg-yellow-200">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-3xl">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Sale up to 50%</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Enjoy products with great deals from us</p>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-4 sm:gap-1 xl:gap-2 lg:space-y-0">

                    <!-- Pricing Card -->
                    <?php foreach ($recordSTS as $record){ ?>
                    <div class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="product.php?ID=<?= $record['ID'] ?>">
                            <img class="p-8 rounded-t-lg" src=<?= $record[3]?> alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="product.php?ID=<?= $record['ID'] ?>">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?=$record[1] ?></h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <?php for($i = 1; $i  <= $record[6]; $i++) { ?>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <?php }; ?>
                                <?php for($i = 1; $i  <= 5-$record[6]; $i++) { ?>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <?php }; ?>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?= $record[6] ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-red-500 dark:text-white"><?php echo('-'); echo $record[5]; echo '%'; ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white"><?= number_format($record[4] - $record[4]*$record[5]/100, 0) ?> vnd</span>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
        </section>
        <!-- Best Sale end-->
                                    
        <!-- All category start -->
        <section class="bg-white dark:bg-gray-900 rounded-3xl bg-white mt-[50px]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-3xl">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">All categorys</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Full of category for you</p>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-8 sm:gap-1 xl:gap-1 lg:space-y-0">

                    <!-- Pricing Card -->
                    <?php foreach ($recordSAC as $record){ ?>
                    <div class="w-full max-w-sm bg-white rounded-lg">
                        <a href="#">
                            <img class="p-8 rounded-t-lg" src=<?= $record['Image']?> alt="product image" />
                        </a>
                        <div class="px-5 pb-5 text-center">
                            <a href="#">
                                <h5 class="text-xl tracking-tight text-gray-900 dark:text-white"><?=$record['Name'] ?></h5>
                            </a>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
        </section>
        <!-- All category end -->
        
        <!-- Suggestion start-->
        <section class="bg-white dark:bg-gray-900 rounded-3xl mt-[50px]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-3xl">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Suggestion</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Best products today</p>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-5 sm:gap-1 xl:gap-2 lg:space-y-0">

                    <!-- Pricing Card -->
                    <?php foreach ($recordSAP as $record){ ?>
                    <div class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="product.php?ID=<?= $record['ID'] ?>">
                            <img class="p-8 rounded-t-lg" src=<?= $record[3]?> alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="product.php?ID=<?= $record['ID'] ?>">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?=$record[1] ?></h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <?php for($i = 1; $i  <= $record[6]; $i++) { ?>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <?php }; ?>
                                <?php for($i = 1; $i  <= 5-$record[6]; $i++) { ?>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <?php }; ?>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?= $record[6] ?></span>
                            </div>
                            <?php if ($record[5] != 0){ ?>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-red-500 dark:text-white"><?php echo('-'); echo $record[5]; echo '%'; ?></span>
                            </div>
                            <?php }?>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white"><?= number_format($record[4] - $record[4]*$record[5]/100, 0) ?> vnd</span>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
        </section>
        <!-- Suggestion end-->
    
    </div>
    <!-- Container have main content end -->

    <!-- Footer start -->

   <?php require('./footer.php'); ?>

    <!-- Footer end -->



    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script>
        setInterval(function () {document.getElementById('button_next').click();}, 5000);
    </script>

</body>
</html>