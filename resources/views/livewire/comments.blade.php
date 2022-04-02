<section class="text-gray-600 body-font relative">
    @if (session()->has('message'))
    <x-toast>{{ session('message') }}</x-toast>
    @endif
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <form wire:submit.prevent='store' class="flex md:flex-nowrap flex-wrap  items-end w-full ">
                    <div class="relative   sm:mr-4 mr-2  w-full">
                        <label for="footer-field" class="leading-7 text-sm text-gray-100">Comment</label>
                        <input type="text" placeholder="What's on your mind 💬 "
                            wire:model='newComment' wire:keydown.enter='store'
                            class="w-full bg-gray-500 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:text-gray-100 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    <button type="submit"
                        class="inline-flex text-white bg-indigo-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-00 rounded">
                        Add
                    </button>
                </form>
                @error('newComment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                @forelse ($comments as $comment)
                    <div class="p-2 w-full mt-8 border border-gray-200 shadow-lg rounded relative">
                        <a class="title-font text-lg font-medium text-gray-200 mb-3 mr-2">{{ $comment->user->name }}</a>
                        <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        <button wire:click='delete({{ $comment->id }})'  class="absolute right-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">X</button>
                        <p class="text-gray-50 my-5 text-sm">{{ $comment->body }}</p>
                    </div>
                @empty
                    <div class="p-2 w-full mt-8 border border-gray-200 shadow-lg rounded">
                        <p class="my-5 text-sm">No comment yet, be the first to comment 😄</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
