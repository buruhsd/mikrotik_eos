<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Device;

use \RouterOS\Config;
use \RouterOS\Client;
use \RouterOS\Query;

class Index extends Component
{
	public $device, $profileList, $name, $max_upload, $max_download, $shared_users;
	public $isOpen = 'false';
	private $listProfileQuery;

    public function render()
    {
    	// var_dump($this->device->device_ip); die();
    	$this->getProfile();
        return view('livewire.profile.index');
    }

    public function mount($device)
	{
		$this->device = Device::findOrFail($device->id);
		// var_dump($this->device); die();
	}


	public function getProfile(){
		$this->listProfileQuery = new Query('/ip/hotspot/user/profile/print');
		$this->connectMikrotik();
		$this->profileList = $this->client->query($this->listProfileQuery)->read();

		// dd($this->profileList);

	}

	public function connectMikrotik(){
    	$this->config = new Config([
		    'host' => $this->device->device_ip,
		    'user' => $this->device->device_username,
		    'pass' => $this->device->device_password,
		    'port' => $this->device->device_port_api,
		]);
		$this->client = new Client($this->config);
    }

    public function openModal()
    {
        $this->isOpen = 'true';
    }

    public function closeModal()
    {
        $this->isOpen = 'false';
    }

    public function createProfile(){
    	$this->openModal();
    }

    public function storeProfile(){
    	$rate_limit = $this->max_upload .'/'.$this->max_download;
    	$query =( new Query('/ip/hotspot/user/profile/add'))
				->equal('name', $this->name)
				->equal('rate-limit', $rate_limit)
				->equal('shared-users', $this->shared_users);
		$this->connectMikrotik();
		$response = $this->client->query($query)->read();

		$this->closeModal();

    }
}
