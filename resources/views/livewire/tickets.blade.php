<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="mx-auto">
            <div class="flex flex-wrap -m-2">
               <h1>Tickets</h1>
               @forelse ($tickets as $ticket)
               <div class="mt-2 border border-gray-200 shadow-lg rounded">
                  <h1>{{ $ticket->question }}</h1>
               </div>
           @empty
               <div class="p-2 w-full mt-8 border border-gray-200 shadow-lg rounded">
                   <p class="my-5 text-sm">No Tickets yet 🫙</p>
               </div>
           @endforelse
        </div>

    </div>
</section>
