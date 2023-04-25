@props(['new'])

    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$new->Logo ? asset('storage/'.$new->Logo) : asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$new->id}}">{{$new->Title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$new->Company}}</div>
             <x-listing-tags :tagsCsv="$new->Tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$new->Location}}
            </div>
        </div>
    </div>

