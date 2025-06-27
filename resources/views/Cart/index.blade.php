@extends('Users.base')
@section('title', "Cart")
@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
      
      @if($cart->items->isEmpty())
        <h1 class="h1 text-center font-bold text-gray-800 my-20 dark:text-gray-400">
          Your Cart is empty
        </h1>
      @else
        <h1 class="h1 font-bold text-gray-800 mb-8 dark:text-gray-400">
          Your Cart
        </h1>
      @endif
      
      <!-- Cart Items -->
      <div class="bg-white dark:!bg-sky-900 rounded-xl shadow-sm overflow-hidden mb-8">
        <!-- Cart Item 1 -->
        @php $total = 0; @endphp
        @foreach($cart->items as $item)
        <div class="flex flex-col sm:flex-row border-b border-gray-100 dark:border-sky-700 last:border-0">
          <div class="sm:w-48 bg-gray-100 flex items-center justify-center">
            <img src="{{asset('storage/' . $item->product->images->first()->image_path)}}" alt="Product Image" class="h-full w-full max-h-full max-w-full object-cover">
          </div>
          <div class="flex-1 p-6">
            <div class="flex justify-between items-start">
              <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-300">{{ $item->product->name }}</h3>
                <p class="text-gray-500 text-sm mt-1 dark:text-gray-400">{{ $item->product->short_description }}</p>
              </div>
              <form method="POST" action="{{route('cart.remove', $item->product_id)}}">
                  @csrf
              <button class="text-gray-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
              </form>
            </div>
            
            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center border border-gray-200 dark:!border-sky-700 rounded-lg">
                @if($item->quantity > 1)
                <form method="POST" action="{{route('cart.update', $item->product_id)}}">
                  @csrf
                  <input type="hidden" name="quantity" value="{{$item->quantity - 1}}">
                  <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 dark:text-gray-400 rounded-lg dark:hover:bg-gray-500" type="submit">-</button>
                </form>
                @endif

                <span class="px-4 py-1 text-gray-800 dark:text-gray-300">{{ $item->quantity }}</span>

                <form action="{{route('cart.update', $item->product_id)}}" method="POST">
                  @csrf
                  <input type="hidden" name="quantity" value="{{$item->quantity + 1}}">
                  <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 dark:text-gray-400 rounded-lg dark:hover:bg-gray-500" type="submit">+</button>
                </form>
              </div>
              <div>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-400">
                  Price per Unit : ${{ $item->price}}
                </p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-400">
                  Total : ${{ $item->price * $item->quantity}}
                </p>
              </div>
              @php 
              $subTotal = $item->price * $item->quantity;
              $total += $subTotal; 
              @endphp
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      
      @if($cart->items->isNotEmpty())
      <!-- Order Summary -->
      <div class="bg-white dark:!bg-sky-900 rounded-xl shadow-sm overflow-hidden p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4 dark:text-gray-400">Order Summary</h2>
        
        <div class="space-y-3 mb-6">
          <div class="flex justify-between">
            <span class="text-gray-600 dark:text-gray-300">Subtotal</span>
            <span class="text-gray-800 dark:text-gray-400">${{$total}}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600 dark:text-gray-300">Shipping</span>
            <span class="text-gray-800 dark:text-gray-400">Free</span>
          </div>
          <div class="flex justify-between border-t border-gray-200 pt-4 mt-4">
            <span class="text-lg font-semibold text-gray-800 dark:text-gray-400">Total</span>
            <span class="text-lg font-bold text-gray-800 dark:text-gray-400">${{$total}}</span>
          </div>
        </div>
        
        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-colors disabled:cursor-not-allowed disabled:opacity-40" disabled>
          Proceed to Checkout
        </button>
        
        <div class="mt-4 flex items-center justify-center space-x-2">
          <span class="text-gray-500 dark:text-gray-300">or</span>
          <a href="/#shop" class="text-indigo-600 hover:text-indigo-800 font-medium dark:text-blue-400 hover:underline">Continue Shopping</a>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection