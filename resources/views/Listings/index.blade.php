<x-Layout>
@include('partials._Hero')
@include('partials._Search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($news)  == 0)
        @foreach($news as $new)
          <x-card>
            <x-listing-card :new="$new"/> 
          </x-card>
        @endforeach
    @endunless
</div>
<div class="mt-5 p-3">
  {{$news->links()}}
</div>
</x-Layout>