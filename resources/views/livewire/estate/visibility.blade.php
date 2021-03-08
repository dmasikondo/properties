<div>

    <div class="mt-4">
        <x-jet-label for="location" value="{{ __('Visibility') }}" />
        <select  class="mt-1 block w-full @error('visibility') border-red-700 rounded border-2 @enderror" wire:model.defer="visibility"}}>
            <option value="">Select Property Visibility</option>
            <option value="private">private</option>
            <option value="public">public</option>
            <option value="unlisted">unlisted</option>
        </select>
        <x-jet-input-error for="location" class="mt-2" />
    </div> 

  <!-- submisssion -->
    <div class="col-span-6 sm:col-span-4 my-4">
	    <button class="p-2 bg-gray-800 w-100 rounded shadow text-white hover:bg-gray-600" wire:click="changePropertyVisibility" wire:loading.attr="disabled">Change Visibility</button>
        
      </div>     

</div>
