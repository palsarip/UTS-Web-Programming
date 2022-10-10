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
    <title>KOMODO - Your Profile</title>
</head>
<?php
  session_start();
  require_once("./databases/db.php");

  $id = $_SESSION['ID_User'];
  $sql = "SELECT * FROM user WHERE ID_User = ?";
  $stmt = $db->prepare($sql);
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<body id="body" class="bg-blue-50 h-auto">
    <nav class="sticky top-0  w-full h-auto bg-white m-auto py-4 drop-shadow-md z-10">
        <div class="flex justify-between mx-auto px-4 sm:px-6 lg:px-[2rem] xl:px-[10rem]">
            <a href="index.php" class="text-2xl font-black"><span class="text-blue-500">KOM</span>ODO</a>
            <div class="hidden w-96 md:flex">
                <form class="w-full max-w-md hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 ">   
                    <label class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" class="bg-slate-100 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 focus:outline-none focus:border-blue-500 focus:ring-blue-500 block w-full rounded-md sm:text-md focus:ring-2 ease-out duration-200" placeholder="Search for Discussions" required="">
                    </div>
                </form>
            </div>
        <?php
          if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
            echo '<div class="hidden lg:flex">
            <a href="register.php" class="flex mr-4 items-center justify-center px-[2rem] py-2 w-full rounded-full bg-none border-2 border-blue-500 text-black hover:bg-blue-600 hover:text-white ease-out duration-100">
                <span class="text-md font-bold">Signup</span>
            </a>
            <a  href="./login.php" class="flex items-center justify-center px-[2rem] py-2 w-full rounded-full bg-blue-500 text-white hover:bg-blue-600">
                <span class="text-md font-bold">Login</span>
            </a>
          </div>
          <div class="relative ml-3 block lg:hidden">
            <div>
              <a type="button" class="flex rounded-full bg-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-10 w-10 rounded-full" src="https://svgsilh.com/svg/659651-9e9e9e.svg" alt="">
              </a>
            </div>
              <div class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
                <a href="./login.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Login</a>
                <a href="register.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Signup</a>
            </div>
          </div>';
          }else{
            echo '<div class="inset-y-0 right-0 flex items-center">
                    <button type="button" class="rounded-full p-1 text-gray-400 hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200">
                      <span class="sr-only">View notifications</span>
                      <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                      </svg>
                    </button>
              <div class="relative ml-3">
                <div>
                  <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </button>
                </div>';
                echo '<div id="user-menu-dropdown" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >';
                echo '<p class="block px-4 py-2 text-md text-blue-500 font-extrabold" role="menuitem" tabindex="-1" id="user-menu-item-1">'.$_SESSION['Username'].'<p>';
                echo '<hr class="mx-[0.5rem]">';
                echo '<div class="my-2">';
                echo '<a href="./profile.php?user='.$_SESSION['Username'].'" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Your Profile</a>';
                echo '<a href="#" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>';
                echo '  <a href="./databases/process/logout_process.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>';
                echo '</div>
                </div>
              </div>';
          }
        ?>
            <div id="user-menu-dropdown" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="./databases/process/logout_process.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
    </nav>
    <div class="w-full flex justify-between mt-[3rem] px-[1rem] lg:pl-[14em] lg:pr-[2em] xl:pl-[26em] xl:pr-[10em]">
      <div id="left-sidebar" class="hidden lg:block fixed left-0 ml-[1em] md:ml-[1.5em]  lg:w-[10em] lg:ml-[2em] xl:w-[13em] xl:ml-[10em]">
        <aside aria-label="Sidebar">
            <div>
                <p class="text-sm font-bold text-gray-500">MENU</p>
              </div>
          <div class="overflow-y-auto py-4">
          <ul class="space-y-2">
                <li>
                    <a id="home" href="../UTS/index.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                      <svg id="home"  aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                      </svg>
                      <span class="ml-3 font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                      <svg  aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z" clip-rule="evenodd" />
                      </svg>
                      <span class="ml-3 font-semibold">Explore</span>
                    </a>
                </li>
          </div>
        </aside>
      </div>
      <div id="profile" class="w-full rounded-md shadow-lg mb-[6em]">
          <div class="w-full h-[8em] md:h-[9em] xl:h-[9.5em] bg-gradient-to-r from-sky-500 to-blue-500 rounded-t-md p-[1em] pt-[2em] ">
            <div class="flex justify-end mr-0 md:mr-2 xl:mr-4">
              <?php
                echo '<span class="text-xl text-white font-extrabold">'.$row['Role'].'</span>';
              ?>
            </div>
                <div id="profile-header" class="flex absolute">
                    <div class=" ml-[0em] md:ml-[1em] xl:ml-[2em] mt-[3em] bg-gray-500 rounded-full border-4 xl:border-8 border-white shadow-md">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="profile" class="rounded-full w-[5.5em] h-[5.5em] md:w-[7.5em] md:h-[7.5em] xl:w-[10em] xl:h-[10em]">
                    </div>
                    <div class="my-auto">
                      <div class="mt-[4em] mb-0 md:mb-1 ml-[0.5em] md:ml-[1em] xl:mt-[3em] flex">
                        <?php
                          echo '<h1 class="text-lg font-extrabold text-black xl:text-xl">'.$row['First_Name'].'</h1>'.'&nbsp'.'<h1 class="text-lg xl:text-xl font-extrabold text-black">'.$row['Last_Name'].'</h1>';
                        ?>
                      </div>
                      <div class="ml-[0.5em] md:ml-[1em] ">
                        <?php
                          echo '<h1 class="text-sm xl:text-base font-normal text-gray-500">'.$row['Username'].'</h1>';
                        ?>
                      </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-[auto] bg-white rounded p-[1.5em] ">
              <div class="flex mt-[5em]">
                  <form action="">
                    <div class="flex">

                      <div class="w-1/2 pr-1.5 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">First name</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="First_Name" class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500 ease-out duration-100" value="<?= $row['First_Name'] ?>" placeholder="" required>
                                    </div>
                                </div>
                                <div class="w-1/2 pl-1.5 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Last name</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="Last_Name"  class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500 ease-out duration-100" value="<?= $row['Last_Name'] ?>" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Username</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="Username"  class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-250 outline-none focus:border-blue-500 ease-out duration-100" value="<?= $row['Username'] ?>" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Email</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                        <input type="email" name="Email" class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-250 outline-none focus:border-blue-500 ease-out duration-100" value="<?= $row['Email'] ?>" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    <div id="on-mobile-navbar" class="lg:hidden">
      <div class="fixed bottom-0 left-0 w-full bg-white shadow-lg">
        <div class="flex justify-between items-center px-10 py-3 sm:px-[10em] text-gray-500">
            <div>
              <a href="../UTS/index.php" class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
              </a>
                </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z" clip-rule="evenodd" />
              </svg>
            </div>
        </div>
      </div>
    </div>
    </div>
</div>
    <script>
      $(document).ready(function(){
        $("#user-menu-button").click(function(){
          $("#user-menu-dropdown").toggleClass("hidden");
        });
      });
      $(document).ready(function(){
        $("#add-discussion").click(function(){
          $("#add-discussion-modal").toggleClass("hidden");
          $("#body").addClass("overflow-hidden");
        });
      });
      $(document).ready(function(){
        $("#add-discussion-cancel").click(function(){
          $("#add-discussion-modal").toggleClass("hidden");
          $("#body").removeClass("overflow-hidden");
        });
      });
      $(document).ready(function(){
        $("#add-discussion-quit").click(function(){
          $("#add-discussion-modal").toggleClass("hidden");
          $("#body").removeClass("overflow-hidden");
        });
      });
      $(document).ready(function(){
        $("#on-mobile-add-discussion").click(function(){
          $("#add-discussion-modal").toggleClass("hidden");
          $("#body").removeClass("overflow-hidden");
        });
      });
    </script>
</body>
</html>