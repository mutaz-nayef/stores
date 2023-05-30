@extends('layout.parent')
@section('title')
    Dashboard
@endsection
@section('styles')
@endsection

@section('content')
    <div class="row lg:grid lg:grid-cols-4 gap-10">
        <div class="box bg-white rounded-b-md">
            <div class="info p-5 flex items-center justify-between">
                <div>
                    <span class="block text-2xl text-yellow-400 font-bold mt-0 mb-2">$30200</span>
                    <span class="block text-sm text-gray-500">All Earnings</span>
                </div>
                <i class="fa-solid fa-money-bill-trend-up text-2xl text-green-500"></i>
            </div>
            <button
                class="text-white bg-yellow-400 hover:bg-yellow-500 transition duration-300 text-center w-full p-2 text-sm rounded-b-md">%
                change</button>
        </div>

        <div class="box bg-white rounded-b-md">
            <div class="info p-5 flex items-center justify-between">
                <div>
                    <span class="block text-2xl text-blue-500 font-bold mt-0 mb-2">+999</span>
                    <span class="block text-sm text-gray-500">Product</span>
                </div>
                <i class="fa-brands fa-product-hunt text-2xl text-blue-500"></i>
            </div>
            <button
                class="text-white bg-blue-400 hover:bg-blue-500 transition duration-300 text-center w-full p-2 text-sm rounded-b-md">%
                change</button>
        </div>

        <div class="box bg-white rounded-b-md">
            <div class="info p-5 flex items-center justify-between">
                <div>
                    <span class="block text-2xl text-red-500 font-bold mt-0 mb-2">+10</span>
                    <span class="block text-sm text-gray-500">Cars</span>
                </div>
                <i class="fa-solid fa-truck-moving text-2xl text-red-500"></i>
            </div>
            <button
                class="text-white bg-red-400 hover:bg-red-500 transition duration-300 text-center w-full p-2 text-sm rounded-b-md">%
                change</button>
        </div>

        <div class="box bg-white rounded-b-md">
            <div class="info p-5 flex items-center justify-between">
                <div>
                    <span class="block text-2xl text-green-500 font-bold mt-0 mb-2">+200</span>
                    <span class="block text-sm text-gray-500">Customers</span>
                </div>
                <i class="fa-solid fa-people-group text-2xl text-green-500"></i>
            </div>
            <button
                class="text-white bg-green-400 hover:bg-green-500 transition duration-300 text-center w-full p-2 text-sm rounded-b-md">%
                change</button>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
