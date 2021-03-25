<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="mb-5">
            <form action="{{ route('projects.index') }}" method="GET">
                <div class="flex flex-row justify-between">
                    <div class="w-50">
                        <select class="rounded outline-none" name="per_page" id="per_page">
                            <option value="" @if(!$per_page) {{ 'selected' }} @endif>Entries</option>
                            <option value="10" @if($per_page == 10) {{ 'selected' }} @endif>10</option>
                            <option value="15" @if($per_page == 15) {{ 'selected' }} @endif>15</option>
                            <option value="25" @if($per_page == 25) {{ 'selected' }} @endif>25</option>
                            <option value="50" @if($per_page == 50) {{ 'selected' }} @endif>50</option>
                        </select>
                        per page
                    </div>

                    <div class="w-50">
                        <input class="rounded outline-none" type="text" placeholder="Type and press Enter to search" name="q" value="{{ old('q', request()->query('q')) }}">
                    </div>
                </div>
            </form>
        </div>

        <div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        PIPOL Code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        PAP Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Added by
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($projects as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 text-xs leading-tight">{{ $item->code }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $item->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($item->pap_type_id == 1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{ $item->pap_type->name ?? '' }}
                            </span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                              {{ $item->pap_type->name ?? '' }}
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            <div class="text-xs">
                                {{ $item->creator->name ?? '' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> |
                            <form action="{{ route('projects.destroy', ['project' => $item->slug]) }}" method="POST" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium" colspan="5">
                            No project found @if($q) {!! 'for <span class="font-extrabold">"' . $q . '"</span>' !!} @endif
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="py-3">
        {{ $projects->links() }}
    </div>

    @push('scripts')
        <script type="text/javascript">
            // on select
            var select = document.getElementById('per_page')
            select.addEventListener('change', function() {
                this.form.submit()
            })

            // this function confirms deletion of project
            function confirmDelete(event) {
                if (!window.confirm('Are you sure you want to delete this PAP?')) {
                    event.preventDefault()
                }
                return true
            }
        </script>
    @endpush
</x-app-layout>
