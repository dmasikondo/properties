<div class="w-8/12 mx-auto">
 <!--Location -->
    <div class="mt-4">
        <x-jet-label for="location" value="{{ __('Select Property Location') }}" />
        <select  class="mt-1 block w-full @error('location') border-red-700 rounded border-2 @enderror" wire:model.defer="location">
        	<option value="">Select Location</option>
        	<option value="commercial">Commercial</option>
        	<option value="residential">Residential</option>
        </select>
        <x-jet-input-error for="location" class="mt-2" />
    </div>	

<!-- Address line1 -->
    <div class="mt-4">
        <x-jet-label for="address1" value="{{ __('Street Address 1') }}" />
        <input id="address1" type="text" class="mt-1 block w-full  @error('address1') border-red-700 rounded border-2 @enderror" wire:model.defer="address1"/>
        <x-jet-input-error for="address1" class="mt-2" />
    </div> 		 

<!-- Address line2 -->
    <div class="mt-4">
        <x-jet-label for="address2" value="{{ __('Street Address 2') }}" />
        <input id="address2" type="text" class="mt-1 block w-full  @error('address2') border-red-700 rounded border-2 @enderror" wire:model.defer="address2"/>
        <x-jet-input-error for="address2" class="mt-2" />
    </div> 

<!-- City -->
    <div class="mt-4">
        <x-jet-label for="city" value="{{ __('City') }}" />
        <input id="city" type="text" class="mt-1 block w-full  @error('city') border-red-700 rounded border-2 @enderror" wire:model.defer="city"/>
        <x-jet-input-error for="city" class="mt-2" />
    </div> 		
<!-- Price -->
    <div class="mt-4">
        <x-jet-label for="price" value="{{ __('Price') }}" />
        <input id="price" type="number" class="mt-1 block w-full  @error('price') border-red-700 rounded border-2 @enderror" wire:model.defer="price"/>
        <x-jet-input-error for="price" class="mt-2" />
    </div> 		

<!-- Area -->
    <div class="mt-4">
        <x-jet-label for="area" value="{{ __('Property Area in square m') }}" />
        <input id="area" type="number" class="mt-1 block w-full  @error('area') border-red-700 rounded border-2 @enderror" wire:model.defer="area"/>
        <x-jet-input-error for="area" class="mt-2" />
    </div> 	

<!-- Description -->
    <div class="mt-4">
        <x-jet-label for="description" value="{{ __('Description') }}" />
        <textarea id="description"  class="mt-1 block w-full  @error('description') border-red-700 rounded border-2 @enderror" wire:model.defer="description"/></textarea>
        <x-jet-input-error for="description" class="mt-2" />
    </div> 


  <!-- submisssion -->
        <div class="col-span-6 sm:col-span-4 my-4">
		    <button class="p-2 bg-gray-800 w-20 rounded shadow text-white hover:bg-gray-600" wire:click="addProperty" wire:loading.attr="disabled">Add</button>
            
          </div>        	                        		               
	
</div>



                               