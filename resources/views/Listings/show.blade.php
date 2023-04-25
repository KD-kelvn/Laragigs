<x-Layout>
@include('partials._Search')
<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<x-card class="p-10">
    <div
        class="flex flex-col items-center justify-center text-center"
    >
        <img
            class="w-48 mr-6 mb-6"
            src="{{$data->logo ? asset('storage/'.$data->Logo) : asset('images/no-image.png')}}"
            alt=""
        />

        <h3 class="text-2xl mb-2">{{$data->Title}}</h3>
        <div class="text-xl font-bold mb-4">{{$data->Company}}</div>
         <x-listing-tags :tagsCsv="$data->Tags"/>
        <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{$data->Location}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Job Description
            </h3>
            <div class="text-lg space-y-6">
                <p>
                   {{$data->Descritpion}}
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur
                    adipisicing elit. Quaerat praesentium eos
                    consequuntur ex voluptatum necessitatibus
                    odio quos cupiditate iste similique rem in,
                    voluptates quod maxime animi veritatis illum
                    quo sapiente.
                </p>

                <a
                    href="mailto:{{$data->Email}}"
                    class="w-[30%] block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Employer</a
                >

                <a
                    href="{{$data->website}}"
                    target="_blank"
                    class="w-[30%]  block bg-black text-white py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >
            </div>
        </div>
    </div>
</x-card>

</div>
</x-Layout>
