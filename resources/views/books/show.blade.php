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
</x-app-layout>
