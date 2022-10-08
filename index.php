<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./config/tailwind.config.js?version=1"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <title>KOMODO</title>
</head>
<body id="body" class="bg-blue-50 h-[100em]">
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
            <div class="inset-y-0 right-0 flex items-center">
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
          </div>
            <div id="user-menu-dropdown" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden ease-out duration-100" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
    </nav>
    <div class="w-full flex justify-between mt-[3rem] px-[1rem] lg:px-[13.5rem] xl:px-[25em]">
      <div id="left-sidebar" class="hidden lg:block fixed left-0 ml-[1em] md:ml-[1.5em] xl:ml-[10em] lg:w-[10em] lg:ml-[2em] xl:w-[13em]">
        <aside aria-label="Sidebar">
            <div>
                <p class="text-sm font-bold text-gray-500">MENU</p>
              </div>
          <div class="overflow-y-auto py-4">
              <ul class="space-y-2">
                <li>
                    <a id="home" href="../UTS/index.php" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white bg-blue-500 drop-shadow-md text-white">
                      <svg id="home"  aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                      </svg>
                      <span class="ml-3 font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-md transition duration-75 group hover:bg-blue-500 hover:text-white active:bg-blue-500 active:drop-shadow-md">
                      <svg  aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z" clip-rule="evenodd" />
                      </svg>
                      <span class="ml-3 font-semibold">Explore</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white">
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                      <span class="ml-3 font-semibold">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 w-full text-base font-normal text-gray-500 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white">
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                      <span class="ml-3 font-semibold">Home</span>
                    </a>
                </li> -->
              </ul>
          </div>
        </aside>
      </div>
      <div id="body" class="w-full">
          <div class="w-full bg-white shadow-lg rounded-md p-5">
            <div class="flex">
              <div id="vote" class="hidden mr-[1em] lg:block">
                <div class="inline w-[2em] text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 hover:text-blue-500 cursor-pointer">
                  <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                </svg>
                  <p class="font-bold">12</p>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-1 hover:text-red-500 cursor-pointer">
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
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hover:text-blue-500">
                            <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                          </svg>
                          <p class="text-gray-500 mx-2">12</p>
                        </div>
                        <div class="flex">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 hover:text-red-500">
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
    </div>
    <div id="right-sidebar" class="hidden lg:block fixed right-0 mr-[1em] md:mr-[1.5em] lg:mr-[2em] xl:mr-[10em] lg:w-[10em] xl:w-[13em] drop-shadow-lg">
        <aside aria-label="Sidebar">
          <div class="overflow-y-auto">
              <ul class="space-y-2">
                <div>
                    <button id="add-discussion" href="#" class="flex items-center justify-center p-2 w-full text-base font-normal rounded-md bg-gradient-to-r from-sky-500 to-blue-500 text-white hover:bg-blue-600 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                    </svg>
                    </svg>
                      <span class="text-md font-bold mt-0.5 ml-1">Add Discussion</span>
                    </buttton>
              </div>  
                <li>
                    <div class="mt-[2rem] p-5 bg-white rounded-md">
                      <div class="mb-5">
                        <p class="text-md font-extrabold">Top Categories</p>
                      </div>
                      <div class="flex">
                        <div>
                          <a href="" class="font-bold text-blue-500">
                              PHP
                          </a>
                        </div>
                        <div class="ml-auto">
                          <p class="text-gray-500">6</p>
                      </div>
                    </div>
                </li>
              </ul>
          </div>
        </aside>
      </div>
    <div id="on-mobile-navbar" class="lg:hidden">
      <div class="fixed bottom-0 left-0 w-full bg-white shadow-lg">
        <div class="flex justify-between items-center px-10 py-3  text-gray-500">
            <div>
              <a href="../UTS/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
              </a>
                </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
              </svg>
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
    <div id="add-discussion-modal" class="fixed inset-0 bg-gray-500 bg-opacity-80 transition-opacity hidden z-20">
      <div class="fixed inset-0  overflow-y-auto ">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:block sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:text-left">
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
                    <form action="">
                      <div class="mb-5">
                        <label for="discussion-title"><span class="text-md font-extrabold text-black">Title</span></label>
                        <input type="text" class="w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder="Enter your title...">
                        <p class="text-sm text-gray-500">The header must contain a maximum of 30 characters</p>
                      </div>
                      <div class="mb-5">
                        <label for="discussion-description" class="block text-md font-extrabold text-black">Description</label>
                          <textarea id="message" rows="4" class="block max-h-[10em] p-2.5 w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder="Enter your description..."></textarea>
                          <p class="text-sm text-gray-500">Give your theme some purpose. Description of what it will be used for</p>
                      </div>
                      <div class="mb-5">
                        <label for="discussion-title"><span class="text-md font-extrabold text-black ">Categories</span></label>
                        <!-- <input type="text" class="w-full my-2 border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent ease-out duration-100" placeholder='Start your question with "What", "How", "Why", etc.'> -->
                        <ul class="items-center w-full mt-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox-list" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox-list" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Vue JS</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="react-checkbox-list" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox-list" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="angular-checkbox-list" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox-list" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox-list" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox-list" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                                </div>
                            </li>
                        </ul>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-gradient-to-r from-sky-500 to-blue-500 px-4 py-2 text-base font-extrabold text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Create</button>
              <button id="add-discussion-cancel" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
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
    </script>
</body>
</html>