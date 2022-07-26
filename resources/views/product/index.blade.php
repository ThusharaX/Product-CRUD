<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    {{-- Content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Table for products --}}
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                                {{ __('ID') }}</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                                {{ __('Image') }}</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                                {{ __('Name') }}</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                                {{ __('Price(LKR)') }}</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                                {{ __('Status') }}</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                            </th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @if (count($products) > 0)
                            @foreach ($products as $key => $product)
                                <tr onclick="window.location='{{ route('product.view', $product->id) }}';"
                                    class="bg-gray-300 border border-grey-500 md:border-none block md:table-row cursor-pointer">
                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">name</span>{{ $product->id }}
                                    </td>
                                    {{-- Show image --}}
                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="object-cover h-24 w-48 shadow-xl rounded-md">
                                    </td>


                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
                                        <span class="inline-block w-1/3 md:hidden font-bold">name</span>
                                        <a class="underline"
                                            href="{{ route('product.view', $product->id) }}">{{ $product->name }}
                                        </a>
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">price</span>{{ $product->price }}
                                    </td>
                                    @if ($product->status == 'inactive')
                                        <td
                                            class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-red-700 font-bold">
                                            <a href="{{ route('product.setActive', $product->id) }}"
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">
                                                {{ $product->status }}
                                            </a>

                                        </td>
                                    @else
                                        <td
                                            class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-green-700 font-bold">
                                            <a href="{{ route('product.setInactive', $product->id) }}"
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                {{ $product->status }}
                                            </a>
                                        </td>
                                    @endif
                                    {{-- Edit button --}}
                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="inline-block text-sm px-4 py-2 leading-none border rounded-full bg-blue-500 text-white hover:bg-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                    </td>
                                    {{-- Delete button --}}
                                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block text-sm px-4 py-2 leading-none border rounded-full bg-red-500 text-white hover:bg-red-700">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="7">
                                    <h1 class="text-center m-10 font-bold text-xl">{{ __('No products found') }}</h1>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- Add new product button --}}
                <div class="p-8 flex justify-center">
                    <a href="{{ route('product.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Add New Product') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
