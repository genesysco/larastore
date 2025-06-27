@extends('Admins.base')
@section('title', 'Analytics')

@section('content')


<!--==================== Statistics -->
  <div class="grid-span-12">
    <div class="col-span-12 my-6 xl:my-12 bg-white border rounded-md py-3 px-0 dark:!bg-sky-900 dark:!border-sky-700">
      <h6 class="h3 text-slate-400 ps-3 mb-3">
        <span class="en">
          Statistics
        </span>
        <span class="fa hidden">
          آمار
        </span>
      </h6>
      <hr class="text-secondary dark:!text-slate-400">
      <!-- statistics body -->
      <div class="grid grid-cols-12 ps-3 gap-y-8 xl:gap-y-0 md:pt-3 my-4">

        <div class="col-span-12 sm:col-span-6 md:col-span-7 lg:col-span-6 xl:col-span-4">
          <div class="grid grid-cols-12 xl:gap-10 items-center">
            <div class="col-span-3 xl:col-span-2 ">
              <div>
                <span class="bi bi-laptop h1 bg-orange-300 rounded-circle pt-1 pb-2.5 px-3 text-slate-500 font-sans"></span>
              </div>
            </div>

            <div class="col-span-9 xl:col-span-8">
              <p class="text-slate-400">
                <span class="en">
                  Total Products
                </span>
                <span class="fa hidden">
                  کل محصولات
                </span>
              </p>
              <p class="h1 text-bold dark:text-slate-200">
                {{$totalProducts}}
              </p>
              <p class="text-secondary dark:!text-slate-400">
                <span class="bi bi-chevron-down text-red-400"></span>
                <span class="text-red-400">
                  <span class="en">
                    54.1 %
                  </span>
                  <span class="fa hidden">
                    54.1 %
                  </span>
                </span>
                <span class="en">
                  less earning
                </span>
                <span class="fa hidden">
                  درآمد کمتر
                </span>
              </p>
            </div>

          </div>
        </div>


        <div class="col-span-12 sm:col-span-6 md:col-span-7 lg:col-span-6 xl:col-span-4">
          <div class="grid grid-cols-12 xl:gap-10 items-center">
            <div class="col-span-3 xl:col-span-2">
              <div>
                <span class="bi bi-mortarboard h1 bg-red-300 rounded-circle pt-1 pb-2.5 px-3 text-slate-500 font-sans"></span>
              </div>
            </div>

            <div class="col-span-9 xl:col-span-8">
              <p class="text-slate-400">
                <span class="en">
                  Maximum Products in Category
                </span>
                <span class="fa hidden">
                  بیشترین محصول در دسته بندی
                </span>
              </p>
              <p class="h3 text-bold  dark:text-slate-200">
                {{$categoryName}} :
                {{$topCategoryNumber?->total ?? 0}}
              </p>
              <p class="text-secondary  dark:!text-slate-400">
                <span class="en">
                  Grow Rate :
                </span> 
                <span class="fa hidden">
                  نرخ رشد :
                </span>
                <span class="bi bi-chevron-down text-cyan-400"></span>
                <span class="text-cyan-400">
                  <span class="en">
                    14.1 %
                  </span>
                  <span class="fa hidden">
                    ۱۴.۱ ٪
                  </span>
                </span>
              </p>
            </div>

          </div>
        </div>


        <div class="col-span-12 sm:col-span-6 md:col-span-7 lg:col-span-6 xl:col-span-4">
          <div class="grid grid-cols-12 xl:gap-10 items-center">
            <div class="col-span-3 xl:col-span-2">
              <div>
                <span class="bi bi-buildings h1 bg-lime-400 rounded-circle pt-1 pb-2.5 px-3 text-white font-sans"></span>
              </div>
            </div>

            <div class="col-span-9 xl:col-span-8">
              <p class="text-slate-400">
                <span class="en">
                  Inserted Products this Month
                </span>
                <span class="fa hidden">
                  محصولات اضافه شده این ماه
                </span>
              </p>
              <p class="h1 text-bold text-lime-400">
                {{$productsThisMonth}}
              </p>
              <p class="text-secondary  dark:!text-slate-400">
                <span class="en">
                  Increased by
                </span>
                <span class="fa hidden">
                  افزایش یافته ها
                </span>
                <span class="bi bi-chevron-up text-yellow-300"></span>
                <span class="text-yellow-300">
                  <span class="en">
                    7.35 %
                  </span>
                  <span class="fa hidden">
                    ۷.۳۵ ٪
                  </span>
                </span>
              </p>
            </div>

          </div>
        </div>

      </div>
      <!-- statistics body End -->
      <hr class="text-secondary dark:!text-slate-400">
      <div class="col-12 text-center mt-3">
        <button class="btn btn-danger rounded-3xl">
          <span class="bi bi-wrench-adjustable-circle-fill mx-1"></span>
          <span class="en">
            View Compelete Report
          </span>
          <span class="fa hidden">
            مشاهده گزارش کامل
          </span>
        </button>
      </div>
    </div>
  </div>
<!--============== End of Statistics -->

@endsection