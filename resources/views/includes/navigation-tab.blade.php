@php
    $route = Route::currentRouteName();
@endphp
<!-- Top Navigation -->
<div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
    <div class="UnderlineNav width-full box-shadow-none">
        <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
            <a class="UnderlineNav-item @if($route == 'dashboard') selected @endif }}" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="959844c3a75fd2f13efac672e162b683628209284258b3ceba6c3803ab4b3521" href="{{ route('dashboard') }}">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-book UnderlineNav-octicon hide-sm">
                    <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                </svg>
                Overview
            </a>
            <a class="UnderlineNav-item @if($route == 'projects.index') selected @endif }}" href="{{ route('projects.index') }}">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                </svg>
                Projects
                <span title="1" data-view-component="true" class="Counter">
                    {{ \App\Models\Project::count() }}
                </span>
            </a>
            <a class="UnderlineNav-item @if($route == 'reviews.index') selected @endif }}" href="{{ route('reviews.index') }}">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-package UnderlineNav-octicon hide-sm">
                    <path fill-rule="evenodd" d="M8.878.392a1.75 1.75 0 00-1.756 0l-5.25 3.045A1.75 1.75 0 001 4.951v6.098c0 .624.332 1.2.872 1.514l5.25 3.045a1.75 1.75 0 001.756 0l5.25-3.045c.54-.313.872-.89.872-1.514V4.951c0-.624-.332-1.2-.872-1.514L8.878.392zM7.875 1.69a.25.25 0 01.25 0l4.63 2.685L8 7.133 3.245 4.375l4.63-2.685zM2.5 5.677v5.372c0 .09.047.171.125.216l4.625 2.683V8.432L2.5 5.677zm6.25 8.271l4.625-2.683a.25.25 0 00.125-.216V5.677L8.75 8.432v5.516z"></path>
                </svg>
                Reviews
            </a>
            <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="e833faa90508c3f719d379c705750a41656063ef985fff9f575786be012f2fe9" href="/mlab817?tab=packages">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-package UnderlineNav-octicon hide-sm"><path fill-rule="evenodd" d="M2.75 2.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25H2.75zM1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0113.25 12H9.06l-2.573 2.573A1.457 1.457 0 014 13.543V12H2.75A1.75 1.75 0 011 10.25v-7.5z"/></svg>
                Issues
            </a>
        </nav>

    </div>
</div>
<!-- ./ Tab Navigation -->
