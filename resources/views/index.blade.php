@extends('layout.master')

@inject('pushall', 'App\Service\Pushall')
@dd($pushall)

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            MAIN PAGE
        </h3>

{{--        @if ($condition)--}}

{{--        @elseif($condition2)--}}

{{--        @else--}}

{{--        @endif--}}

{{--        @unless (Auth::check())--}}
{{--            dsafasdfas--}}
{{--        @endunless--}}

{{--        @isset($data)--}}
{{--        @endisset--}}

{{--        @empty($value)--}}
{{--        @endempty--}}

{{--        @auth--}}
{{--        @elseauth--}}
{{--        @endauth--}}

{{--        @guest--}}
{{--        @endguest--}}

{{--        @hasSection('sidebar')--}}
{{--            // Есть сайдбар--}}
{{--        @endif--}}

{{--        @switch ($item)--}}
{{--            @case(1)--}}
{{--                first--}}
{{--            @break--}}
{{--            @case(2)--}}
{{--                second--}}
{{--            @default--}}
{{--                default--}}
{{--        @endswitch--}}

{{--        @for ($i = 0; $i < 10; $i++)--}}
{{--            //--}}
{{--        @endfor--}}

{{--        @while($boolean)--}}
{{--        @endwhile--}}

{{--        @foreach ($users as $user)--}}
{{--        @endforeach--}}
{{--        @foreach ($groups as $users)--}}
{{--            @forelse ($users as $user)--}}

{{--                @if ($loop->parent->first)--}}
{{--                    Это первая группа и пользователей в ней--}}
{{--                @endif--}}

{{--                @if ($loop->last)--}}
{{--                    Это последний--}}
{{--                @endif--}}

{{--                @loop->index--}}
{{--                @loop->iteration--}}
{{--                @loop->remaining--}}
{{--                @loop->count--}}
{{--                @loop->first--}}
{{--                @loop->last--}}
{{--                @loop->depth--}}
{{--                @loop->parent--}}

{{--                @php--}}
{{--                    $a = 42;--}}
{{--                @endphp--}}

{{--                @continue($user->id == 1))--}}
{{--                @break($user->id == 2)--}}


{{--                <p>Пользователь: {{ $user->id }}</p>--}}
{{--            @empty--}}
{{--                <p>Нет ни одного пользователя</p>--}}
{{--            @endforelse--}}
{{--        @endforeach--}}

{{--        @env('local')--}}
{{--            Локальное окружение--}}
{{--            @elseenv('testing)--}}
{{--            @else--}}
{{--                @endenv--}}


    </div>
@endsection
