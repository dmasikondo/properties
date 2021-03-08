<div>
	<form action="estates/{{$estate->slug}}/visibility" method="post">
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