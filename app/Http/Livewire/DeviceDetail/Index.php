<?php

namespace App\Http\Livewire\DeviceDetail;

use Livewire\Component;
use App\Models\Device;
use Livewire\WithPagination;
use \RouterOS\Config;
use \RouterOS\Client;
use \RouterOS\Query;

class Index extends Component
{
	use WithPagination;

	public $device, $deviceId;
	private $config, $client, $queryListUser, $queryActiveuser, $queryCpuload;



    public function render()
    {

        return view('livewire.device-detail.index', [
        	'device' => $this->device,
        	'listUser' => $this->client->query($this->queryListUser)->read(),
        	'activeUser' => $this->client->query($this->queryActiveuser)->read(),
        	'cpuLoad' => $this->client->query($this->queryCpuload)->read(),
        ]);
    }

    public function mount($deviceId)
    {
        $this->deviceId = $deviceId;
        $this->device = Device::findOrFail($this->deviceId);

        $this->queryListUser = new Query('/ip/hotspot/user/getall');
        $this->queryActiveuser = new Query('/ip/hotspot/active/getall');
        $this->queryCpuload = new Query('/system/resource/getall');
        $this->connectMikrotik();
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


}
