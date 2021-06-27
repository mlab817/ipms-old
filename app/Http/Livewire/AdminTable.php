<?php

namespace App\Http\Livewire;

use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\InfrastructureSubsector;
use App\Models\Office;
use App\Models\OperatingUnit;
use App\Models\OperatingUnitType;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Prerequisite;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminTable extends Component
{
    protected $queryString = ['label','q','sort'];

    public $labelId;

    public $name;

    public $description;

    public $labelType;

    public $label = CipType::class;

    public $q;

    public $sort;

    public $showForm = false;

    public $flash;

    public $labelToEdit = [
        'labelId' => null,
        'name' => null,
        'description' => null,
    ];

    public $labelTypes = [
        'approval_levels'               => ApprovalLevel::class,
        'bases'                         => Basis::class,
        'cip_types'                     => CipType::class,
        'covid_interventions'           => CovidIntervention::class,
        'fs_statuses'                   => FsStatus::class,
        'funding_institutions'          => FundingInstitution::class,
        'funding_sources'               => FundingSource::class,
        'gads'                          => Gad::class,
        'implementation_modes'          => ImplementationMode::class,
        'infrastructure_sector'         => InfrastructureSector::class,
        'infrastructure_subsectors'     => InfrastructureSubsector::class,
//        'offices'                       => Office::class,
//        'operating_units'               => OperatingUnit::class,
        'operating_unit_types'          => OperatingUnitType::class,
        'pap_types'                     => PapType::class,
        'pdp_chapters'                  => PdpChapter::class,
        'pip_typologies'                => PipTypology::class,
        'preparation_documents'         => PreparationDocument::class,
        'prerequisites'                 => Prerequisite::class,
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description'   => 'nullable|string|max:255',
            'labelType' => ['required', Rule::in($this->labelTypes->keys())],
        ];
    }

    public function create()
    {
        $this->showForm = true;

        $this->labelId      = null;
        $this->name         = null;
        $this->description  = null;
        $this->labelType    = $this->label;
    }

    public function edit($label)
    {
        $this->showForm     = true;

        $this->labelId      = $label['id'];
        $this->name         = $label['name'];
        $this->description  = $label['description'];
        $this->labelType    = $this->label;
    }

    public function submit()
    {
        $this->labelTypes[$this->labelType]::updateOrCreate([
            'id' => $this->labelId
        ],
        [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->showForm = false;
    }

    public function delete($labelId)
    {
        $label = $this->labelTypes[$this->label]::find($labelId);

        $label->delete();
    }

    public function render()
    {
        return view('livewire.admin-table', [
            'labelTypes' => $this->labelTypes,
            'labels'     => empty($this->q)
                ? $this->labelTypes[$this->label]::all()
                : $this->labelTypes[$this->label]::where('name','like', '%'. $this->q . '%')
                    ->orWhere('description','like', '%'. $this->q . '%')
                    ->get(),
        ]);
    }
}
