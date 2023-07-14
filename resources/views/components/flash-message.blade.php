@if(session()->has('message'))
    <div
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    class="fixed top-0 left-1/2 bg-orange-700 text-black text-2xl py-3">

        <p>
            {{session('message')}}
        </p>

    </div>
@endif
