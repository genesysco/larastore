@extends('Admins.base')
@section('title', "Edit Category")
@section('enPageTitle', "Category Edit")
@section('faPageTitle', "ویرایش دسته بندی")

@section('content')
	<form class="my-8 bg-white dark:!bg-sky-900 p-6 rounded-lg shadow-md transition-colors duration-300 dark:border dark:!border-sky-700" action="/administrator/updateCategory" method="POST">
		@csrf
		<input type="hidden" name="id" value="{{$thisCategory->id}}">
	  <h2 class="text-xl font-semibold mb-4 dark:text-white">
	    <span class="en">Edit Category</span>
	    <span class="fa hidden">ویرایش دسته بندی</span>
	  </h2>
	  <div class="flex flex-wrap gap-4 items-end">
	    <span class="en w-full sm:w-1/3">
	      <input id="newEnCategory" type="text" placeholder="Category Name" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:!text-white rounded px-4 py-2 w-full" value="{{$thisCategory->name}}">
	    </span>
	    <span class="fa hidden w-full sm:w-1/3">
	      <input id="newFaCategory" type="text" placeholder="نام دسته بندی" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:!text-white rounded px-4 py-2 w-full" value="{{$thisCategory->name}}">
	    </span>
	    <select class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:!border-sky-700 text-gray-900 dark:text-white rounded px-4 py-2 w-full sm:w-1/3" name="subCategoryof">
	    	
		  <option value="">Select Category [ None ]</option>
	    @foreach($categories as $category)
	      @if($category->parent_id == null)
	        <option value="{{$category->id}}">{{$category->name}}</option>
	      @endif
	    @endforeach
		</select>
	    <button type="submit" class="bg-blue-100 hover:bg-blue-200 text-blue-400 px-4 py-2 rounded transition-colors duration-300 disabled:cursor-not-allowed" id="editCategory">
	      <span class="en">Edit</span>
	      <span class="fa hidden">ویرایش</span>
	    </button>
	  </div>
	</form>
@endsection

@section('script')
  <script src="/js/updateCategory.js"></script>
@endsection