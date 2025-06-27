<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('metaTag')
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-icons.min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <script type="text/javascript" src="/js/tailwindcss.js"></script>
  <script type="text/javascript" src="/js/tailwind.config.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/adminStyle.css">
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/snow.js"></script>
  <title>@yield('title', 'Admin Panel')</title>
</head>
<body class="bg-[var(--background)] dark:bg-slate-900 duration-500 overflow-x-hidden">

  <div class="absolute z-[2] md:z-[3] bg-black w-100 opacity-30 hidden" id="disabler"></div>

  <!-- =================== topBar  control panel Mobile ======================== -->
      <div class="grid grid-cols-10 bg-red-700 mb-3 items-center justify-content-between py-2 md:hidden">
        <div class="col-span-7 ps-3">
          <h2 class="text-red-300 h5">
            <span class="en">
              Admin Panel
            </span>
            <span class="fa hidden">
              پنل مدیریت
            </span>
          </h2>
        </div>
          
        <div class="col-span-3 flex justify-content-end font-sans">
          <button class="h4 hover:bg-[rgba(255,255,255,0.15)] p-1 rounded" id="mobileMenu">
            <span class="bi bi-list text-white"></span>
          </button>
          <button class="h4 mx-2 hover:bg-[rgba(255,255,255,0.15)] p-1 rounded" id="mnpTrigger">
            <span class="bi bi-three-dots-vertical text-white"></span>
          </button>
          </div>
      </div>
      <!-- =================== topBar  control panel Mobile End ======================== -->

      <!-- ====================== Mobile Search - Notifications - Profile ============== -->
      <div class="container-fluid px-3 absolute top-[60px] hidden md:!hidden" id="MNP">
          
        <div class="row shadow align-items-center justify-content-center bg-white dark:!bg-slate-900 py-2 rounded-3xl border dark:!border-sky-700">
          <!-- -------------- Search ---------------- -->
          <div class="col-6">
            
            <span class="en flex">
                <label for="search" class="me-1.5 rotate-90">
                  <span class="bi bi-search fs-4 dark:text-slate-200"></span>
                </label>
                <input type="text" name="search" class="bg-white dark:!bg-slate-900 dark:text-slate-200 outline-none mw-100 me-1.5" placeholder="Search...">
              </span>

              <span class="fa hidden flex">
                <label for="search" class="me-1.5">
                  <span class="bi bi-search fs-4 dark:text-slate-200"></span>
                </label>
                <input type="text" name="search" class="bg-white dark:!bg-slate-900 dark:text-slate-200 outline-none mw-100 me-1.5" placeholder="جستجو کنید ...">
              </span>

          </div>
          <!-- -------------- Search End ---------------- -->

          <!-- --------------- Notifications ------------- -->
          <div class="col-2">
            <div class="flex ps-2">
              
              <button class="fs-4 position-relative">
                <span class="bi bi-bell dark:text-slate-400"></span>
                <span class="position-absolute  p-1 bg-danger rounded-circle">
                </span>
              </button>

            </div>
          </div>
          <!-- ------------ End Notifications ------------- -->

          <!-- ------------ Profile ---------------------- -->
          <div class="col-3 flex pe-0 justify-content-end">
            <button class="flex items-center showProfile">
              <div class="bg-[url('/images/5.jpg')] w-11 h-11 rounded-md bg-center bg-cover me-2.5"></div>
              <span class="bi bi-chevron-down text-[10px]  dark:text-slate-100"></span>
            </button>
          </div>
          <!-- ------------ End Profile ---------------------- -->
        </div>

        <!-- ------------- Profile Content ------------- -->
          <div class="w-80  rounded-md shadow-sm absolute top-3 right-0 mr-5 ml-5 hidden md:hidden z-[1] profileContent">
            <!-- -------- Profile Header -->
            <div class="grid grid-cols-12">
              <div class="col-span-12 bg-[url('/images/city1.jpg')] bg-center bg-cover px-0 rounded-top">
                <div class="bg-gradient-to-r from-[var(--myCyan)] to-[var(--myCyan)] dark:from-[var(--mySky)]  rounded-top">
                  <div class="grid grid-cols-12 gap-x-2 p-3 align-items-center">
                    
                    <div class="col-span-2">
                      <img src="/images/5.jpg" class="img-fluid rounded-circle">
                    </div>

                    <div class="col-span-7">
                      <h6 class="text-white fw-bold mb-2">
                        Minnie Betts
                      </h6>
                      <p class="text-white text-sm">
                        <span class="en">
                          Short Profile description
                        </span>
                        <span class="fa hidden">
                          توضیح مختصر پروفایل
                        </span>
                      </p>
                    </div>

                    <div class="col-span-3">
                      <a href="/logout" class="btn btn-outline-dark btn-sm text-[12px] dark:bg-slate-200 dark:border-sky-900 dark:text-sky-900 dark:hover:bg-sky-900 dark:hover:text-slate-200">
                        <span class="en">
                          Logout
                        </span>
                        <span class="fa hidden">
                          خروج
                        </span>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
              <!--  End of Profile Header -->

              <!-- -------- Profile content body -->
              <div class="grid grid-cols-12">

                <div class="col-span-12 bg-white dark:!bg-sky-900 rounded-bottom pb-2">

                  <div class="px-4 pt-4">
                    <h6 class="text-secondary fw-bold text-sm dark:!text-slate-400">
                    <span class="en">
                      Activity
                    </span>
                    <span class="fa hidden">
                      فعالیت
                    </span>
                  </h6>

                 <button class="flex w-100 my-3 justify-content-between text-sm items-center dark:text-slate-200">
                   <p>
                     <span class="en">
                       Chat
                     </span>
                     <span class="fa hidden">
                       گفتگو
                     </span>
                   </p>
                   <p class="bg-cyan-200 rounded-3xl px-2 py-1 text-white dark:bg-slate-700 dark:text-slate-200">
                     <span class="en">33</span>
                     <span class="fa hidden">
                       ۳۳
                     </span>
                   </p>
                 </button>

                 <a href="" class="text-sm block dark:text-slate-200">
                   <span class="en">
                     Recover Password
                   </span>
                   <span class="fa hidden">
                     بازیابی رمز عبور
                   </span>
                 </a>

                 <h6 class="text-secondary fw-bold text-sm mt-4 mb-3 dark:!text-slate-400">
                    <span class="en">
                      My Account
                    </span>
                    <span class="fa hidden">
                      حساب کاربری من
                    </span>
                  </h6>
                  </div>

                  <div class="grid grid-cols-12">

                    <div class="col-span-6 border-t border-b border-e dark:!border-sky-700 px-2.5 py-2.5">

                      <button class="text-center w-100 rounded-md py-3 hover:bg-yellow-400 group duration-500">
                        <p class="bi bi-chat-square-text text-slate-300 mb-2 text-lg group-hover:text-black"></p>
                        <p class="text-yellow-400 text-sm fw-bold group-hover:text-black">
                          <span class="en">
                            Message Inbox
                          </span>
                          <span class="fa hidden">
                            صندوق ورودی پیام
                          </span>
                        </p>
                      </button>
                    </div>

                    <div class="col-span-6 border-t border-b dark:!border-sky-700 px-2.5 py-2.5">
                      
                      <button class="text-center w-100 rounded-md py-3 hover:bg-red-400 group duration-500">
                        <p class="bi bi-stickies text-slate-300 mb-2 text-lg group-hover:text-white"></p>
                        <p class="text-red-400 text-sm fw-bold group-hover:text-white">
                          <span class="en">
                            Support Tickets
                          </span>
                          <span class="fa hidden">
                            بلیط های پشتیبانی
                          </span>
                        </p>
                      </button>
                    </div>
                  </div>

                  <div class="col-span-12 mb-2.5 mt-3 text-center">
                    <button class="btn btn-danger rounded-md btn-sm">
                      <span class="en">
                        Open Messages
                      </span>
                      <span class="fa hidden">
                        باز کردن پیام ها
                      </span>
                    </button>
                  </div>

                </div>
              </div>
              <!-- -------- End Profile content body -->
          </div>
          <!-- ------------- End Profile Content ------------- -->

      </div>
      <!-- ====================== Mobile Search - Notifications - Profile ============== -->

  <div class="container mx-auto xl:p-6">
    <div class="grid grid-cols-12 md:gap-x-2 lg:gap-3" id="fullPagePadding">
      <!-- control panel -->
      <div class="col-span-10 md:col-span-4 lg:col-span-3 xl:col-span-2 bg-[var(--red)] overflow-scroll shadow z-[2] md:z-[1] fixed top-0 -left-[520px] md:static duration-500 h-[104vh] md:duration-0 md:h-[98vh] md:rounded-md md:inline-table md:mt-2 xl:mt-0 lg:h-[650px] lg:max-w-full" id="controlPanel">
        <!-- control panel title -->
        <div class="grid grid-cols-9 justify-content-between p-3 items-center">
          <div class="col-span-8">
              <h1 class="text-red-200 lightText text-md md:text-xl">
                <span class="en">
                    Control
                  <span class="text-red-400 darkText">
                    Panel
                  </span>
                </span>
                <span class="fa hidden">
                    پنل
                  <span class="text-red-400 darkText">
                    کنترل
                  </span>
                </span>
              </h1>
            </div>
            <div class="col-span-1">
              <button id="openSettings">
                <span class="bi bi-list fs-3 text-red-200 lightText hover:text-white"></span>
              </button>
            </div>
        </div>
        <!-- control panel title end -->
        <hr class="text-red-200 lightText shadow">
        <!-- Control panel body -->
        <section class="p-3">
          <h3 class="text-red-500 darkTitle text-sm mb-3">
            <span class="en">
              MENU
            </span>
            <span class="fa hidden">
              منو
            </span>
          </h3>

          <!-- Home Section ---------------------------------------------- -->
          <a href="/" class="flex w-100 text-red-200 lightText text-start mb-3 hover:text-white duration-500 py-2 rounded-3xl" target="_blank">
            <span class="bi bi-house text-red-400 darkText me-2"></span>
            <span class="en">
              Home Page
            </span>
            <span class="fa hidden">
              خانه
            </span>
          </a>
          <!-- Home Section End ---------------------------------------------- -->

          <button class="flex justify-content-between w-100 text-red-200 lightText text-start sideMenu mb-3 hover:text-white duration-500 pe-2" id="Dashboard">
            <div>
              <span class="bi bi-rocket text-red-400 darkText me-1"></span>
              <span class="en">
                Dashboard
              </span>
              <span class="fa hidden">
                داشبورد
              </span>
            </div>
            <span class="bi bi-chevron-down duration-500 font-sans"></span>
          </button>

          <ul class="mb-3 text-red-200 lightText hidden">

            <li class="mb-2 text-sm">
              <a href="/administrator" class="{{ request()->is('administrator') ? 'bg-[rgba(255,255,255,0.15)]' : ''}} flex ps-3 align-items-center  py-1.5 rounded-3xl">
                <div class="bi bi-circle-fill me-4 text-[5px] text-red-400 darkText inline-block"></div>
                <div class="inline-block {{request()->is('administrator') ? 'text-white' : ''}}">
                  <span class="en">
                    Analytics
                  </span>
                  <span class="fa hidden">
                    تجزیه و تحلیل
                  </span>
                </div>
              </a>
            </li>

            <li class="mb-2 text-sm hover:text-white duration-500">
              <a href="/register" class="flex ps-3 align-items-center  py-1.5  rounded-3xl">
                <div class="bi bi-circle-fill me-4 text-[5px] text-red-400 darkText inline-block"></div>
                <div class="inline-block">
                  <span class="en">
                    Add new user
                  </span>
                  <span class="fa hidden">
                    اضافه کردن کاربر جدید
                  </span>
                </div>
              </a>
            </li>

            <li class="mb-2 text-sm hover:text-white duration-500">
              <a href="/administrator/usersList" class="{{ request()->is('administrator/usersList') ? 'bg-[rgba(255,255,255,0.15)]' : ''}} flex ps-3 align-items-center  py-1.5  rounded-3xl">
                <div class="bi bi-circle-fill me-4 text-[5px] text-red-400 darkText inline-block"></div>
                <div class="inline-block {{request()->is('administrator/usersList') ? 'text-white' : ''}}">
                  <span class="en">
                    Users' List
                  </span>
                  <span class="fa hidden">
                    لیست کاربران
                  </span>
                </div>
              </a>
            </li>

          </ul>

          <!-- Category Section ---------------------------------------------- -->
          <a href="/administrator/categories" class="flex w-100 text-red-200 lightText text-start mb-3 hover:text-white duration-500 py-2 rounded-3xl {{ request()->is('administrator/categories') ? 'bg-[rgba(255,255,255,0.15)] text-white ps-3' : ''}}">
            <span class="bi bi-tags text-red-400 darkText me-2"></span>
            <span class="en">
              Categories
            </span>
            <span class="fa hidden">
              دسته بندی محصولات
            </span>
          </a>
          <!-- Category Section End ---------------------------------------------- -->


          <!-- Add Products Section ---------------------------------------------- -->
          <a href="/administrator/addProduct" class="flex w-100 text-red-200 lightText text-start mb-3 hover:text-white duration-500 py-2 rounded-3xl {{ request()->is('administrator/addProduct') ? 'bg-[rgba(255,255,255,0.15)] text-white ps-3' : ''}}">
            <span class="bi bi-arrow-down-square-fill text-red-400 darkText me-2"></span>
            <span class="en">
              Add Products
            </span>
            <span class="fa hidden">
              اضافه کردن محصول
            </span>
          </a>
          <!-- Add Products Section End ---------------------------------------------- -->


          <!-- Products Section ---------------------------------------------- -->
          <a href="/administrator/products" class="flex w-100 text-red-200 lightText text-start mb-3 hover:text-white duration-500 py-2 rounded-3xl {{ request()->is('administrator/products') ? 'bg-[rgba(255,255,255,0.15)] text-white ps-3' : ''}}">
            <span class="bi bi-shop text-red-400 darkText me-2"></span>
            <span class="en">
              Products
            </span>
            <span class="fa hidden">
              محصولات
            </span>
          </a>
          <!-- Products Section End ---------------------------------------------- -->

        </section>
        <!-- Control panel body end -->
      </div>
      <!-- control panel end -->

      <!-- PlaceHolder 2 Columns -->
      <div class="col-span-2 hidden twoColumnFake">.</div>
      <!-- PlaceHolder 2 Columns -->

      <!-- content -->
      <div class="col-span-12 md:col-span-8 lg:col-span-9 xl:col-span-10 xl:px-3 md:mt-2 xl:mt-0">
        <div class="grid grid-cols-12">
          <!-- First Header -->
          <div class="col-span-12 items-center">
            <div class="grid grid-cols-12">
              <div class="col-span-12 xl:col-span-8">
                <h6 class="mb-2 fw-bold h5 dark:text-white">
                  <span class="en">
                    @yield('enPageTitle', 'Analytics')
                  </span>
                  <span class="fa hidden">
                    @yield('faPageTitle','تجزیه و تحلیل')
                  </span>
                </h6>
                <p class="text-slate-400 text-sm dark:text-slate-200">
                   <span class="en">
                     This is an example dashboard created using build-in elements and components. 
                   </span>
                   <span class="fa hidden">
                     این یک نمونه از داشبورد مدیریتی شخصی است .
                   </span>
                </p>
            </div>

            <div class="md:col-span-12 md:mt-3 xl:col-span-4 relative hidden md:block">
              <div class="grid grid-cols-12 align-items-center justify-content-between">
                <!-- -------------- Search ---------------- -->
                <div class="col-span-7 border-e dark:border-e-slate-400">
                  
                  <span class="en flex gap-x-2">
                      <label for="search" class="rotate-90">
                        <span class="bi bi-search fs-4 dark:text-slate-200"></span>
                      </label>
                      <input type="text" name="search" class="bg-[var(--background)] dark:bg-slate-900 dark:text-slate-200 outline-none" placeholder="Search...">
                    </span>

                    <span class="fa hidden flex gap-x-2">
                      <label for="search">
                        <span class="bi bi-search fs-4 dark:text-slate-200"></span>
                      </label>
                      <input type="text" name="search" class="bg-[var(--background)] dark:bg-slate-900 dark:text-slate-200 outline-none" placeholder="جستجو کنید ...">
                    </span>

                </div>
                <!-- -------------- Search End ---------------- -->

                <!-- --------------- Notifications ------------- -->
                <div class="col-span-3 border-e mx-6 dark:border-e-slate-400 lg:text-center xl:text-start">
                 <button class="fs-4 position-relative">
                    <span class="bi bi-bell dark:text-slate-400"></span>
                    <span class="position-absolute  p-1 bg-danger rounded-circle">
                    </span>
                  </button>
                </div>
                <!-- ------------ End Notifications ------------- -->

                <!-- ------------ Profile ---------------------- -->
                <div class="col-span-2">
                  <button class="flex items-center showProfile float-right">
                    <div class="bg-[url('/images/5.jpg')] w-11 h-11 rounded-md bg-center bg-cover me-2.5"></div>
                    <span class="bi bi-chevron-down text-[10px]  dark:text-slate-100"></span>
                  </button>
                </div>
                <!-- ------------ End Profile ---------------------- -->

                <!-- ------------- Profile Content ------------- -->
                <div class="w-80 rounded-md shadow-sm absolute top-3 right-0 hidden sm:z-[1] profileContent">
                  <!-- -------- Profile Header -->
                  <div class="grid grid-cols-12">
                    <div class="col-span-12 bg-[url('/images/city1.jpg')] bg-center bg-cover px-0 rounded-top">
                      <div class="bg-gradient-to-r from-[var(--myCyan)] to-[var(--myCyan)] dark:from-[var(--mySky)]  rounded-top">
                        <div class="grid grid-cols-12 gap-x-2 p-3 align-items-center">
                          
                          <div class="col-span-2">
                            <img src="/images/5.jpg" class="img-fluid rounded-circle">
                          </div>

                          <div class="col-span-7">
                            <h6 class="text-white fw-bold mb-2">
                              Minnie Betts
                            </h6>
                            <p class="text-white text-sm">
                              <span class="en">
                                Short Profile description
                              </span>
                              <span class="fa hidden">
                                توضیح مختصر پروفایل
                              </span>
                            </p>
                          </div>

                          <div class="col-span-3">
                            <a href="/logout" class="btn btn-outline-dark btn-sm text-[12px] dark:bg-slate-200 dark:border-sky-900 dark:text-sky-900 dark:hover:bg-sky-900 dark:hover:text-slate-200">
                              <span class="en">
                                Logout
                              </span>
                              <span class="fa hidden">
                                خروج
                              </span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                    <!--  End of Profile Header -->

                    <!-- -------- Profile content body -->
                    <div class="grid grid-cols-12">

                      <div class="col-span-12 bg-white dark:!bg-sky-900 rounded-bottom pb-2">

                        <div class="px-4 pt-4">
                          <h6 class="text-secondary fw-bold text-sm dark:!text-slate-400">
                          <span class="en">
                            Activity
                          </span>
                          <span class="fa hidden">
                            فعالیت
                          </span>
                        </h6>

                       <button class="flex w-100 my-3 justify-content-between text-sm items-center dark:text-slate-200">
                         <p>
                           <span class="en">
                             Chat
                           </span>
                           <span class="fa hidden">
                             گفتگو
                           </span>
                         </p>
                         <p class="bg-cyan-200 rounded-3xl px-2 py-1 text-white dark:bg-slate-700 dark:text-slate-200">
                           <span class="en">33</span>
                           <span class="fa hidden">
                             ۳۳
                           </span>
                         </p>
                       </button>

                       <a href="" class="text-sm block dark:text-slate-200">
                         <span class="en">
                           Recover Password
                         </span>
                         <span class="fa hidden">
                           بازیابی رمز عبور
                         </span>
                       </a>

                       <h6 class="text-secondary fw-bold text-sm mt-4 mb-3 dark:!text-slate-400">
                          <span class="en">
                            My Account
                          </span>
                          <span class="fa hidden">
                            حساب کاربری من
                          </span>
                        </h6>
                        </div>

                        <div class="grid grid-cols-12">

                          <div class="col-span-6 border-t border-b border-e dark:!border-sky-700 px-2.5 py-2.5">

                            <button class="text-center w-100 rounded-md py-3 hover:bg-yellow-400 group duration-500">
                              <p class="bi bi-chat-square-text text-slate-300 mb-2 text-lg group-hover:text-black"></p>
                              <p class="text-yellow-400 text-sm fw-bold group-hover:text-black">
                                <span class="en">
                                  Message Inbox
                                </span>
                                <span class="fa hidden">
                                  صندوق ورودی پیام
                                </span>
                              </p>
                            </button>
                          </div>

                          <div class="col-span-6 border-t border-b dark:!border-sky-700 px-2.5 py-2.5">
                            
                            <button class="text-center w-100 rounded-md py-3 hover:bg-red-400 group duration-500">
                              <p class="bi bi-stickies text-slate-300 mb-2 text-lg group-hover:text-white"></p>
                              <p class="text-red-400 text-sm fw-bold group-hover:text-white">
                                <span class="en">
                                  Support Tickets
                                </span>
                                <span class="fa hidden">
                                  بلیط های پشتیبانی
                                </span>
                              </p>
                            </button>
                          </div>
                        </div>

                        <div class="col-span-12 mb-2.5 mt-3 text-center">
                          <button class="btn btn-danger rounded-md btn-sm">
                            <span class="en">
                              Open Messages
                            </span>
                            <span class="fa hidden">
                              باز کردن پیام ها
                            </span>
                          </button>
                        </div>

                      </div>
                    </div>
                    <!-- -------- End Profile content body -->
                </div>
                <!-- ------------- End Profile Content ------------- -->
              </div>
            </div>
          </div>
          <!-- End of first Header -->
        </div>
        </div>


      @yield('content')

        
      </div>
      <!-- content End -->

    </div> <!--grid-cols-12-->
  </div><!--container-fluid-->





  <!-- ============================ Settings side bar -->
  <div class="w-60 bg-[var(--background)] top-0 py-3 h-[100vh] fixed shadow -right-72 duration-500 ease-out dark:bg-slate-900 z-[3] overflow-scroll " id="settingsBar">
      

      <button class="btn btn-outline-danger rounded-0 absolute top-1 left-1 md:hidden" id="settingesCloser">
        <span class="en">
          Close
        </span>
        <span class="fa hidden">
          بستن
        </span>
      </button>

      <p class="ms-2 h5 text-slate-500 dark:text-slate-200 mt-12 md:mt-0">
        <span class="en">
          Layout Options
        </span>
        <span class="fa hidden">
          تنظیمات پوسته
        </span>
      </p>
      <div class="bg-white py-3 border-top border-bottom my-3 ps-2 dark:!bg-sky-900 dark:!border-b-sky-700 dark:!border-t-sky-700 flex items-center justify-center">
        
        <button class="bg-yellow-300 rounded-2xl px-2 py-1 relative duration-500 font-sans" id="darkMode">
          <span class="absolute dark:right-[5px] rounded-circle bg-[var(--red)] w-6 h-6 left-[5px]"></span>
          <span class="bi bi-sun-fill me-1.5 text-yellow-200 me-2"></span>
          <span class="bi bi-moon-stars text-blue-600"></span>
        </button>

        <button class="bg-[url('/images/en.svg')] bg-center bg-contain rounded-2xl px-2 py-1 relative duration-500 mx-2 font-sans" id="lang">
          <span class="absolute dark:right-[5px] rounded-circle bg-yellow-300 w-6 h-6 left-[5px] text-sm pt-0.5 items-center text-white">
            EN
          </span>
          <span class="me-1">EN</span>
          <span>FA</span>
        </button>

        <button class="bg-[var(--background)] rounded-2xl px-2 py-1 relative duration-500 font-sans" id="snowMode">
          <span class="absolute dark:right-[5px] rounded-circle bg-[var(--red)] w-6 h-6 left-[5px]"></span>
          <span class="flex items-center">
            <span class="text-blue-600 me-3 text-[10px]">Off</span>
            <span class="bi bi-cloud-snow text-blue-600"></span>
          </span>
        </button>

      </div>
      




      <p class="ms-2 h5 text-slate-500 dark:text-slate-200 mt-20">
          <span class="en">
            Control Panel Colors
          </span>
          <span class="fa hidden">
            رنگ های پنل کنترل
          </span>
        </p>
        
      <div class="bg-white py-3 px-4 border-top border-bottom my-3 dark:!bg-sky-900 dark:!border-b-sky-700 dark:!border-t-sky-700">

        <!-- Background Colors -->
        <div class="col-12 text-center">
          <button class="cpColor mx-2" data-bg="bg-slate-800">
            <span class="bi bi-droplet-fill text-slate-800"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-yellow-400">
            <span class="bi bi-droplet-fill text-yellow-400"></span>
          </button>


          <button class="cpColor mx-2" data-bg="bg-cyan-400">
            <span class="bi bi-droplet-fill text-cyan-400"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-lime-400">
            <span class="bi bi-droplet-fill text-lime-400"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-teal-400">
            <span class="bi bi-droplet-fill text-teal-400"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-[var(--red)]">
            <span class="bi bi-droplet-fill text-[var(--red)]"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-pink-400">
            <span class="bi bi-droplet-fill text-pink-400"></span>
          </button>

          <button class="cpColor mx-2" data-bg="bg-rose-400">
            <span class="bi bi-droplet-fill text-rose-400"></span>
          </button>
        </div>
        <div class="col-12 border-b dark:border-sky-700 my-3"></div>


        <!-- Background Gradients -->
        <div class="col-12 text-center font-sans">
          <button class="cpGradient" data-bg="bg-gradient-to-br from-red-400 to-pink-400">
            <span class="bi bi-star-fill text-yellow-300 bg-gradient-to-tl from-red-400 to-pink-400 rounded-circle px-2 pt-1 pb-1.5"></span>
          </button>

          <button class="cpGradient" data-bg="bg-gradient-to-t from-cyan-300 to-rose-300">
            <span class="bi bi-star-fill text-yellow-300 bg-gradient-to-tl from-cyan-400 to-rose-400 rounded-circle px-2 pt-1 pb-1.5"></span>
          </button>


          <button class="cpGradient" data-bg="bg-gradient-to-t from-emerald-300 to-green-700">
            <span class="bi bi-star-fill text-yellow-300 bg-gradient-to-tl from-emerald-400 to-green-400 rounded-circle px-2 pt-1 pb-1.5"></span>
          </button>


          <button class="cpGradient" data-bg="bg-gradient-to-br from-slate-800 to-gray-600">
            <span class="bi bi-star-fill text-yellow-300 bg-gradient-to-tl from-slate-400 to-gray-400 rounded-circle px-2 pt-1 pb-1.5"></span>
          </button>
        </div>
        <div class="col-12 border-b dark:border-sky-700 my-3"></div>





        <!-- Text Colors -->
        <div class="col-12 text-center">

          <button class="cpTextColor mx-2" data-dark="text-slate-400" data-light="text-slate-200" data-darkT="text-slate-500">
            <span class="bi bi-droplet-half text-slate-400"></span>
          </button>

          <button class="cpTextColor mx-2" data-dark="text-yellow-400" data-light="text-yellow-100" data-darkT="text-yellow-500">
            <span class="bi bi-droplet-half text-yellow-400"></span>
          </button>


          <button class="cpTextColor mx-2" data-dark="text-cyan-400" data-light="text-cyan-200" data-darkT="text-cyan-500">
            <span class="bi bi-droplet-half text-cyan-400"></span>
          </button>


          <button class="cpTextColor mx-2" data-dark="text-pink-400" data-light="text-pink-200" data-darkT="text-pink-500">
            <span class="bi bi-droplet-half text-pink-400"></span>
          </button>


          <button class="cpTextColor mx-2" data-dark="text-lime-400" data-light="text-lime-200" data-darkT="text-lime-500">
            <span class="bi bi-droplet-half text-lime-400"></span>
          </button>


          <button class="cpTextColor mx-2" data-dark="text-red-400" data-light="text-red-200" data-darkT="text-red-500">
            <span class="bi bi-droplet-half text-red-400"></span>
          </button>

          <button class="cpTextColor mx-2" data-dark="text-emerald-400" data-light="text-emerald-200" data-darkT="text-emerald-500">
            <span class="bi bi-droplet-half text-emerald-400"></span>
          </button>

          <button class="cpTextColor mx-2" data-dark="text-rose-400" data-light="text-rose-200" data-darkT="text-rose-500">
            <span class="bi bi-droplet-half text-rose-400"></span>
          </button>
        </div>

      </div>



      <!-- ---------------- Control Panel Mode ----------------------------- -->
      <p class="ms-2 h5 text-slate-500 dark:text-slate-200 mt-20 hidden lg:block">
        <span class="en">
          Control Panel Mode
        </span>
        <span class="fa hidden">
          نحوه نمایش پنل کنترل
        </span>
      </p>

      <div class="bg-white py-3 px-4 border-top border-bottom my-3 dark:!bg-sky-900 dark:!border-b-sky-700 dark:!border-t-sky-700 text-center hidden lg:block">
        <span class="dark:text-slate-200">
          <span class="en">
            Full height :
          </span>
          <span class="fa hidden">
            تمام ارتفاع : 
          </span>
        </span>
        <button class="bg-[var(--background)] dark:bg-slate-900 dark:!border-sky-700 font-sans py-2 rounded-md border px-1 text-slate-300 relative text-sm" id="panelMode">
          <span class="bg-white w-8 left-[4px] top-[4px] rounded-md border h-7 absolute"></span>
          <span class="my-2 mx-1">OFF</span>
          <span class="my-2 mx-1">ON</span>
        </button>

      </div>
  </div>
  <!-- ============================ Settings side bar -->



<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/js/admin.js"></script>
@yield('script')
</body>
</html>