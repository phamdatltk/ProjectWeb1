<?php
    if(isset($_COOKIE['TokenID'])){
        $TokenID = $_COOKIE['TokenID'];
    }
    if(isset($_GET['edit'])){
        $edit = $_GET['edit'];
    }


    $sqlSelect = "SELECT * FROM Users WHERE Token = '$TokenID'";
    require("../../connect.php");

    $records = mysqli_query($conn, $sqlSelect);
    $record = mysqli_fetch_array($records);
    $Full_name= $record['Full_name'];
    $Email = $record['Email'];
    $Gender = $record['Gender'];
    $Date_of_birth = $record['Date_of_birth'];
    $Phone_number = $record['Phone_number'];
    $Password = $record['Password'];
    $Avatar = $record['Avatar'];
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <title>Document</title>
</head>
<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center">
            <img src="https://ss-images.saostar.vn/wp700/2018/06/10/2968571/34689401_2147325555551794_7654281988110548992_n.jpg" class="mr-3 h-6 sm:h-9" alt="Logo" />
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
                    <a href="./Profile/profilePage.php?ID=<?php echo $ID?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Your profile</a>
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

    
    <div class="container flex flex-wrap items-center mx-auto" style= "margin-top:15px;">
        <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800" style = "width: 25%">
            <ul class="space-y-2">
                <li>
                    <a href="../home.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                    <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                    </a>
                </li>
                <li>
                    <a href="../Signing/signOutProcess.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <?php 
            if($edit == 1){
                $s = "user name";
            }
            if($edit == 2){
                $s = "password";
            }
            if($edit == 3){
                $s = "gender";
            }
            if($edit == 4){
                $s = "date of birth";
            }
            if($edit == 5){
                $s = "phone number";
            }
            $link = "./editProfileProcess.php?edit=".$edit; 

        ?>
    
            <form action=<?=$link?> style="margin-left: 5%" method = "post">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto" >
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text gray-900 dark:text-white"><?= "Edit your ".$s ?></h3>
        
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <?= "New ".$s ?> </label>
                                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if(isset($_GET['error'])){
                                        $error = $_GET['error'];
                                        echo "<div style = 'height: 15px; font-size: 14px; margin-bottom: 5px; color: green; font-weight: bold'>Invalid field.</div>";

                                    }
                                ?>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                
            
                        </div>
                    </div>
                </div>
            </form>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>