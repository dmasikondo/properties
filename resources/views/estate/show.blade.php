<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property Listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($estate->visibility =='private')
            <div class="bg-red-200 overflow-hidden shadow-xl sm:rounded-lg p-2 mb-2">
                Your Property is currently private. Only you can see it!
            </div>
        @endif

        @if($estate->visibility =='public' && $estate->approved == false)
            <div class="bg-blue-200 overflow-hidden shadow-xl sm:rounded-lg p-2 mb-2">
                Your Property has been submitted. Now awaiting admin approval!
            </div>
        @endif        

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <div class="bg-cover bg-center bg-gray-900 h-56 p-4">
                        <div class="flex justify-end">
                        @if($estate->location =='residential')
                            <svg class="h-6 w-6 text-gray-600 fill-current mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M0 16L3 5V1a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4l3 11v5a1 1 0 0 1-1 1v2h-1v-2H2v2H1v-2a1 1 0 0 1-1-1v-5zM19 5h1V1H4v4h1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h2V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1zm0 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V6h-2v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6H3.76L1.04 16h21.92L20.24 6H19zM1 17v4h22v-4H1zM6 4v4h4V4H6zm8 0v4h4V4h-4z"></path>
                            </svg>
                            <p><span class="text-white font-bold">Residential</span></p>
                        @else
                            <svg class="h-6 w-6 text-gray-600 fill-current mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M17.03 21H7.97a4 4 0 0 1-1.3-.22l-1.22 2.44-.9-.44 1.22-2.44a4 4 0 0 1-1.38-1.55L.5 11h7.56a4 4 0 0 1 1.78.42l2.32 1.16a4 4 0 0 0 1.78.42h9.56l-2.9 5.79a4 4 0 0 1-1.37 1.55l1.22 2.44-.9.44-1.22-2.44a4 4 0 0 1-1.3.22zM21 11h2.5a.5.5 0 1 1 0 1h-9.06a4.5 4.5 0 0 1-2-.48l-2.32-1.15A3.5 3.5 0 0 0 8.56 10H.5a.5.5 0 0 1 0-1h8.06c.7 0 1.38.16 2 .48l2.32 1.15a3.5 3.5 0 0 0 1.56.37H20V2a1 1 0 0 0-1.74-.67c.64.97.53 2.29-.32 3.14l-.35.36-3.54-3.54.35-.35a2.5 2.5 0 0 1 3.15-.32A2 2 0 0 1 21 2v9zm-5.48-9.65l2 2a1.5 1.5 0 0 0-2-2zm-10.23 17A3 3 0 0 0 7.97 20h9.06a3 3 0 0 0 2.68-1.66L21.88 14h-7.94a5 5 0 0 1-2.23-.53L9.4 12.32A3 3 0 0 0 8.06 12H2.12l3.17 6.34z"></path>
                            </svg>  
                            <p><span class="text-white font-bold">Commercial</span></p>                      
                        @endif
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                            {{$estate->city}} • {{$estate->area}}m <sup>2</sup>

                        </p>
                        <p class="text-3xl text-gray-900">${{$estate->price}}</p>
                        <p class="text-gray-700">{{$estate->address1}}, {{$estate->address2}}, {{$estate->country}}</p>
                    </div>
                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                        {!! nl2br($estate->description) !!}
                    </div>
                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                        <div class="flex-1 inline-flex items-center">

                            <p><span class="text-gray-900 font-bold">Created </span> {{$estate->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="flex-1 inline-flex items-center">
                            <p><span class="text-gray-900 font-bold">Last Updated </span> {{$estate->updated_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                        <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">Realtor</div>
                        <div class="flex items-center pt-2">
                            <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url(https://via.placeholder.com/50x50)">
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{$estate->user->name}}</p>
                                <p class="text-sm text-gray-700">{{$estate->user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <form action="/estates/{{$estate->slug}}/visibility" method="post">
                        @csrf
                        @method('patch')
                        <div class="mt-4">
                            <x-jet-label for="location" value="{{ __('Visibility') }}" />
                            <select  class="mt-1 block w-full @error('visibility') border-red-700 rounded border-2 @enderror" name="visibility"}}>
                                <option value="">Select Property Visibility</option>
                                <option value="private">private</option>
                                <option value="public">public</option>
                                <option value="unlisted">unlisted</option>
                            </select>
                            <x-jet-input-error for="location" class="mt-2" />
                        </div> 
                      <!-- submisssion -->
                        <div class="col-span-6 sm:col-span-4 my-4">
                            <button class="p-2 bg-gray-800 w-100 rounded shadow text-white hover:bg-gray-600" type="submit">Change Visibility</button>          
                          </div>        
                    </form>
                    
                </div>               
                
        </div>
    </div>
</x-app-layout>