<?php
    $Token = $_COOKIE['TokenID'];

    $sqlSelectProductsInCart = "SELECT Products.Image AS Image,
                                Carts.ID AS CartID,
                                Products.ID AS ID,
                                Products.Name AS Name, 
                                Products.Price-Products.Price*Products.Sale/100 AS Price,
                                Carts.Quantity AS Quantity,
                                (Products.Price-Products.Price*Products.Sale/100)*Carts.Quantity AS Sum
                                FROM Carts 
                                JOIN Products ON Carts.Product_id = Products.ID
                                WHERE User_id = (SELECT ID FROM Users WHERE Token = '$Token')"  ;  

    require("../../connect.php");

    $recordProducts = select($sqlSelectProductsInCart);
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
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="../home.php" class="flex items-center">
            <img src="https://images-platform.99static.com//Rbp6UTD5R54GLM04Xnw1qI-BKC4=/708x713:1297x1301/fit-in/590x590/99designs-contests-attachments/126/126734/attachment_126734144" class="mr-3 h-6 sm:h-9" alt="Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Techmall</span>
        </a>
        <div class="flex items-center md:order-2">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src= <?=$Avatar?> alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="py-3 px-4">
                <span class="block text-sm text-gray-900 dark:text-white"><?=$Full_name?></span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?=$Email?></span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                <li>
                    <a href="../Profile/profilePage.php?ID=<?php echo $ID?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Your profile</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <a href="../Signing/signOutProcess.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </li>
                </ul>
            </div>
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2" style="width: 50%;">
        <form style="width : 100%">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        </div>
        </div>
    </nav>
    <!-- nav and tab end -->

    <!-- Container have main content start -->
    <div class="w-[80%] h-fit mt-[15px] mx-[10%]">

        <!-- Suggestion start-->
        <section class="bg-white dark:bg-gray-900 rounded-3xl mt-[50px]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-3xl">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Cart<?=$recordSNOT[0][0]?></h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">All products in cart <?=$recordSNOT[0][0]?></p>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-1 sm:gap-1 xl:gap-2 lg:space-y-0">

                    <!-- Pricing Card -->

                    <form action="buy.php" method="get">

                        <?php foreach ($recordProducts as $record){ ?>
                        <div class=" w-full h-[200px] lg:grid lg:grid-cols-9 justify-items-center items-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ">
                            
                            <div class="text-center">
                                <input id="link-checkbox" type="checkbox" name= "product[]" value=<?=$record["ID"]?> class=" w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
    
                            <a class="col-span-2" href="../product.php?ID=<?= $record['ID'] ?>">
                                <img class="p-4 rounded-t-lg h-[200px]" src=<?= $record["Image"]?> alt="product image" />
                            </a>
                            
                            <div class="col-span-2">
    
                                <span class = "inline-block align-middle">
                                    <?=$record["Name"]?>
                                </span> 
                            </div>
    
                            <div>
                                <?=number_format($record["Price"],0)?>
                            </div>
    
                            <div>
                                <?=$record["Quantity"]?>
                            </div>
    
                            <div class="text-red-500">
                                <?=number_format($record["Sum"],0)?>
                            </div>
    
                            <a href="deleteProductInCart.php?cartID=<?=$record["CartID"]?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
    
    
                            
                        </div>
                        <?php }; ?>
    
                        <div class=" w-full h-[200px] lg:grid lg:grid-cols-7 justify-items-center items-center bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 ">
                            <div class="text-center">
                                <input id="checkAll" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
    
                            <div>
                                <button onclick=selectAll() type="button">
                                    Select all
                                </button>
                            </div>
    
                            <div>
                                <button onclick = deleteAll() type="button">
                                    Delete
                                </button>
                            </div>
    
                            <div>Sum:</div>
    
                            <div class="col-span-2" id = "sum">0 vnd</div>
    
                            <a href="buy.php">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buy</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Suggestion end-->

    </div>
    <!-- Container have main content end -->

    <!-- Footer start -->
    <?php require('../footer.php'); ?>
    <!-- Footer end -->

    <script>
        var sum = 0;
        var check = document.getElementById('checkAll');
        
        
        var listInput = document.getElementsByClassName("w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600");
        function selectAll() {
            check.checked = true;
            sum  = 0;
            for (var i = 0; i < listInput.length - 1; i++){
                listInput[i].checked = true;
                sum+=Number(listInput[i].value);
            }
            document.getElementById('sum').innerHTML = sum+ ' vnd';   
        };

        function deleteAll() {
            sum = 0;
            check.checked = false;
            for (var i = 0; i < listInput.length - 1; i++){
                listInput[i].checked = false;        
            }
            document.getElementById('sum').innerHTML = sum+ ' vnd';
        }
        
        check.addEventListener('change', function() {
            if(this.checked){
                sum  = 0;
                for (var i = 0; i < listInput.length - 1; i++){
                    listInput[i].checked = true;
                    sum+=Number(listInput[i].value);
                }
                document.getElementById('sum').innerHTML = sum+ ' vnd';                

            }else{
                sum = 0;
                for (var i = 0; i < listInput.length - 1; i++){
                    listInput[i].checked = false;        
                }
                document.getElementById('sum').innerHTML = sum+ ' vnd';                
            }
        });

        

        for(var i = 0; i < listInput.length - 1; i++){
            listInput[i].addEventListener('change', function() {
                if(this.checked){
                    sum += Number(this.value);
                    document.getElementById('sum').innerHTML = sum + ' vnd';                
                }else{
                    sum -= Number(this.value);
                    document.getElementById('sum').innerHTML = sum + ' vnd'; 
                }
            })
        };

        <?php if(isset($_GET['checked'])){ ?>
        
        for(var i = 0; i < listInput.length -1; i++){
            console.log(listInput[i].value);
            console.log(<?=$_GET['checked']?>);
            if(listInput[i].value == <?=$_GET['checked']?>){
                listInput[i].checked = true;
                document.getElementById('sum').innerHTML = Number(listInput[i].value) + ' vnd'; 
            }
        }
        
        <?php } ?>



        
    </script>

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>
</html>