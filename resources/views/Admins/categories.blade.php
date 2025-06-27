@extends('Admins.base')
@section('metaTag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', "Categories")
@section('enPageTitle', "Categories Section")
@section('faPageTitle', "دسته بندی محصولات")



@section('content')
<!-- Add Category Form -->
<div class="my-8 bg-white dark:!bg-sky-900 p-6 rounded-lg shadow-md transition-colors duration-300 dark:border dark:!border-sky-700">
  <h2 class="text-xl font-semibold mb-4 dark:text-white">
    <span class="en">Add New Category</span>
    <span class="fa hidden">اضافه کردن دسته بندی جدید</span>
  </h2>
  <div class="flex flex-wrap gap-4 items-end">
    <span class="en w-full sm:w-1/3">
      <input id="newEnCategory" type="text" placeholder="Category Name" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:!text-white rounded px-4 py-2 w-full">
    </span>
    <span class="fa hidden w-full sm:w-1/3">
      <input id="newFaCategory" type="text" placeholder="نام دسته بندی" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:!text-white rounded px-4 py-2 w-full">
    </span>
    <select class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:text-white rounded px-4 py-2 w-full sm:w-1/3" id="newSubcategory">
	  <option value="">Select Category [ Optional ]</option>
    @foreach($categories as $category)
      @if($category->parent_id == null)
        <option value="{{$category->id}}" class="{{$category->id}}">{{$category->name}}</option>
      @endif
    @endforeach
	</select>
    <button type="submit" class="bg-blue-100 hover:bg-blue-200 text-blue-400 px-4 py-2 rounded transition-colors duration-300 disabled:cursor-not-allowed" id="addCategory">
      <span class="en">Add</span>
      <span class="fa hidden">اضافه کردن</span>
    </button>
  </div>
</div>


<!-- Existing Categories Table -->
<div class="bg-white dark:!bg-sky-900 p-6 rounded-lg shadow-md mt-8 overflow-x-auto transition-colors duration-300 dark:border dark:!border-sky-700">
  <h2 class="text-xl font-semibold mb-4 dark:text-white">
    <span class="en">Existing Categories</span>
    <span class="fa hidden">دسته بندی های موجود</span>
  </h2>

  @if(session()->has('success'))
  <div class="bg-green-200 border border-green-500 p-2 rounded-md mb-4">
    <p class="text-green-500">{{session('success')}}</p>
  </div>
  @endif
  @if(session()->has('error'))
  <div class="bg-pink-200 border border-pink-500 p-2 rounded-md mb-4">
    <p class="text-pink-500">{{session('error')}}</p>
  </div>
  @endif

  <table class="w-full table-auto text-left">
    <thead class="bg-gray-200 dark:bg-gray-700 text-center dark:text-white">
      <tr>
        <th class="px-4 py-2">
          <span class="en">ID</span>
          <span class="fa hidden">شناسه</span>
        </th>
        <th class="px-4 py-2">
          <span class="en">Category</span>
          <span class="fa hidden">دسته بندی</span>
        </th>
        <th class="px-4 py-2">
          <span class="en">Sub-Categories</span>
          <span class="fa hidden">زیر دسته ها</span>
        </th>
      </tr>
    </thead>
    <tbody class="divide-y text-center dark:text-white" id="tBody">
      @foreach($categories as $category)
      @if($category->parent_id == null)
        <tr id="{{$category->id}}">
          @if($category->parent_id == null)
            <td class="px-4 py-2">{{$category->id}}</td>
            <td class="px-4 py-2">
              {{$category->name}}
              <i class="bi bi-trash3 mx-2 text-red-400 p-2 hover:bg-red-200 rounded cursor-pointer removeCategory" data-id="{{$category->id}}" data-name="{{$category->name}}"></i>
              <a href="/administrator/editCategory/{{$category->id}}" class="text-sky-400 p-2 hover:bg-sky-200 rounded cursor-pointer">
                <span class="bi bi-pencil"></span>
              </a>
            </td>
          @endif
          <td class="px-4 py-2">
            @php
              $subs = $categories->where('parent_id', $category->id);
            @endphp
              @foreach($subs as $sub)
                <div class="{{ $loop->last ? '' : 'border-b'}} py-1.5 dark:!border-sky-700" id="{{$sub->id}}">
    	            {{$sub->name}}
    	            <i class="bi bi-trash3 mx-2 text-red-400 p-2 hover:bg-red-200 rounded cursor-pointer removeCategory" data-id="{{$sub->id}}" data-name="{{$sub->name}}"></i>
    	            <a href="/administrator/editCategory/{{$sub->id}}" class="text-sky-400 p-2 hover:bg-sky-200 rounded cursor-pointer">
                   <i class="bi bi-pencil"></i> 
                  </a>
                </div>
              @endforeach
          </td>
        </tr>
        @endif
      @endforeach
      <!-- Add more rows dynamically or from backend -->
    </tbody>
  </table>
</div>


@endsection


@section('script')
  <script src="/js/category.js"></script>
@endsection