<?php

    if(isset($_GET['errorSignUp'])){
        $errorSignUp = $_GET['errorSignUp'];
    }
    if(isset($_GET['errorLogin'])){
        $errorLogin = $_GET['errorLogin'];
    }
    
    session_start();
    if(isset($_SESSION['ID'])){
        $ID = $_SESSION['ID'];
        header("Location: ../home.php");
    }
    if(isset($_COOKIE['ID'])){
        $ID = $_COOKIE['ID'];
        header("Location: ../home.php");
    }

    
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
    
    
<!-- Modal toggle -->
<!-- Modal toggle -->

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="false" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full"
    style = "background-image: url(https://w7.pngwing.com/pngs/975/55/png-transparent-seamless-pattern-design-fill-background-halftone-wallpaper-repeating-decoration-square.png);  ">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto" style="margin: 0 auto; top: 10%;">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                
                
                <form class="space-y-6" action="loginProcess.php" method = "post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    
                        
                    <?php 
                        if(isset($_GET['errorSignUp'])){
                            $errorSignUp = $_GET['errorSignUp'];
                            echo "<div style = 'height: 15px; font-size: 14px; margin-bottom: 5px; color: green; font-weight: bold'>Sign up sucessfully, now you can sign in here.</div>";
                        }
                        if(isset($_GET['errorLogin'])){
                            $errorLogin = $_GET['errorLogin'];
                            if($errorLogin == '1'){ 
                                echo "<div style = 'height: 15px; font-size: 14px; margin-bottom: 5px; color: red; font-weight: bold'> Your email is incorrect </div>";
                            };
                            if($errorLogin == '2'){ 
                                echo "<div style = 'height: 15px; font-size: 14px; margin-bottom: 5px; color: red; font-weight: bold'> Your password is incorrect </div>";
                            };
                        
                        }

                    ?>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="signUpPage.php" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                    </div>
                </form>
            
            
            </div>
        </div>
    </div>
</div> 


<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>
</html>

