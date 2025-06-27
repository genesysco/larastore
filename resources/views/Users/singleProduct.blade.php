@extends('Users.base')
@section('title', "Single Product")

@section('content')
  	@if($p != null)
	<!-- Product Card -->
	  <div class="my-16 max-w-4xl w-full mx-auto bg-white dark:!bg-gray-800 shadow-xl rounded-2xl overflow-hidden transition-all duration-300 transform hover:scale-[1.01]">
	    <div class="md:flex items-center">
	      <!-- Product Image -->
	      <div class="md:w-1/2">
	      	@if($p->images->isEmpty())
	      		<img src="{{asset('/images/emptyProduct.jpg')}}" alt="Empty Image">
	      	@else
		        <img src="{{asset('storage/' . $p->images->first()->image_path)}}" alt="Product Image" class="w-full rounded-br-3xl" id="bigImage" data-id="{{$p->images->first()->id}}">
		        <div class="w-full p-3 rounded-2xl flex gap-3 overflow-x-scroll">
		        	@foreach($p->images as $image)
		        		<img src="{{asset('storage/' . $image->image_path)}}" class="h-12 rounded-2xl {{$loop->first ? '':'opacity-50'}} hover:!opacity-100 cursor-pointer smallImage" data-id="{{$image->id}}">
			        @endforeach
		        </div>
	      	@endif
	      	
	      </div>

	      <!-- Product Info -->
	      <div class="md:w-1/2 p-8 md:p-10 space-y-4">
	        <h2 class="text-2xl md:text-3xl font-bold">{{$p->name}}</h2>
	        <p class="text-sm text-gray-300 dark:text-gray-400">{{$p->short_description}}</p>
	        
	        <!-- Rating -->
	        <div class="flex items-center space-x-1">
	          <span class="text-yellow-400">★★★★★</span>
	          <span class="text-xs text-gray-600 dark:text-gray-400">(4.9 - 120 reviews)</span>
	        </div>

	        <!-- Description -->
	        <p class="text-gray-700 dark:text-gray-300 mt-2">
	          {{$p->description}}
	        </p>

	        <!-- Price -->
	        <div class="mt-4">
	          <span class="text-3xl font-semibold">${{$p->price}}</span>
	          <span class="text-sm text-gray-500 line-through ml-2">${{$p->price + 540}}</span>
	        </div>

	        <!-- CTA Button -->
	        <div class="mt-6">
	        	<form action="{{ route('cart.add', $p->id) }}" method="POST">
				    @csrf
				    <input type="hidden" name="quantity" value="1" min="1">
				    <button type="submit" class="w-full py-3 px-6 bg-black hover:bg-gray-800 text-white font-medium rounded-lg transition-colors duration-300">
				    	Add to Cart
				    </button>
				</form>
	        </div>
	      </div>
	    </div>
	  </div>
	@else
		<div class="min-h-screen">
			<p class="h2 mt-10 text-center dark:text-gray-400">No such product yet!</p>
		</div>
    @endif
@endsection

@section('script')
	<script src="/js/singleProductGallery.js"></script>
@endsection