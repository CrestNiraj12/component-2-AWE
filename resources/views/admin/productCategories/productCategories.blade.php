<x-admin-layout title="Product Categories">
    <div class="container grid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Product Categories
            </h2>
            @can('create-product-category')
            <div>
                <a href="{{ route("productCategories.storePage") }}" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Add Product Category</span>
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
                            <th class="px-4 py-3 text-center">Image</th>
                            <th class="px-4 py-3">Data Type</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($categories->items() as $category)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $category->title }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs flex justify-center">
                                <img class="object-cover w-full h-full max-w-[8%] rounded-lg" src="{{ $category->image }}" alt="{{ $category->title }}" loading="lazy" />
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $category->data_type }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex">
                                    @can("update-product-category", $category->id)
                                    <div>
                                        <a href="{{ route("productCategories.updatePage", $category->id) }}" class="flex items-center justify-between px-2 py-2 group text-sm font-lg leading-5 text-white transition-bg duration-150 border border-transparent rounded-full active:bg-gray-100 hover:bg-gray-100 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                            <svg class="w-5 h-5 transition-fill duration-150 fill-gray-500 group-hover:fill-purple-700" aria-hidden="true" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                @endcan
                                @can("delete-product-category", $category->id)
                                    <form method="POST" action="{{ route("productCategories.destroy", $category->id) }}">
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
            {{ $categories->links("admin.components.paginator") }}
        </div>

</x-admin-layout>