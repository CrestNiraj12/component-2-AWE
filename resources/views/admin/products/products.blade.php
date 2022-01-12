<x-admin-layout title="Products">
    <div class="container grid mb-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Products
            </h2>
            @can('create-product')
                <div>
                    <a href="{{ route("products.storePage") }}" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <span>Add Products</span>
                    </a>
                </div>
            @endcan
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Units</th>
                            <th class="px-4 py-3">Data</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="{{ $product->image }}" alt="{{ $product->title }}" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $product->title }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400 truncate max-w-xs">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $product->category->title }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ {{ $product->price }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight {{ $product->units > 0 ? "text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100" : "text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100" }} rounded-full ">
                                    {{ $product->units > 0 ? "In stock" : "Out of stock" }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->data . " " . $product->category->data_type}}
                            </td>
                            <td>
                                <div class="flex">
                                    <div>
                                        <a href="{{ route("products.show", $product->id) }}" class="flex items-center justify-between px-2 py-2 group text-sm font-lg leading-5 text-white transition-bg duration-150 border border-transparent rounded-full active:bg-gray-100 hover:bg-gray-100 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-500 group-hover:fill-green-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    @can("update-product", $product)
                                        <div>
                                            <a href="{{ route("products.updatePage", ['product' => $product]) }}" class="flex items-center justify-between px-2 py-2 group text-sm font-lg leading-5 text-white transition-bg duration-150 border border-transparent rounded-full active:bg-gray-100 hover:bg-gray-100 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                                <svg class="w-5 h-5 transition-fill duration-150 fill-gray-500 group-hover:fill-purple-700" aria-hidden="true" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endcan
                                    @can("delete-product", $product)
                                        <form method="POST" action="{{ route("products.destroy", ['product' => $product]) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-lg group leading-5 transition-bg duration-150 text-white border border-transparent rounded-full active:bg-gray-100 hover:bg-gray-100 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-500 transition-fill duration-150 group-hover:fill-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links("admin.components.paginator") }}

        </div>

</x-admin-layout>