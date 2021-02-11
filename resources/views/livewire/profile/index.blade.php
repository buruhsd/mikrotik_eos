<div>
	@if($isOpen == "true")
        @include('livewire.profile.create')
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
	<button wire:click="createProfile()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add New Profile</button>
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
          	<tr>
          		<th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">List Profile</th>
          	</tr>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                idle-timeout
              </th>
              
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                shared-users
              </th>
             
              
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
              
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          	@foreach($profileList as $key => $profile)
            <tr onclick="window.location='dashboard/device/detail/{{$device->id}}';" style="cursor: pointer;">
              <td class="px-6 py-4 whitespace-no-wrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">
                      {{++$key}}
                    </div>
                    
                  </div>
                </div>
              </td>
              
              <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$profile['name']}}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$profile['idle-timeout']}}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$profile['shared-users']}}
                </span>
              </td>
              
              
              
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
              	<button type="button" class="btn btn-primary" data-toggle="modal" wire:click="lihatUser({{ $device->id }})" data-target="#exampleModalCenter">
				Lihat
				</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" wire:click="edit({{ $device->id }})" data-target="#exampleModalCenter">
				Edit
				</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" wire:click="destroy({{ $device->id }})" data-target="#exampleModalCenter">
				Delete
				</button>

              </td>
            </tr>
            @endforeach
            <!-- More rows... -->
          </tbody>
        </table>
        
      </div>
      <!-- paging-->
      <div class="mt-2">
      </div>
      
    </div>
  </div>
</div>
</div>