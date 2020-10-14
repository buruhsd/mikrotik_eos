<?php

namespace App\Http\Livewire\Device;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;
use \RouterOS\Config;
use \RouterOS\Client;
use \RouterOS\Query;

class Index extends Component
{
	use WithPagination;

	public $updateMode = false;
	public $deviceId;
    public $device_name, $device_ip, $device_port_api, $device_username, $device_password, $device_nas_ip,$region_id;
    public $isOpen = 0;
    public $isUserOpen = 0;
    public $usermikrotik = [];
 	public $idUser;

    public function render()
    {
        return view('livewire.device.index', [
            'devices' => Device::latest()->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->deviceId = '';
        $this->device_name = '';
        $this->device_ip = '';
        $this->device_port_api = '';
        $this->device_username = '';
        $this->device_password = '';
        $this->region_id = '';
    }

    public function create()
    {
        $this->openModal();
    }

    public function store()
    {

        $this->validate([
            'device_name'   => 'required',
            'device_ip'		=> 'required',
            'device_port_api' => 'required',
            'device_username' => 'required',
            'device_password' => 'required',
            'device_nas_ip' => 'required',
            'region_id' => 'required'
        ]);
        // var_dump($this->region_name); die();
        $post = Device::create([
            'device_name'   => $this->device_name,
            'device_ip'		=> $this->device_ip,
            'device_port_api' => $this->device_port_api,
            'device_username' => $this->device_username,
            'device_password' => $this->device_password,
            'device_nas_ip' => $this->device_nas_ip,
            'region_id' => $this->region_id
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');
        $this->resetInputFields();
        $this->closeModal();
        //redirect
        // return redirect()->route('dashboard.region.index');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openUserModal()
    {
    	$this->isUserOpen = true;
    }

    public function closeUserModal()
    {
    	$this->isUserOpen = false;
    }

    public function destroy($deviceId)
	{
	  $device = Device::find($deviceId);

	  if($device) {
	     $device->delete();
	  }

	  //flash message
	  session()->flash('message', 'Data Berhasil Dihapus.');

	  //redirect

	}

	public function edit($deviceId)
    {
        $this->updateMode = true;
        $region = Region::where('id',$regionId)->first();
        $this->region_name = $region->region_name;

        $this->openModal();
        
    }

    public function update()
    {
        $this->validate([
            'device_name'   => 'required',
            'device_ip'		=> 'required',
            'device_port_api' => 'required',
            'device_username' => 'required',
            'device_password' => 'required',
            'device_nas_ip' => 'required',
            'region_id' => 'required'
        ]);
        // var_dump($this->regionId); die();
        if($this->deviceId) {

            $device = Region::find($this->deviceId);
            // var_dump($region); die();
            if($device) {
                $device->update([
                    'device_name'   => $this->device_name,
		            'device_ip'		=> $this->device_ip,
		            'device_port_api' => $this->device_port_api,
		            'device_username' => $this->device_username,
		            'device_password' => $this->device_password,
                    'device_nas_ip' => $this->device_nas_ip,
		            'region_id' => $this->region_id
                ]);

                $device->save();
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');
        $this->resetInputFields();
        //redirect
        $this->closeModal();
    }

    public function lihatUser($deviceId)
    {
    	$device = Device::find($deviceId);

    	$config = new Config([
		    'host' => $device->device_ip,
		    'user' => $device->device_username,
		    'pass' => $device->device_password,
		    'port' => $device->device_port_api,
		]);
		$client = new Client($config);

		// var_dump($client);
		$query = new Query('/ip/hotspot/user/getall'); //lst user

		// Send query and read response from RouterOS
		$response = $client->query($query)->read();
		$this->usermikrotik = $response;
		// dd($response);

    	$this->openUserModal();
    }

    public function destroyUserMikrotik($idUser){
    	$config = new Config([
		    'host' => '103.247.123.70',
		    'user' => 'developer',
		    'pass' => '*123#password',
		    'port' => 8728,
		]);
		$client = new Client($config);

		$client->connect();

		$query =( new Query('/ip/hotspot/user/remove'))
				->equal('.id', '*A');

		$response = $client->query($query)->readAsIterator();

		$this->closeUserModal();
    }
}
