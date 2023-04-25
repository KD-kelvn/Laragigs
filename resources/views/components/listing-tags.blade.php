@props(['tagsCsv'])
@php
   $Tags = explode(',',$tagsCsv); 
@endphp
<ul class="flex">
    @foreach($Tags as $Tag)
    <li
        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
    >
        <a href="/?tag={{$Tag}}">{{$Tag}}</a>
    </li>
    @endforeach
 
</ul>