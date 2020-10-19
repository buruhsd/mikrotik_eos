<?php

namespace App\Http\Livewire\DeviceDetail;

use Livewire\Component;
use App\Models\Device;
use App\Models\Radcheck;
use App\Models\Radreply;
use Livewire\WithPagination;
use \RouterOS\Config;
use \RouterOS\Client;
use \RouterOS\Query;

class Index extends Component
{
	use WithPagination;

	public $device, $activeUser, $cpuLoad, $activeHotspot ,$deviceId, $username, $password;
    public $isOpen = 0;
	private $config, $client, $queryListUser, $queryActiveuser, $queryCpuload, $queryActiveHotspot;



    public function render()
    {

        return view('livewire.device-detail.index', [
        	'device' => $this->device,
        	'listUser' => Radreply::orderBy('id', 'DESC')->paginate(5),
            'countUser' => Radreply::count(),
        	'activeUser' => $this->activeUser,
        	'cpuLoad' => $this->cpuLoad,
            'activeHotspot' => $this->activeHotspot
        ]);
    }

    public function mount($deviceId)
    {
        $this->deviceId = $deviceId;
        $this->device = Device::findOrFail($this->deviceId);

        $this->queryListUser = new Query('/ip/hotspot/user/getall');
        $this->queryActiveuser = new Query('/ip/hotspot/active/getall');
        $this->queryCpuload = new Query('/system/resource/getall');
        $this->queryActiveHotspot = new Query('/ip/hotspot/active/print');
        
        $this->device = $this->device;
        $this->connectMikrotik();
        // $this->listUser = Radreply::orderBy('id', 'DESC')->paginate(5);
        $this->activeUser = $this->client->query($this->queryActiveuser)->read();
        $this->cpuLoad = $this->client->query($this->queryCpuload)->read();
        $this->activeHotspot = $this->client->query($this->queryActiveHotspot)->read();
        // dd($this->client->query($this->queryActiveuser)->read());
        // $this->connectMikrotik();
    }

    private function resetInputFields(){
        $this->username = '';
        $this->password = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
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

    public function create(){
    	$this->openModal();
    }

    public function store(){
        $this->validate([
            'username'   => 'required',
            'password'     => 'required'
        ]);

        $radcheck = Radcheck::create([
            'username' => $this->username,
            'attribute' => 'Cleartext-password',
            'op' => ':=',
            'value' => $this->password
        ]);

        $radcheck = Radcheck::create([
            'username' => $this->username,
            'attribute' => 'NAS-IP-Address',
            'op' => '==',
            'value' => $this->device->device_nas_ip
        ]);

        $radreply = Radreply::create([
            'username' => $this->username,
            'attribute' => 'Mikrotik-Group',
            'op' => ':=',
            'value' => 'tamu'
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');
        $this->resetInputFields();
        $this->closeModal();
    }


}
