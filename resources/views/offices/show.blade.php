@extends('layouts.office')

@section('content')
    <div class="container-lg p-responsive clearfix mb-5">
        <!-- Left side -->

        <!--./ Left side -->

        <!-- Right side -->
        <div class="col-12 col-md-4 pl-md-4 float-right">

            <div class="Box mb-3">
                <div class="Box-body">
                    <span class="d-block color-text-primary">
                        <span class="float-right f5 color-text-secondary">
                            <span class="Label">{{ $office->users->count() }}</span>
                        </span>
                        <h4 class="f4 text-normal mb-3">Users</h4>
                    </span>
                    <div class="clearfix d-flex flex-wrap" style="margin: -1px">
                        @foreach($office->users as $user)
                            <a class="member-avatar"
                               href="{{ route('users.show', $user) }}">
                                <span class="tooltipped tooltipped-nw" aria-label="{{ $user->full_name }}">
                                    <img class="avatar avatar-user" src="{{ $user->user_avatar() }}" width="48" height="48" alt="{{ '@' . $user->username }}">
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--./ Right side -->

    </div>
@stop
