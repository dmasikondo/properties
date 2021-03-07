<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">
            Users
        </h1>
        <x-session-message></x-session-message>       
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Roles</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th></th>
                </tr>
            @foreach($users as $user)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">
                        {{$user->name}}
                        @if($user == Auth::user())
                            (Me)
                        @endif
                    </td>
                    <td class="p-3 px-5">{{$user->email}}</td>
                    <td class="p-3 px-5">
                        @if($user->roles->count() >0)
                            @foreach($user->roles as $role)
                                {{$role->name}}
                            @endforeach
                        @else
                            None
                        @endif
                    </td>
                    <td class="p-3 px-5">
                <form action="/users/{{$user->slug}}/add-role" method="post">
                    @csrf
                    @method('patch')

                        <select name="name" class="bg-transparent">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                </form>
                <form action="/users/{{$user->slug}}/delete" method="post">
                    @csrf
                    @method('delete')                    

                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
</x-app-layout>