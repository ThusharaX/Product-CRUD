<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    {{-- Edit product form --}}
    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-0">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex flex-col break-words p-8">
                                    <div class="flex-1">
                                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                            {{ __('Name') }}
                                        </label>
                                        <input id="name" type="text" value="{{ $product->name }}"
                                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                            name="name" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="flex-1">
                                        <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                                            {{ __('Price') }}
                                        </label>
                                        <input id="price" type="number" value="{{ $product->price }}"
                                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                            name="price" required autocomplete="price" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 p-8">
                                <div class="flex flex-col break-words">
                                    <div class="flex-1">
                                        <label for="image" class="block text-sm font-medium leading-5 text-gray-700">
                                            {{ __('Image') }}
                                        </label>
                                        <input id="image" type="file" value="{{ $product->image }}"
                                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                            name="image" autocomplete="image" autofocus
                                            accept="image/jpg, image/jpeg, image/png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add new product button --}}
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Update Product') }}
            </button>
        </div>
    </form>

</x-app-layout>
