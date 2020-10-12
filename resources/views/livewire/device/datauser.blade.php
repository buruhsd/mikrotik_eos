<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <table class="min-w-full divide-y divide-gray-200">
        <thead>
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
          @foreach($usermikrotik as $user)
          <tr>
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
              
            <button type="button" class="btn btn-primary" data-toggle="modal" wire:click="destroyUserMikrotik" data-target="#exampleModalCenter">
            Delete
            </button>

            </td>
          </tr>
          @endforeach
          <!-- More rows... -->
        </tbody>
      </table>
      
    </div>
  </div>
</div>