@extends('layouts.public')
@section('content')
    <!-- Hero -->
    <section class="text-gray-600 bg-gray-100 body-font">
        <div class="container flex flex-col items-center px-5 py-24 mx-auto md:flex-row">
            <div class="flex flex-col items-center mb-16 text-center lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:items-start md:text-left md:mb-0">
                <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl">
                    Smart Farmer
                </h1>
                <p class="mb-8 leading-relaxed">
                    Smart farmer is a platform that helps farmers to sell their products online. It also helps farmers to get the best price for their products.
                    Customers can also buy products from farmers at a cheaper price.
                </p>
                <div class="flex justify-center">
                    <a href="#" class="inline-flex px-6 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                        View Farmers
                    </a>
                </div>
            </div>
            <div class="w-5/6 lg:max-w-lg lg:w-full md:w-1/2">
                <img class="object-cover object-center rounded" alt="hero" src="{{ asset('assets/images/farmer-1.webp') }}">
            </div>
        </div>
    </section>

    <!-- Latest Products -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 pt-12 pb-24 mx-auto">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="text-2xl font-medium text-gray-900 sm:text-3xl title-font">Top Farmers</h1>
            </div>
            <div class="grid grid-cols-1 gap-4 -m-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($farmers as $farmer)
                    <div class="p-4 border rounded-md w-72">
                        <a class="relative block overflow-hidden rounded h-30">
                            <img alt="ecommerce" class="block object-cover object-center w-full h-full" src="https://ui-avatars.com/api/?background=a5b4fc&color=f1f5f9&name={{ $farmer?->name }}">
                        </a>
                        <div class="flex items-center justify-between gap-6 mt-4">
                            <div>
                                <h2 class="font-medium text-gray-900 text-md title-font">{{ $farmer->name }}</h2>
                                <p class="mt-1 text-sm">Total sales: {{ $farmer->farmer_orders_count }}</p>
                            </div>
                            <div>
                                <a href="{{ route('farmer.products', $farmer) }}" class="inline-flex items-center px-3 py-1 mt-4 text-xs font-medium text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                    Order
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col w-full mt-20 text-center">
                <a href="{{ route('farmers') }}" class="text-lg font-medium tracking-widest text-indigo-500 title-font">
                    View all
                </a>
            </div>
        </div>
    </section>
@endsection
