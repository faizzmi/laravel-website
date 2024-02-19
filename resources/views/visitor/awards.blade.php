

@extends('layouts.app')

@section('content')
<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <section>
        <div class="containermb-24 mx-auto xl:px-0">
            <div class="text-center mb-4">
                <h2 class="mb-4 md:mb-8 text-4xl font-bold leading-tight">Awards</h2>
                <p class="max-w-3xl mx-auto"></p>
            </div>

            <div class="flex flex-wrap p-8 gap-4">
                @foreach ($awards as $award)
                    <div class="max-w-[500px] sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-4">
                        <div class="rounded overflow-hidden shadow-lg">
                            <img class="w-full" src="{{asset('assets/images/test.webp')}}" alt="Sunset in the mountains">
                            <div class="px-6 pb-4">
                                <h1 class="font-bold text-xl mb-2">{{ $award->awardName }}</h1>
                                <p class="text-gray-700 text-base">{{ $award->award_date }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <div class="h-[300px]"></div>
</main>

@endsection

