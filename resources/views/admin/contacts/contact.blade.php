<x-admin-layout title="Contact Info">
    <div class="container grid mb-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Contact Info
        </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <span class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray">{{ $contact->name }}</span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <span class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray">{{ $contact->email }}</span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Subject</span>
                        <span class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray">{{ $contact->subject }}</span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Message</span>
                        <span class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray">{{ $contact->message }}</span>
                    </label>
                </div>
            </div>
  
    </div>
</x-admin-layout>