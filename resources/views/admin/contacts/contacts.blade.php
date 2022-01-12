<x-admin-layout title="User Contacts">
    <div class="container grid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                User Contacts
            </h2>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if (count($contacts) > 0)
                        @foreach ($contacts->items() as $contact)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $contact->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $contact->email }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $contact->subject }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @can("view-contacts", $contact->id)
                                        <div>
                                            <a href="{{ route("contacts.show", $contact->id) }}" class="flex items-center justify-between px-2 py-2 group text-sm font-lg leading-5 text-white transition-bg duration-150 border border-transparent rounded-full active:bg-gray-100 hover:bg-gray-100 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-500 group-hover:fill-green-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else <tr><td colspan="3"><p class="p-5">No user contacts found!</p><td><tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $contacts->links("admin.components.paginator") }}
        </div>

</x-admin-layout>