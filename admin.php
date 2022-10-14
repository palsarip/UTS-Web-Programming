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
    <title>KOMODO - Admin Dashboard</title>
</head>
<?php
  session_start();
  require_once("./databases/db.php");

  if($_SESSION['Role'] !== 'Admin'){
    header("Location: ./index.php");
  }

  $sql = "SELECT * FROM user";
  $result = $db->prepare($sql);
  $result->execute();

  $sql2 = "SELECT * FROM post";

  $result2 = $db->prepare($sql2);
  $result2->execute();


?>
<body id="body" class="bg-blue-50 h-auto mb-[3em] lg:mb-auto">
    <nav class="sticky top-0  w-full h-auto bg-white m-auto py-4 drop-shadow-md z-10">
        <div class="flex justify-between mx-auto px-4 sm:px-6 lg:px-[2rem] xl:px-[10rem]">
            <a href="index.php" class="text-2xl font-black"><span class="text-blue-500">KOM</span>ODO</a>
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
                <img class="h-10 w-10 rounded-full" src="./uploads/profile/'.$_SESSION['Picture'].'" alt="">
              </a>
            </div>
              <div class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
                <a href="./login.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Login</a>
                <a href="register.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Signup</a>
            </div>
          </div>';
          }else{
            echo '<div class="inset-y-0 right-0 flex items-center">
              <div class="relative ml-3">
                <div>
                  <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-10 w-10 rounded-full" src="./uploads/profile/'.$_SESSION['Picture'].'" alt="">
                  </button>
                </div>';
                echo '<div id="user-menu-dropdown" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >';
                echo '<p class="block px-4 py-2 text-md text-blue-500 font-extrabold" role="menuitem" tabindex="-1" id="user-menu-item-1">'.$_SESSION['Username'].'<p>';
                echo '<hr class="mx-[0.5rem]">';
                echo '<div class="my-2">';
                echo '<a href="./profile.php?id='.$_SESSION['ID_User'].'" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Your Profile</a>';
                echo '  <a href="./databases/process/logout_process.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>';
                echo '</div>
                </div>
              </div>';
          }
        ?>
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
                    <a id="home" href="./index.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                      <svg id="home"  aria-hidden="true"  class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                      </svg>
                      <span class="ml-3 font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="./explore.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z" clip-rule="evenodd" />
                      </svg>
                      </svg>
                      <span class="ml-3 font-semibold">Explore</span>
                    </a>
                </li>
                <?php
                  if((!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])) || $_SESSION['Role'] !== 'Admin'){
                    echo '';
                  }else{
                    echo '
                    <li>
                    <a href="./admin.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white bg-blue-500 drop-shadow-md text-white">
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="ml-3 font-semibold">Admin</span>
                    </a>
                </li>
                    ';
                  }
                ?>
              </ul>
          </div>
        </aside>
      </div>
          <div class="w-full rounded-md shadow-lg mb-[3em]">
          <div class="w-full h-[8em] md:h-[9em] xl:h-[7em] bg-gradient-to-r from-sky-500 to-blue-500 rounded-t-md p-[1em] pt-[2em] ">
            <div class="flex justify-start mr-0 md:ml-2 xl:ml-5">
                <span class="text-[32px] mx-auto md:mx-[0] text-white font-extrabold">Admin Dashboard</span>
            </div>
            </div>
            <div class="w-full h-[auto] bg-white pl-[1.5em] pr-[1.5em] pb-[1.5em] pt-[0.65em] md:pl-[2em] md:pr-[2em] md:pb-[2em] md:pt-[0.5em] rounded-md ">
              <div class="mt-[1em] xl:mt-[2em]">
                <div class="">
                    <div class="w-full md:w-[12em] mb-5 bg-blue-500 rounded-lg px-5 py-3 text-white text-center text-lg font-extrabold shadow-md">
                        User Management
                    </div>
                    <div>
                        <div class="overflow-x-auto max-h-[35em] relative shadow-md rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 bg-gray-100">
                                <thead class="text-xs font-extrabold text-white uppercase bg-blue-500">
                                    <tr>
                                        <th scope="col" class="py-4 px-6">
                                            User ID
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                First Name
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Last Name
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Username
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Email
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                User Key
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Status
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr class'bg-white border-b'>
                                            <td class='py-[2em] px-6 text-black font-extrabold'>
                                                {$row['ID_User']}
                                            </td>
                                            <td class='py-[2em] px-6 text-black'>
                                                {$row['First_Name']}
                                            </td>
                                            <td class='py-[2em] px-6 text-black'>{$row['Last_Name']}</td>
                                            <td class='py-[2em] px-6 text-black'>{$row['Username']}</td>
                                            <td class='py-[2em] px-6 text-black'>{$row['Email']}</td>
                                            <td class='py-[2em] px-6 text-black'>{$row['User_Key']}</td>
                                            <td class='py-[2em] px-6 text-black'>
                                              <form class='flex' action='./databases/process/user_status_process.php?id={$row['ID_User']}' method='POST'>
                                                <select name='Status' class='my-auto mr-3 bg-[#F5F5F5] text-black font-bold px-4 rounded'>
                                                  <option value=''>{$row['Status']}</option>
                                                  <option value='Safe'>Safe</option>
                                                  <option value='Temporary'>Temporary Ban</option>
                                                  <option value='Banned'>Permanent Ban</option>
                                                </select>
                                                <button type='submit' name='submit' class='font-medium py-3 px-3 text-white rounded-md bg-green-500 hover:bg-green-700 ease-out duration-100'>Update</button>
                                                </form>
                                            </td>
                                            <td class='py-[2em] px-6 text-black'>
                                                <div class='flex items-center space-x-4'>
                                                    <a href='profile.php?id={$row['ID_User']}' class='font-medium py-3 px-3 text-white rounded-md bg-blue-500 hover:bg-blue-700 ease-out duration-100'>
                                                        Profile
                                                    </a>
                                                    <a href='./databases/process/delete_user_process.php?id={$row['ID_User']}' class='font-medium py-3 px-3 text-white rounded-md bg-red-500 hover:bg-red-700 ease-out duration-100'>
                                                    Delete
                                                  </a>
                                                </div>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
                <hr class="my-[2em]">
                <div class="">
                    <div class="w-full md:w-[12em] mb-5 bg-blue-500 rounded-lg px-5 py-3 text-white text-center text-lg font-extrabold shadow-md">
                        Post Management
                    </div>
                    <div>
                        <div class="overflow-x-auto max-h-[35em] relative shadow-md rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 bg-gray-100">
                                <thead class="text-xs font-extrabold text-white uppercase bg-blue-500">
                                    <tr>
                                        <th scope="col" class="py-4 px-6">
                                            POST ID
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Title
                                            </div>
                                        <!-- </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Likes
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Comments
                                            </div>
                                        </th> -->
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Category
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Date
                                            </div>
                                        </th>
                                        <th scope="col" class="py-4 px-6">
                                            <div class="flex items-center">
                                                Creator
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr class'bg-white border-b'>
                                            <td class='py-[2em] px-6 text-black font-extrabold'>
                                                {$row2['ID_Post']}
                                            </td>
                                            <td class='py-[2em] px-6 text-black'>
                                                {$row2['Title']}
                                            </td>
                                            <td class='py-[2em] px-6 text-black'>{$row2['Category']}</td>
                                            <td class='py-[2em] px-6 text-black'>{$row2['Created_At']}</td>
                                            <td class='py-[2em] px-6 text-black'>{$row2['Creator_Username']}</td>
                                            <td class='py-[2em] px-6 text-black'>
                                                <div class='flex items-center space-x-4'>
                                                    <a href='profile.php?id={$row2['Created_At']}' class='font-medium py-3 px-3 text-white rounded-md bg-blue-500 hover:bg-blue-700 ease-out duration-100'>
                                                        Post
                                                    </a>
                                                    <a href='./databases/process/delete_post_process.php?id={$row2['ID_Post']}' class='font-medium py-3 px-3 text-white rounded-md bg-red-500 hover:bg-red-700 ease-out duration-100'>
                                                        Delete
                                                    </a>
                                                </div>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
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
              <a href="./index.php" class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
              </a>
                </div>
            <div>
                <a href="./explore.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z" clip-rule="evenodd" />
                  </svg>
              </a>
            </div>
            <?php
                  if((!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])) || $_SESSION['Role'] !== 'Admin'){
                    echo '';
                  }else{
                    echo '
                    <div>
                      <a href="./admin.php"" class="text-blue-500">
                        <svg aria-hidden="true" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                      </a>
                    </div>
                    ';
                  }
                ?>
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