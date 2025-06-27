@extends('Admins.base')
@section('title', "Users' List")
@section('enPageTitle', "Users' List")
@section('faPageTitle', "لیست کاربران")

@section('content')
<div class="mx-auto mt-8 max-w-screen px-1">

  <div class="bg-white dark:!bg-sky-900 mt-6 overflow-hidden rounded-xl border shadow dark:!border-sky-700">
    <table class="min-w-full text-center">
      <thead class="border-b">
        <tr>
          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 dark:text-gray-300 sm:px-6">
            <span class="en">Name</span>
            <span class="fa hidden">نام</span>
          </td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 dark:text-gray-300 sm:px-6">
            <span class="en">Email</span>
            <span class="fa hidden">ایمیل</span>
          </td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 dark:text-gray-300 sm:px-6">
            <span class="en">Username</span>
            <span class="fa hidden">نام کاربری</span>
          </td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 dark:text-gray-300 sm:px-6">
            <span class="en">Status</span>
            <span class="fa hidden">وضیعت</span>
          </td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 dark:text-gray-300 sm:px-6">
            <span class="en">Operation</span>
            <span class="fa hidden">عملیات</span>
          </td>
        </tr>
      </thead>

      <tbody class="lg:border-gray-300 text-center">
        @foreach($users as $user)
        <tr id="{{$user->id}}">
          <td class="py-4 text-sm font-bold text-gray-900 dark:text-gray-300">
            {{$user->name}}
          </td>

          <td class="py-4 text-sm font-normal text-gray-500 dark:text-gray-400">
            {{$user->email}}
          </td>

          <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-400">
            {{$user->username}}
          </td>

          <td class="py-4 text-sm font-normal text-gray-500 dark:text-gray-400">
            @if($user->is_admin)
              <p class="bg-green-300 inline text-green-600 p-2 rounded-md">
                <span class="en">Admin</span>
                <span class="fa hidden">مدیر</span>
              </p>
            @else
              <p class="bg-rose-100 inline text-rose-400 p-2 rounded-md">
                <span class="en">User</span>
                <span class="fa hidden">کاربر</span>
              </p>
            @endif
          </td>

          <td>
            @if($user->is_admin)
              @if($user->username != 'admin')
                <button class="shadow-sm bg-pink-100 inline text-pink-400 p-2 rounded-md hover:bg-pink-200 deposer" data-depose="{{$user->id}}" data-name="{{$user->name}}">
                  <span class="en">Depose</span>
                  <span class="fa hidden">عزل مقام</span>
                </button>
              @endif
            @else
              <button class="shadow-sm bg-green-300 inline text-green-600 p-2 rounded-md hover:bg-green-400 promoter" data-promote="{{$user->id}}" data-name="{{$user->name}}">
                <span class="en">Promote</span>
                <span class="fa hidden">ترفیع مقام</span>
              </button>
            @endif
            @if($user->username != 'admin')
              <button class="shadow-sm bg-red-200 inline text-red-400 p-2 rounded-md hover:bg-red-300 deleteUser" data-delete="{{$user->id}}" data-name="{{$user->name}}">
                <span class="en">Delete</span>
                <span class="fa hidden">حذف</span>
              </button>
            @endif
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection


@section('script')
  <script type="text/javascript" src="/js/ranker.js"></script>
@endsection