<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $settingId;

    public $key;

    public $value;

    public $description;

    public $isEditing = false;

    protected $rules = [
        'key' => 'required',
        'value' => 'required',
    ];

    public function newSetting()
    {
        $this->isEditing = true;
        $this->key = null;
        $this->value = null;
    }

    public function editSetting(Setting $setting)
    {
        $this->isEditing = true;

        $this->settingId = $setting->id;
        $this->key = $setting->key;
        $this->value = $setting->value;
    }

    public function saveSetting()
    {
        $this->validate();

        $key = strtoupper(preg_replace('/[^A-Za-z0-9. -]/', '_', $this->key));

        if ($this->settingId) {
            $setting = Setting::find($this->settingId);

            $setting->update([
                'key' => $key,
                'value' => $this->value,
                'description' => $this->description,
                'user_id' => auth()->id()
            ]);
        } else {
            $setting = Setting::create([
                'key' => $key,
                'value' => $this->value,
                'description' => $this->description,
                'user_id' => auth()->id()
            ]);
        }

        $this->isEditing = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.settings', [
            'settings' => Setting::all(),
        ]);
    }
}
