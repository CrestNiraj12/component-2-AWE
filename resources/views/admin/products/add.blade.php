<x-admin-layout title="Add Products">
    <div class="container grid mb-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Products
        </h2>

        <form method="POST" enctype="multipart/form-data" action="{{ route("products.store") }}">
            @csrf
            <!-- General elements -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                        <input name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: Jane Doe" required/>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Category
                        </span>
                        <select name="product_category_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea rows="10" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter description." required></textarea>
                    </label>
                </div>
                <div class="mt-4 text-sm form-group">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">Image</label>
                    <img src="https://via.placeholder.com/150x150.png?text=No+Image+Selected" id="imagePlaceholder" alt="image"
                    style="display:block;margin-bottom:20px;max-width: 250px;height: 150px;object-fit:contain;" />
                    <div class="mt-5 input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input text-xs" id="image" name="image" required>
                        </div>
                    </div>    
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Price</span>
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input name="price" min="1" type="number" step="0.01" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" required />
                            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Units</span>
                        <input name="units" min="1" type="number" class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" required />
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Data</span>
                        <input name="data" min="1" type="number" class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" required />
                    </label>
                </div>
                
                <button type="submit" class="mt-5 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Submit</span>
                </button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            function readURL(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#imagePlaceholder").attr('src', e.target.result);
                    }

                    reader.readAsDataURL(e.target.files[0]);
                }
            }
            $("#image").on("change", readURL);
        });
    </script>
</x-admin-layout>