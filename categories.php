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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>KOMODO - Categories</title>
</head>
<?php
  session_start();
  require_once("./databases/db.php");

  $get_category = $_GET['category'];
?>
<body id="body" class="bg-blue-50 h-auto">
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
                    <a href="./explore.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white bg-blue-500 drop-shadow-md text-white">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
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
                    <a href="./admin.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
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
          <div class="w-full rounded-md mb-[3em]">
            <div class="w-full">
                  <div class="w-full h-[auto]">
                    <?php
                        require_once('./controller/time_converter.php');
                        
                        $sql = "SELECT * FROM post WHERE Category = '$get_category'";
                        $result = $db->prepare($sql);
                        $result->execute();

                    while($data = $result->fetch(PDO::FETCH_ASSOC)){
                        $sqlComments = "SELECT * FROM Comments WHERE ID_Post = " . $data['ID_Post'];
            
                        $commentRes = $db->prepare($sqlComments);
                        $commentRes->execute();
                        echo ' <div class="w-full mb-[3em]">
                        <div class=" bg-white shadow-lg rounded-md p-5">
                          <div class="flex">
                            <div id="vote" class="hidden mr-[1em] lg:block">
                              <div class="inline w-[2em] text-center">
                                <button type="button" onclick="likeController()">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 hover:text-blue-500 cursor-pointer ease-in-out duration-200">
                                  <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" /></svg>
                                </button>
                                <p class="font-bold">'.$data['Likes'].'</p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-1 hover:text-red-500 cursor-pointer ease-in-out duration-200">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" /></svg>
                              </div>
                            </div>
                            <div>
                            <div class="flex">
                                    <button type="button" class="flex my-3 rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                                      <span class="sr-only">Open user menu</span>
                                      <a href="profile.php?id='.$data['Creator_ID'].'">
                                        <img class="h-10 w-10 rounded-full" src="./uploads/profile/'.$data['Creator_Picture'].'" alt="">
                                      </a>
                                    </button>
                                    <div class="flex my-auto ml-3">
                                        <p class="my-auto text-gray-500 text-sm">
                                          <span class="font-extrabold text-blue-500">'.$data['Creator_Username'].'</span>
                                          '.time_elapsed_string($data['Created_At']).'
                                        </p>
                                    </div>
                            </div>
                            <div id="discussion" class="w-[80vw] md:w-[90vw] lg:w-[65vw] xl:w-[52.5vw]">
                                <div>
                                  <div class="mt-2 text-lg font-extrabold">
                                    <p >'.$data['Title'].'</p>
                                  </div>
                                </div>
                                <div class="my-3">
                                  <div class="text-md font-normal">
                                    <p>'.$data['Description'].'</p>
                                  </div>
                                </div>
                                <div>
                                  <hr class="mb-[1em]">
                                  <div class="flex justify-between">
                                    <div id="vote" class="flex my-3 lg:hidden">
                                      <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:text-blue-500 ease-in-out duration-200">
                                          <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-gray-500 mx-2">'.$data['Likes'].'</p>
                                      </div>
                                      <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 hover:text-red-500 ease-in-out duration-200">
                                          <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                        </svg>
                                      </div>
                                    </div>
                                    </div>
                                    <div id="discusison-footer-action" class="my-auto">
                                    <button type="button" class="comment-button flex text-gray-500 hover:text-blue-500 hover:fill-blue-500 cursor-pointer">
                                    <div class="hidden md:inline-flex">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                      </svg>
                                      <p class="my-auto mx-2 text-sm">'.''.'</p>
                                    </div>
                                    <div class="inline-flex md:hidden">
                                      <p class="my-auto text-sm">'.'Show comments'.'</p>
                                    </div>
                                    </button>
                                    <div id="'.$data['ID_Post'].'" class="comment-section w-full mt-[1.5em]">
                                      <form action="./databases/process/comment_process.php" method="POST">
                                        <div class="block md:flex justify-between">
                                          <div class="flex justify-start md:block w-[5em]">
                                            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                                              <span class="sr-only">Open user menu</span>
                                              <img class="h-10 w-10 rounded-full" src="./uploads/profile/'.$_SESSION['Picture'].'" alt="">
                                            </button>
                                          </div>
                                            <div class="flex w-full mx-auto my-3 md:my-0 md:ml-[0.5em] md:mr-[1.5em]">
                                              <textarea id="message" name="Comment" rows="4" class="form-control block max-h-[3em] p-2.5 w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder="Enter your comment..." required></textarea>
                                              <input type="hidden" name="post_id" value="'.$data['ID_Post'].'" />
                                            </div>
                                          <div class="flex justify-end">
                                          <button type="submit" class="flex items-center justify-center py-2 px-3 w-[8em] max-h-[2.25em] my-0 text-base font-normal rounded-full bg-blue-500 text-white hover:bg-blue-600 ease-out duration-100">
                                              <span class="text-sm font-bold mt-0.5 ml-1">Add Comment</span>
                                          </buttton>
                                          </div>
                                        </div>
                                      </form>
                                      <div class="mt-[1.5em] max-h-[15em] overflow-y-auto">';
                                      while($comment = $commentRes->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                                        <div id="public-comment" class="mt-[1.5em] max-h-[15em] overflow-y-auto">
                                        <div class="block mb-[1.5em]">
                                            <div class="flex">
                                                <div class="">
                                                
                                            </div>
                                      <div class="flex w-full mx-auto my-3 md:my-0 md:ml-[0em] md:mr-[1.5em]">
                                        <div>
                                          <div class="flex">
                                              <p class="my-auto font-extrabold text-blue-500 text-md">'.$comment['Username'].'</p>
                                                  <p class="my-auto ml-4 text-gray-500 text-md">1 day ago</p>
                                          </div>
                                              <div class="">
                                                  <p class="text-black text-sm md:text-md leading-tight">'.$comment['Comment'].'</p>
                                              </div>
                                          </div>
                                          </div>
                                          </div>
                                         </div>
                                     </div>
                                     <hr class="mr-0 md:mr-5">
                                        ';
                                      }
                                    echo '</div>
                                    </div>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>' ;
                      }
                        ?>
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
                <a href="./explore.php" class="text-blue-500">
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
                      <a href="./admin.php"">
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
      $(document).ready(function() {
          var $par = $('div.comment-section');
          $par.hide();
          $('.comment-button').click(function(e) {
            var $comm = $(this).siblings('.comment-section').slideToggle('slow');
            $par.not($comm).slideUp('slow');
            e.preventDefault();
          });
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>