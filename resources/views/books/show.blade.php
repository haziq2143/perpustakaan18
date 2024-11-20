<x-app-layout>
    <div class="w-full lg:flex">
        <div class="w-full flex justify-center">
            <img src="{{ asset($book->image) }}" alt="" class="w-1/2 md:w-1/3 lg:w-full lg:h-full">
        </div>
        <div class="text">
            <div class="text-center lg:text-left lg:ms-14 lg:mt-12">
                <h1 class="text-primary font-bold text-2xl lg:text-4xl">{{ $book->title }}</h1>
                <p class="text-gray-500 text-sm lg:text-md">Stock : {{ $book->stock }}</p>
            </div>
            <div class="relative  mx-auto max-w-full md:p-10">
                <table class="w-full text-lg text-left ">

                    <tbody>
                        <tr class="bg-white border-b ">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-primary whitespace-nowrap dark:text-white">
                                Author
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->author }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-primary whitespace-nowrap dark:text-white">
                                Pages
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->pages }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-primary whitespace-nowrap dark:text-white">
                                Category
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->category->name }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-primary whitespace-nowrap dark:text-white">
                                Shelf Number
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->shelf_number }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-primary whitespace-nowrap dark:text-white">
                                Description
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->description->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <div class="w-full mt-14">
        <h1 class="text-3xl font-bold text-primary mb-2">Komentar:</h1>
        <form class="md:w-1/2 w-full mb-5" action="/comments/{{ $book->id }}" method="POST">
            @csrf
            <label for="comment" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input type="text" id="comment" name="comment"
                    class="block w-full p-3 ps-10 text-lg  border border-primary rounded-lg bg-gray-50 focus:ring-primary focus:border-primary text-primary"
                    placeholder="Comment" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-600 font-medium rounded-lg text-sm px-4 py-2 ">Send</button>
            </div>
        </form>
        <div class="w-full lg:p-20 p-5">

            @foreach ($comments as $comment)
                @if ($comment->user_id == Auth::id())
                    <div class="komentar mb-6">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-semibold text-primary">{{ $comment->user->name }}</h2>
                            <form action="/comments/{{ $comment->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg class="w-5" viewBox="0 -0.5 21 21" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title>delete [#ff0000]</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs> </defs>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-179.000000, -360.000000)" fill="#ff0000">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z"
                                                            id="delete-[#ff0000]"> </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <p class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        <p>{{ $comment->comment }}</p>
                        <hr class="mt-2">
                    </div>
                @else
                    <div class="komentar mb-6">
                        <h2 class="text-xl font-semibold text-primary">{{ $comment->user->name }}</h2>
                        <p class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        <p>{{ $comment->comment }}</p>
                        <hr class="mt-2">
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</x-app-layout>
