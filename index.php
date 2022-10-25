<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./config/tailwind.config.js?version=1"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>KOMODO</title>
</head>
<?php
  session_start();
  require_once("./databases/db.php");
?>
<body id="body" class="bg-blue-50 h-[auto] mb-[3em] lg:mb-auto">
    <nav class="sticky top-0  w-full h-auto bg-white m-auto py-4 drop-shadow-md z-10">
        <div class="flex justify-between mx-auto px-4 sm:px-6 lg:px-[2rem] xl:px-[10rem]">
            <a href="index.php" class="text-2xl font-black"><span class="text-blue-500">KOM</span>ODO</a>
        <?php
          if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
            echo '<div class="flex">
            <a href="register.php" class="flex mr-2 md:mr-4 items-center justify-center px-[1rem] md:px-[2rem] py-0 lg:py-2 w-full rounded-full bg-none border-2 border-blue-500 text-black hover:bg-blue-600 hover:text-white ease-out duration-100">
                <span class="text-md font-bold">Signup</span>
            </a>
            <a  href="./login.php" class="flex items-center justify-center px-[1rem] md:px-[2rem] py-0 lg:py-2 w-full rounded-full bg-blue-500 text-white hover:bg-blue-600">
                <span class="text-md font-bold">Login</span>
            </a>
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
            <div id="user-menu-dropdown" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="./databases/process/logout_process.php" class="block px-4 py-2 text-sm text-gray-700  hover:text-black ease-in-out duration-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
    </nav>
    <div class="w-full flex justify-center mt-[3rem] px-[1rem] lg:px-[13.5rem] xl:px-[25em] ">
      <div id="left-sidebar" class="hidden lg:block fixed left-0 ml-[1em] md:ml-[1.5em]  lg:w-[10em] lg:ml-[2em] xl:w-[13em] xl:ml-[10em]">
        <aside aria-label="Sidebar">
            <div>
                <p class="text-sm font-bold text-gray-500">MENU</p>
              </div>
          <div class="overflow-y-auto py-4">
              <ul class="space-y-2">
                <li>
                    <a id="home" href="./index.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white bg-blue-500 drop-shadow-md text-white">
                      <svg id="home"  aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
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

      <div class="block">
        <?php
          require_once('./controller/time_converter.php');

          $sqlPosts = "SELECT * FROM post ORDER BY Created_At DESC";

          // "SELECT *, COUNT(Comments.ID_Post) AS Comment_Count, FROM Post LEFT JOIN Comments ON Post.ID_Post = Comments.ID_Post GROUP BY Post.ID_Post ORDER BY Post.ID_Post DESC";

          // "SELECT * FROM post LEFT JOIN comments ON post.ID_Post = comments.ID_Post ORDER BY post.ID_Post DESC";

          // "SELECT * FROM comments LEFT JOIN post ON comments.ID_Post = post.ID_Post ORDER BY comments.ID_Comment DESC";

          $result = $db->prepare($sqlPosts);
          $result->execute();

          // $sqlComment =  "SELECT * FROM comments WHERE ID_POST";
          // $resultComment = $db->prepare($sqlComment);
          // $resultComment->execute();
          // $dataComment = $resultComment->fetch(PDO::FETCH_ASSOC);

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
                <div id="discussion" class="w-[80vw] md:w-[90vw] lg:w-[50vw] xl:w-[35vw]">
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
      <!-- <div id="body" class="w-full mb-[3em]">
            <div class="w-full bg-white shadow-lg rounded-md p-5">
              <div class="flex">
                <div id="vote" class="hidden mr-[1em] lg:block">
                  <div class="inline w-[2em] text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 hover:text-blue-500 cursor-pointer ease-in-out duration-200">
                    <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                  </svg>
                    <p class="font-bold">12</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-1 hover:text-red-500 cursor-pointer ease-in-out duration-200">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                  </svg>
                  </div>
                </div>
                <div id="post-header">
                <div id="wrapper" class="flex lg:hidden">
                        <button type="button" class="flex my-3 rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                          <span class="sr-only">Open user menu</span>
                          <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                        <div class="flex my-auto ml-3">
                          <div class="flex">
                            <p class="font-extrabold text-blue-500">John Thor</p>
                            <p class="my-auto text-gray-500 mx-2">•</p>
                            <p class="text-gray-500">1 day ago</p>
                          </div>
                      </div>
                </div>
                <div id="discussion" class="">
                    <div id="disscussion-header" >
                      <div class="mt-2 text-lg font-extrabold">
                        <p >What does the fox say?</p>
                      </div>
                    </div>
                    <div id="discussion-body" class="my-3">
                      <div class="text-md font-normal">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates non vero, at fugit ipsa tempora? Quam quisquam voluptatem dolor illum! Magnam quos impedit odit odio nam veniam eligendi, corporis porro.</p>
                      </div>
                    </div>
                    <div id="discussion-footer">
                      <hr>
                      <div id="discussion-footer-wrapper" class="flex justify-between">
                        <div id="vote" class="flex my-3 lg:hidden">
                          <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:text-blue-500 ease-in-out duration-200">
                              <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-500 mx-2">12</p>
                          </div>
                          <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 hover:text-red-500 ease-in-out duration-200">
                              <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>
                          </div>
                        </div>
                        <div id="on-dekstop-footer" class="hidden flex lg:flex">
                          <button type="button" class="flex my-3 rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500 ease-out duration-200" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-7 w-7 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                          </button>
                          <div class="flex my-auto ml-3">
                            <div class="flex">
                              <p class="my-auto text-gray-500 text-sm">Posted by &nbsp</p>
                              <p class="my-auto font-extrabold text-blue-500 text-sm">John Thor</p>
                              <p class="my-auto text-gray-500 ml-5 text-sm">1 day ago</p>
                            </div>
                      </div>
                        </div>
                        <div id="discusison-footer-action" class="my-auto">
                          <div id="comment" class="flex text-gray-500 hover:text-blue-500 hover:fill-blue-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <p class="my-auto mx-2 text-sm">5</p>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div> -->
    <div id="right-sidebar" class="hidden lg:block fixed right-0 mr-[1em] md:mr-[1.5em] lg:mr-[2em] xl:mr-[10em] lg:w-[10em] xl:w-[13em] drop-shadow-lg">
        <aside aria-label="Sidebar">
          <div class="overflow-y-auto">
                <?php
                  if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
                    echo '';
                  }else{
                    echo '
                    <div class="mb-[2rem]">
                    <button id="add-discussion" href="#" class="flex items-center justify-center p-2 w-full text-base font-normal rounded-md bg-gradient-to-r from-sky-500 to-blue-500 text-white hover:bg-blue-600 ">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                      </svg>
                      </svg>
                        <span class="text-md font-bold mt-0.5 ml-1">Add Discussion</span>
                    </buttton>
                    </div>  
                    ';
                  }
                  ?>
                    <div class="p-5 bg-white rounded-md">
                      <div class="mb-5">
                        <p class="text-md font-extrabold">Top Categories</p>
                      </div>
                      <?php
                        $sqlCategories = "SELECT Category, COUNT(Category) AS Total FROM post GROUP BY 1 ORDER BY 2 DESC LIMIT 5";
                        $resultCategories = $db->prepare($sqlCategories);
                        $resultCategories->execute();

                        while($dataCategories = $resultCategories->fetch(PDO::FETCH_ASSOC)){
                          echo '
                          <div class="my-auto flex mb-[1em]">
                          <div>
                            <a href="./categories.php?category='.$dataCategories['Category'].'" class="my-auto font-bold text-blue-500">
                              '.$dataCategories['Category'].'
                            </a>
                          </div>
                            <div class="ml-auto">
                              <p class="my-auto text-gray-500 text-sm leading-[2]">'.$dataCategories['Total'].'</p>
                          </div>
                        </div>
                          ';
                        }
                      ?>
                     
          </div>
        </aside>
      </div>
    <div id="on-mobile-navbar" class="lg:hidden">
      <div class="fixed bottom-0 left-0 w-full bg-white shadow-lg">
        <div class="flex justify-between items-center px-10 py-3  text-gray-500">
            <div>
              <a href="./index.php" class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
              </a>
                </div>
                <?php
                  if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
                    echo '

                    ';
                  }else{
                    echo '
                    <div>
                      <button id="on-mobile-add-discussion" type="button" class="flex">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="url(#grad1)" stroke="none" class="w-8 h-8">
                          <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                              <stop offset="0%" style="stop-color:#0ea5e9;stop-opacity:1" />
                              <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                            </linearGradient>
                          </defs>
                          <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                        </svg>
                      </button>
                    </div>
                    ';
                  }
                ?>
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
    <div id="add-discussion-modal" class="fixed inset-0 bg-gray-500 bg-opacity-80 transition-opacity hidden z-20">
      <div class="fixed inset-0  overflow-y-auto ">
        <div class="flex min-h-full items-end justify-center p-4 text-left sm:items-center sm:p-0">
          <form action="./databases/process/post_process.php" method="POST">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:block sm:items-start">
                <div class="mt-3 text-left sm:mt-0">
                  <div class="flex items-center justify-between">
                    <h3 class=" text-lg font-black leading-6 text-black" id="modal-title">New Discussion</h3>
                    <div>
                      <button id="add-discussion-quit" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                          <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <hr class="my-4">
                  <div class="mt-2">
                      <div class="mb-5">
                        <label for="discussion-title"><span class="text-md font-extrabold text-black">Title</span></label>
                        <input type="text" name="Title"  class="form-control w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder="Enter your title..." required>
                        <p class="text-sm text-gray-500">The header must contain a maximum of 30 characters</p>
                      </div>
                      <div class="mb-5">
                        <label for="discussion-description" class="block text-md font-extrabold text-black">Description</label>
                          <textarea id="message" name="Description" rows="4" class="form-control block min-h-[5em] max-h-[10em] p-2.5 w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder="Enter your description..." required></textarea>
                          <p class="text-sm text-gray-500">Give your theme some purpose. Description of what it will be used for</p>
                      </div>
                      <!-- <div class="mb-5">
                        <label for="discussion-title"><span class="text-md font-extrabold text-black ">Categories</span></label>
                        <ul class="grid gap-6 w-full md:grid-cols-3 mt-1 ">
                          <li>
                            <input type="checkbox" name="Category[]" id="php-option" value="php" class="form-control hidden peer" required="">
                              <label for="php-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500  hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" />
                                <div class="w-full text-md font-semibold">PHP</div>
                              </label>
                          </li>
                          <li>
                            <input type="checkbox" id="c-option" name="Category[]" value="c" class="form-control hidden peer" required="">
                              <label for="c-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500 hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/c/c-original.svg" />
                                <div class="w-full text-md font-semibold">C</div>
                              </label>
                          </li>
                          <li>
                            <input type="checkbox" id="javascript-option" name="Category[]" value="javascript" class="form-control hidden peer" required="">
                              <label for="javascript-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500  hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" />
                                <div class="w-full text-md font-semibold">Javascript</div>
                              </label>
                          </li>
                          <li>
                            <input type="checkbox" id="java-option" name="Category[]" value="java" class="form-control hidden peer" required="">
                              <label for="java-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500  hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" />
                                <div class="w-full text-md font-semibold">Java</div>
                              </label>
                          </li>
                          <li>
                            <input type="checkbox" id="python-option" name="Category[]" value="python" class="form-control hidden peer" required="">
                              <label for="python-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500  hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" />
                                <div class="w-full text-md font-semibold">Python</div>
                              </label>
                          </li>
                          <li>
                            <input type="checkbox" id="swift-option" name="Category[]" value="swift" class="form-control hidden peer" required="">
                              <label for="swift-option" class="inline-flex justify-between items-center px-3 py-1 w-full text-gray-500 bg-white rounded-lg border-2 border-gray-200 cursor-pointer peer-checked:border-blue-500 hover:text-gray-600 peer-checked:text-gray-600 ease-in-out duration-100">                           
                                <img class="w-7 h-7 mr-2" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg" />
                                <div class="w-full text-md font-semibold">Swift</div>
                              </label>
                          </li>
                        </ul>
                      </div> -->
                      <div class="mb-5">
                      <label for="Category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                        <select id="Category" name="Category" class="form-control w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100">
                          <option value="PHP">PHP</option>
                          <option value="C">C</option>
                          <option value="Javascript">Javascript</option>
                          <option value="Java">Java</option>
                          <option value="Python">Python</option>
                          <option value="Swift">Swift</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-gradient-to-r from-sky-500 to-blue-500 px-4 py-2 text-base font-extrabold text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Create</button>
                <button id="add-discussion-cancel" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
              </div>
            </div>
          </form>
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