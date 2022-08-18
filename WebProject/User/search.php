<?php
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    $search = '%'.$keyword.'%';
    $sqlSelectKeywords = "SELECT * FROM Products WHERE Name LIKE '$search'";
    require("../connect.php");
    $recordSK = select($sqlSelectKeywords);

    $page = 1;

    if(isset($_GET['page'])){
        $page  = (int)$_GET['page'];
        if($page == 0){
            $page = 1;
        }
        if($page == (int)(ceil(count($recordSK)/10))+1 ){
            $page = $page-1;
        }
    }

    var_dump($page);

    $firstProduct = ($page-1)*10;   
    $sqlSelectPages = "SELECT * FROM Products WHERE Name LIKE '$search' LIMIT $firstProduct, 10";
    $recordSP = select($sqlSelectPages);
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
    <?php require("navAndTab.php"); ?>
    <!-- nav and tab end -->

    <!-- Container have main content start -->
    <div class="w-[80%] h-fit mt-[15px] mx-[10%]">
        
        <!-- Breadcrumbs start -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                </a>
                </li>
                <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?=$recordSNOT[0][0]?></a>
                </div>
                </li>
            </ol>
        </nav>
        <!-- Breadcrumbs end -->

        <!-- Show product start-->
        <section class="bg-white dark:bg-gray-900 rounded-3xl mt-[50px]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-3xl">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Keyword: "<?=$keyword?>"</h2>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-5 sm:gap-1 xl:gap-2 lg:space-y-0">

                    <!-- Pricing Card -->
                    <?php foreach ($recordSP as $record){ ?>
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
            <!-- Pagination start -->
            <div class="flex flex-col items-center pb-[20px]">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white"><?= ($page-1)*10+1 ?></span> to <span class="font-semibold text-gray-900 dark:text-white"><?=($page*10<count($recordSK))?($page*10):(count($recordSK))?></span> of <span class="font-semibold text-gray-900 dark:text-white"><?=count($recordSK)?></span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                <?php $next = $page + 1; $pre = $page - 1;?>
                <a href="search.php?keyword=<?=$keyword?>&page=<?=$pre?>" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Previous
                </a>

                <!-- Next Button -->
                <a href="search.php?keyword=<?=$keyword?>&page=<?=$next?>" class="inline-flex items-center py-2 px-4 ml-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                </a>
                </div>
            </div>
        </section>
        <!-- Show product end-->

        <!-- Pagination end -->

    </div>
    <!-- Container have main content end -->

    <!-- Footer start -->
    <?php require('footer.php'); ?>
    <!-- Footer end -->

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>
</html>