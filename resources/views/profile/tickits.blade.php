
@extends('dashboard_orginased')


@section('content')
    <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
  
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase dark:text-gray-400">
                        User
                    </th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase dark:text-gray-400">
                        Event Title
                    </th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase dark:text-gray-400">
                        Status
                    </th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase dark:text-gray-400">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickits as $tickit)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($tickit->user)
                            {{ $tickit->user->name }}
                        @else
                            No user
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($tickit->event)
                            {{ $tickit->event->title }}
                        @else
                            No title
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $tickit->status }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{-- {{dd($tickit->id)}} --}}
                        <form action="{{ route('tickets.accept', ['id' => $tickit->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-blue-500">Accept</button>
                        </form>
                        
                        <form action="{{ route('tickets.refuse', ['id' => $tickit->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-red-500">Refuse</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        
    </table>
</div>

@endsection
