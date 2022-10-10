<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./config/tailwind.config.js?version=1"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    
    <title>KOMODO - Login</title>
</head>
<?php
    session_start();
    require_once("databases/db.php");
    if(isset($_SESSION['ID_User'])){
        header("Location: index.php");
    }
?>
<body id="body" class="bg-blue-50 ">
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-white text-black rounded-3xl shadow-lg w-full overflow-hidden" style="max-width:70em">
            <div class="md:flex w-full">
                <div class="hidden md:flex w-1/2 bg-gradient-to-tr from-sky-500 to-blue-500 i justify-around items-center">
                    <div>
                        <span class="text-[4rem] font-black text-white">KOMODO</span>
                    </div>
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-extrabold text-lg text-gray-900">Hello again!</h1>
                        <p>Let's login to your account</p>
                    </div>
                    <div>
                    <form action="./databases/process/login_process.php" method="POST">
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Username</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                    <input type="text" name="Username"  class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-250 outline-none focus:border-blue-500 ease-out duration-100" placeholder="johnthor" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" name="Password"  class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500 ease-out duration-150" placeholder="************" required>
                                </div>
                                <div>
                                    <a href="#" class="mt-2 text-xs text-gray-500 float-right hover:text-blue-500">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button type="submit" class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-600 focus:bg-indigo-600 text-white rounded-lg px-3 py-3 font-extrabold ease-out duration-100">Login</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                    <div class="text-center mt-6">
                        <p class="text-gray-500">Don't have an account? <a href="register.php" class="text-blue-500 hover:text-blue-600 font-semibold">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>