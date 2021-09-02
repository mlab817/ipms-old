@foreach($users as $user)
    <li role="option" data-autocomplete-value="{{ $user->username }}" class="autocomplete-item">
        <img class="avatar avatar-user" src="{{ $user->user_avatar() }}" width="24" height="24">
        <span>{{ $user->full_name }}</span>
        <span class="text-normal">{{ '@' . $user->username }}</span>
        <span class="float-right">{{ $user->office->acronym }}</span>
    </li>
@endforeach
