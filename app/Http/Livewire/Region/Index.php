<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

	public $updateMode = false;
	public $regionId;
    public $region_name;
    public $isOpen = 0;

    public function render()
    {
        return view('livewire.region.index', [
            'regions' => Region::latest()->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->regionId = '';
        $this->region_name = '';
    }

    public function create()
    {
        // $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {

        $this->validate([
            'region_name'   => 'required',
        ]);
        // var_dump($this->region_name); die();
        $post = Region::create([
            'region_name'     => $this->region_name,
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

    public function destroy($regionId)
	{
	  $region = Region::find($regionId);

	  if($region) {
	     $region->delete();
	  }

	  //flash message
	  session()->flash('message', 'Data Berhasil Dihapus.');

	  //redirect

	}

	public function edit($regionId)
    {
        $this->updateMode = true;
        $region = Region::where('id',$regionId)->first();
        $this->region_name = $region->region_name;

        $this->openModal();
        
    }

    public function update()
    {
        $this->validate([
            'region_name'   => 'required',
        ]);
        // var_dump($this->regionId); die();
        if($this->regionId) {

            $region = Region::find($this->regionId);
            // var_dump($region); die();
            if($region) {
                $region->update([
                    'region_name'     => $this->region_name,
                ]);

                $region->save();
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');
        $this->resetInputFields();
        //redirect
        $this->closeModal();
    }
}
