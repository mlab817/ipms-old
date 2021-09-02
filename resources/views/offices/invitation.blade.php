@extends('layouts.header-only')

@section('content')
    <div class="container-md">
        <div class="Box mx-auto my-6 p-4 col-11">
            <div class="text-center position-relative">
                <img class="avatar mb-4" src="{{ $member->office->image }}" width="75" height="75" alt="@da-pms">

                <p class="f3">
                    You’ve been invited to the
                    <a href="{{ route('offices.show', $member->office) }}" class="no-underline"><strong>{{ $member->office->acronym }}</strong></a>
                    organization!
                </p>

                <p class="color-text-tertiary text-small mb-4">
                    Invited by {{ $member->inviter->full_name }}
                </p>

                <div class="my-4">
                    <form class="inline-form" method="post" action="{{ route('members.update', $member) }}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary" type="submit" value="1" name="accept">
                            Join {{ $member->office->acronym }}
                        </button>

                        <button class="btn" type="submit" value="0" name="accept">Decline</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@stop
