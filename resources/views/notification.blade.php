<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
@foreach(Auth::user()->notifications as $note)
    <div class="m-2">
          <a href="/estates/{{$note->data['property']['slug']}}">
         
            {{$note->data['realtor']['name'] }} {{$note->data['message']}} of price  - ${{$note->data['property']['price']}} 
            <small class="text-small">{{$note->created_at->diffForHumans()}}</small>            
        </a>   
    </div>
@endforeach 
    @foreach(Auth::user()->unreadNotifications as $notification)
        {{ $notification->markAsRead()}}
    @endforeach
             
            
            </div>
        </div>
    </div>
</x-app-layout>

