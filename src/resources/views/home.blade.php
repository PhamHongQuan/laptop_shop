@extends('layouts.app')

@section('content')

@php

$laptops = [
[
'name'=>'MacBook Air M4',
'brand'=>'Apple',
'price'=>'29.990.000',
'image'=>'https://images.unsplash.com/photo-1517336714739-489689fd1ca8?w=800'
],
[
'name'=>'Dell XPS 13',
'brand'=>'Dell',
'price'=>'34.990.000',
'image'=>'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800'
],
[
'name'=>'ASUS ROG Zephyrus',
'brand'=>'ASUS',
'price'=>'39.990.000',
'image'=>'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=800'
],
[
'name'=>'Lenovo Legion Pro',
'brand'=>'Lenovo',
'price'=>'36.490.000',
'image'=>'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=800'
],
];

@endphp

<div class="bg-white">

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>

                <span class="text-sm tracking-widest text-gray-500 uppercase">
                    New Collection
                </span>

                <h1 class="mt-5 text-5xl font-bold text-gray-900 leading-tight">

                    Find Your
                    <br>

                    Perfect Laptop.

                </h1>

                <p class="mt-6 text-gray-600 leading-8">

                    Premium laptops for work, gaming and creativity.
                    Trusted brands with official warranty and fast delivery.

                </p>

                <div class="mt-8 flex gap-4">

                    <button class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800">

                        Shop Now

                    </button>

                    <button class="px-6 py-3 border rounded-lg hover:bg-gray-100">

                        Explore

                    </button>

                </div>

            </div>

            <div>

                <img
                    src="https://images.unsplash.com/photo-1517336714739-489689fd1ca8?w=1200"
                    class="rounded-2xl shadow-xl">

            </div>

        </div>

    </section>


    {{-- Brands --}}

    <section class="border-y bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid grid-cols-2 md:grid-cols-5 text-center text-gray-500 font-semibold gap-8">

                <div>Apple</div>
                <div>Dell</div>
                <div>ASUS</div>
                <div>Lenovo</div>
                <div>MSI</div>

            </div>

        </div>

    </section>



    {{-- Featured --}}

    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="flex justify-between items-center mb-10">

            <div>

                <h2 class="text-3xl font-bold">

                    Featured Products

                </h2>

                <p class="text-gray-500 mt-2">

                    Selected for you

                </p>

            </div>

            <a href="#" class="text-sm text-blue-600 hover:underline">

                View all →

            </a>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($laptops as $item)

            <div class="group bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">

                <div class="aspect-square overflow-hidden bg-gray-100">

                    <img
                        src="{{ $item['image'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                </div>

                <div class="p-5">

                    <div class="text-sm text-gray-500">

                        {{ $item['brand'] }}

                    </div>

                    <h3 class="mt-2 font-semibold text-lg">

                        {{ $item['name'] }}

                    </h3>

                    <div class="mt-4 flex justify-between items-center">

                        <span class="font-bold">

                            {{ $item['price'] }}₫

                        </span>

                        <button class="text-sm px-4 py-2 border rounded-lg hover:bg-black hover:text-white transition">

                            Buy

                        </button>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </section>



    {{-- Banner --}}

    <section class="bg-gray-900">

        <div class="max-w-7xl mx-auto px-6 py-20 text-center">

            <h2 class="text-white text-4xl font-bold">

                Built for Performance.

            </h2>

            <p class="text-gray-300 mt-5 max-w-2xl mx-auto">

                Discover laptops powered by the latest Intel, AMD and Apple Silicon processors.

            </p>

        </div>

    </section>



    {{-- Why us --}}

    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-3 gap-12">

            <div>

                <div class="text-xl font-semibold">

                    🚚 Free Shipping

                </div>

                <p class="mt-3 text-gray-500">

                    Nationwide delivery with secure packaging.

                </p>

            </div>

            <div>

                <div class="text-xl font-semibold">

                    🛡 Official Warranty

                </div>

                <p class="mt-3 text-gray-500">

                    Genuine products from authorized distributors.

                </p>

            </div>

            <div>

                <div class="text-xl font-semibold">

                    💳 Flexible Payment

                </div>

                <p class="mt-3 text-gray-500">

                    Installments available with major banks.

                </p>

            </div>

        </div>

    </section>

</div>

@endsection
