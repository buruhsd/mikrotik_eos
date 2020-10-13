<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <!-- widget -->
    <div class="mt-12 flex justify-between">

		<div class="h-40 w-1/3 p-5 flex flex-col justify-between bg-blue-200
			text-blue-700 font-semibold capitalize rounded-lg">

			<div class="flex items-center justify-between">

				<span class="text-2xl">Active User</span>
				<span class="text-xs">18 may 2020</span>
			</div>

			<div class="flex justify-between">

				<div class="flex flex-col">
					<span class="text-xs">total</span>
					<span class="text-2xl">{{count($activeUser)}}</span>
				</div>
			</div>
		</div>

		<div class="h-40 w-1/3 ml-8 p-5 flex flex-col justify-between bg-pink-200
			text-red-700 font-semibold capitalize rounded-lg">

			<div class="flex items-center justify-between">

				<span class="text-2xl">All User</span>
				<span class="text-xs">18 may 2020</span></div>

			<div class="flex justify-between">

				<div class="flex flex-col"><span class="text-xs">total</span>
					<span class="text-2xl">{{count($listUser)}}</span>
				</div>
			</div>
		</div>

		<div class="h-40 w-1/3 ml-8 p-5 flex flex-col justify-between bg-green-200
			text-green-700 font-semibold capitalize rounded-lg">

			<div class="flex items-center justify-between">

				<span class="text-2xl">CPU Load</span>
				<span class="text-xs">18 may 2020</span>
			</div>

			<div class="flex justify-between">

				<div class="flex flex-col"><span class="text-xs">total</span>
					<span class="text-2xl">{{$cpuLoad[0]['cpu-load']}}</span>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
	  <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
	    <h3 class="text-lg leading-6 font-medium text-gray-900">
	      Device Information
	    </h3>
	    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
	      Device details.
	    </p>
	  </div>
	  <div>
	    <dl>
	      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
	        <dt class="text-sm leading-5 font-medium text-gray-500">
	          Device Name
	        </dt>
	        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
	          {{$device->device_name}}
	        </dd>
	      </div>
	      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
	        <dt class="text-sm leading-5 font-medium text-gray-500">
	          Device Ip
	        </dt>
	        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
	          {{$device->device_ip}}
	        </dd>
	      </div>
	      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
	        <dt class="text-sm leading-5 font-medium text-gray-500">
	          Device Username
	        </dt>
	        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
	          {{$device->device_username}}
	        </dd>
	      </div>
	      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
	        <dt class="text-sm leading-5 font-medium text-gray-500">
	          Device Password
	        </dt>
	        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
	          *******
	        </dd>
	      </div>
	      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
	        <dt class="text-sm leading-5 font-medium text-gray-500">
	          Device Port
	        </dt>
	        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
	          {{$device->device_port_api}}
	        </dd>
	      </div>
	      
	    </dl>
	  </div>
	</div>
    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add New User</button>

    
	<div class="flex flex-col">
	  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
	    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	        <table class="min-w-full divide-y divide-gray-200">
	          <thead>
	          	<tr>
	          		<th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">List Active User</th>
	          	</tr>
	            <tr>
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Name
	              </th>
	              
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Status
	              </th>
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Action
	              </th>
	              
	            </tr>
	          </thead>
	          <tbody class="bg-white divide-y divide-gray-200">
	          	@foreach($activeUser as $user)
	            <tr onclick="window.location='dashboard/device/detail/{{$device->id}}';" style="cursor: pointer;">
	              <td class="px-6 py-4 whitespace-no-wrap">
	                <div class="flex items-center">
	                  <div class="flex-shrink-0 h-10 w-10">
	                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
	                  </div>
	                  <div class="ml-4">
	                    <div class="text-sm leading-5 font-medium text-gray-900">
	                      {{$user['name']}}
	                    </div>
	                    
	                  </div>
	                </div>
	              </td>
	              
	              <td class="px-6 py-4 whitespace-no-wrap">
	                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
	                  Active
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



	<div class="flex flex-col">
	  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
	    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	        <table class="min-w-full divide-y divide-gray-200">
	          <thead>
	          	<tr>
	          		<th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">List User</th>
	          	</tr>
	            <tr>
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Name
	              </th>
	              
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Status
	              </th>
	              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
	                Action
	              </th>
	              
	            </tr>
	          </thead>
	          <tbody class="bg-white divide-y divide-gray-200">
	          	@foreach($listUser as $user)
	            <tr onclick="window.location='dashboard/device/detail/{{$device->id}}';" style="cursor: pointer;">
	              <td class="px-6 py-4 whitespace-no-wrap">
	                <div class="flex items-center">
	                  <div class="flex-shrink-0 h-10 w-10">
	                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
	                  </div>
	                  <div class="ml-4">
	                    <div class="text-sm leading-5 font-medium text-gray-900">
	                      {{$user['name']}}
	                    </div>
	                    
	                  </div>
	                </div>
	              </td>
	              
	              <td class="px-6 py-4 whitespace-no-wrap">
	                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
	                  Active
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



