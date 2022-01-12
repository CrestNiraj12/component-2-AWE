<x-admin-layout title="Edit Product Categories">
    <div class="container grid mb-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Product Categories
        </h2>

        <form method="POST" enctype="multipart/form-data" action="{{ route("productCategories.update", $category->id) }}">
            @csrf
            @method("PUT")
            <!-- General elements -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                        <input name="title" value="{{ $category->title }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: Jane Doe" required/>
                    </label>
                </div>
                <div class="mt-10 text-sm form-group">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">Image</label>
                    <img src="{{ $category->image }}" id="imagePlaceholder" alt="image"
                    style="display:block;margin-bottom:20px;max-width: 250px;height: 150px;object-fit:contain;" />
                    <div class="mt-5 input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input text-xs" id="image" name="image" required>
                        </div>
                    </div>    
                </div>
                <div class="mt-10 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Data Type</span>
                        <input name="data_type"  value="{{ $category->data_type }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: mins, hours, etc" required/>
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