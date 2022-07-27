<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    {{-- Content --}}
    {{-- return view('product.view')->with('product', $product); --}}
    {{-- Product Details Card --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:p-0">
                    <div class="border-b border-gray-200 pb-4">
                        <div class="flex justify-between items-center p-8">
                            <div class="flex-1 min-w-0">
                                {{-- Image --}}
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="object-cover h-48 w-full shadow-lg mb-5 rounded-lg">

                                <h2 class="text-lg leading-6 font-medium text-gray-900">
                                    Product name : {{ $product->name }}
                                </h2>
                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    Price : LKR {{ $product->price }}
                                </p>

                                @if ($product->status == 'inactive')
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        Status : <span class="text-red-500">{{ $product->status }}</span>
                                    </p>
                                @else
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        Status : <span class="text-green-500">{{ $product->status }}</span>
                                    </p>
                                @endif

                                {{-- Edit Button --}}
                                <span class="inline-flex rounded-md shadow-sm mt-5">
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150">
                                        Edit
                                    </a>
                                </span>

                                {{-- Delete Button --}}
                                <span class="inline-flex rounded-md shadow-sm mt-5">
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="px-4 py-5 sm:p-0">
                        <dl class="grid grid-cols-1 row-gap-6 col-gap-4">
                            <div class="col-span-1">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    {{ __('Price') }}
                                </dt>
                                <dd class="mt-1 text-sm leading-5 text-gray-900">
                                    {{ $product->price }}
                                </dd>
                            </div>
                        </dl>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
