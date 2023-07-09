<x-layout>

    @section('content')

    @include('partials._hero')
    @include('partials._search')

    @unless(count($listings) == 0)

    <div class="m-10">

        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>

            <x-card></x-card>
        @endforeach

        @else
            <p>Nenalezeno</p>
        @endunless

    </div>

</x-layout>
