@extends('layouts.office')

@section('content')
    <div class="Box">
        <div class="Box-header">
            <span class="lh-condensed">
                Users
            </span>
        </div>
        @foreach($office->users as $user)
        <div class="Box-row d-flex flex-items-center">
            <img class="avatar mr-2" alt="{{ '@' . $user->username }}" src="{{ $user->user_avatar() }}" width="48" height="48" />
            <div class="flex-auto">
                <strong>{{ $user->full_name }}</strong>
                <div class="text-small color-text-tertiary">
                    {{ '@' . $user->username }}
                </div>
                <div class="text-small color-text-tertiary">
                    Member since {{ $user->created_at->format('M d, Y') }}
                </div>
            </div>
            <details class="details-reset details-overlay dropdown float-right">
                <summary role="button" class="select-menu-button btn-sm btn" aria-haspopup="menu">
                    <svg aria-label="Member settings" role="img" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-gear">
                        <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </summary>
                <details-menu class="dropdown-menu dropdown-menu-no-overflow dropdown-menu-sw" role="menu">
                    <a href="{{ route('users.show', $user) }}" class="dropdown-item" role="menuitem">
                        View
                    </a>
                    <details class="details-reset details-overlay details-overlay-dark lh-default color-text-primary width-full">
                        <summary class="dropdown-item" role="menuitem">
                            Remove
                        </summary>
                        <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast " role="dialog" aria-modal="true">
                            <div class="Box-header">
                                <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x">
                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                    </svg>
                                </button>
                                <h3 class="Box-title ">Remove {{ $user->username }} from your office</h3>
                            </div>

                            <div class="Box-body">
                                <p>
                                    Removing members from your office will remove their access from your PAPs. They will no longer be able to edit them.
                                </p>
                                <p>
                                    If you just need a user to be able to edit selected PAPs, you may use the Invite a Collaborator function in the PAPs settings tab.
                                </p>
                            </div>
                            <div class="Box-footer">
                                <form action="/orgs/da-pms/people/convert_to_outside_collaborators" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="xcxHG9YX4SaSQM5o8dGiaH5hMYFrzFV6OPhwV+ec2f+J/fzg7FAYEfLu9NjPJqMbVCtXpKNfHZ/eAgCsfQPRAg==">
                                    <input type="hidden" name="member_ids" value="29625844">
                                    <button type="submit" class="btn-danger btn input-block">
                                        I know what I am doing, remove this user
                                    </button>
                                </form>
                            </div>


                        </details-dialog>
                    </details>
                </details-menu>
            </details>
        </div>
        @endforeach
    </div>
@stop
