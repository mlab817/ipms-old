@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\ApprovalLevel::count() }}</h3>

                            <p>Approval Levels</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.approval_levels.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Basis::count() }}</h3>

                            <p>Bases for Implementation</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.bases.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\CipType::count() }}</h3>

                            <p>Types of CIP</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.cip_types.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\FsStatus::count() }}</h3>

                            <p>Status of FS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.fs_statuses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\FundingInstitution::count() }}</h3>

                            <p>Funding Institutions</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.funding_institutions.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\FundingSource::count() }}</h3>

                            <p>Funding Sources</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.funding_sources.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Gad::count() }}</h3>

                            <p>GAD Classification</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.gads.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\ImplementationMode::count() }}</h3>

                            <p>Modes of Implementation</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.implementation_modes.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\InfrastructureSector::count() }}</h3>

                            <p>Infrastructure Sectors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.infrastructure_sectors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\InfrastructureSubsector::count() }}</h3>

                            <p>Infrastructure Subsectors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.infrastructure_subsectors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Office::count() }}</h3>

                            <p>Offices</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.offices.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\OperatingUnit::count() }}</h3>

                            <p>Operating Units</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.operating_units.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\OperatingUnitType::count() }}</h3>

                            <p>Operating Unit Types</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.operating_unit_types.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\PapType::count() }}</h3>

                            <p>PAP Types</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.pap_types.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\PdpChapter::count() }}</h3>

                            <p>PDP Chapters</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.pdp_chapters.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\PdpIndicator::count() }}</h3>

                            <p>PDP RM Indicators</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.pdp_indicators.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\PipTypology::count() }}</h3>

                            <p>PIP Typologies</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.pip_typologies.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\PreparationDocument::count() }}</h3>

                            <p>Preparation Documents</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.preparation_documents.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\ProjectStatus::count() }}</h3>

                            <p>Project Statuses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.project_statuses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\ReadinessLevel::count() }}</h3>

                            <p>Readiness Levels</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.readiness_levels.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Region::count() }}</h3>

                            <p>Regions</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.regions.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Sdg::count() }}</h3>

                            <p>Sustainable Development Goals</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.sdgs.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\TenPointAgenda::count() }}</h3>

                            <p>Ten Point Agenda</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.ten_point_agendas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Tier::count() }}</h3>

                            <p>Budget Tier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="{{ route('admin.tiers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
