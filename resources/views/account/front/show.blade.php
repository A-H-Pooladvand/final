@extends('_layouts.front.index')

@section('content')

    <h1>{{ $user->fullName() }}</h1>

    @if(auth()->id() !==$user->id)
        <form action="{{ route('follow.store', $user->id) }}" method="post" id="follow--form">
            {{ csrf_field() }}

            <button class="btn btn-primary">
                @if($alreadyFollower)
                    <i class="fa fa-user-times"></i>
                    <span>دنبال نکردن</span>
                @else
                    <i class="fa fa-user-plus"></i>
                    <span>دنبال کردن</span>
                @endif
                {{ $user->fullName() }}
            </button>

        </form>
    @endif

@endsection