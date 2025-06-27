@extends('Users.base')

@section('content')
	<div class="container min-h-screen">
		@if($p->isEmpty())
			<p class="h3 text-center my-32 text-gray-600 dark:text-gray-300">No such products yet!</p>
		@else
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 pt-10">
				@foreach($p as $product)
				<!-- Product Card -->
				<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm overflow-hidden">
				<!-- Product Image -->
					<img 
					  class="w-full h-48 object-cover" 
					  src="{{$product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->image_path) : asset('/images/emptyProduct.jpg') }}" 
					  alt="Product Image"
					/>

					<!-- Product Details -->
					<div class="p-6">
					  <!-- Product Title -->
					  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-2">{{$product->name}}</h2>
					  
					  <!-- Product Description -->
					  <p class="text-gray-600 text-sm mb-4 dark:text-gray-400">
					    {{$product->short_description}}
					  </p>
					  
					  <!-- Price and Add to Cart Button -->
					  <div class="flex items-center justify-between">
					    <!-- Price -->
					    <span class="text-lg font-bold text-gray-900 dark:text-gray-300">${{$product->price}}</span>
					    
					    <div class="flex">
					    	<!-- Buttons -->
						    <a href="/singleProduct/{{$product->id}}" class="bg-sky-200 text-sky-400 hover:text-sky-600 p-2 rounded hover:bg-sky-300 me-1">
						      <span class="bi bi-eye"></span>
						    </a>
						    <form action="{{ route('cart.add', $product->id) }}" method="POST">
							    @csrf
							    <input type="hidden" name="quantity" value="1" min="1">
							    <button type="submit" class="bg-green-200 text-green-400 hover:text-green-600 p-2 rounded hover:bg-green-300">
							    	<span class="bi bi-cart"></span>
							    </button>
							</form>
					    </div>
					  </div>
						<div class="mt-2">
							<span class="text-white text-sm bg-gray-400 rounded-md p-1 me-1">
								{{$product->category->name}}
							</span>
							@if($product->subCategory?->name != null)
								<span class="text-white text-sm bg-gray-400 rounded-md p-1">
									{{$product->subCategory->name}}
								</span>
							@endif
						</div>
					</div>
				</div>
				<!-- Product Card End-->
				@endforeach
			</div>
		@endif
	</div>
@endsection