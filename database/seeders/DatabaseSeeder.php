<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApprovalLevelsTableSeeder::class);
        $this->call(BasesTableSeeder::class);
        $this->call(CipTypesTableSeeder::class);
        $this->call(FsStatusesTableSeeder::class);
        $this->call(FundingInstitutionsTableSeeder::class);
        $this->call(FundingSourcesTableSeeder::class);
        $this->call(GadsTableSeeder::class);
        $this->call(ImplementationModesTableSeeder::class);
        $this->call(InfrastructureSectorsTableSeeder::class);
        $this->call(OperatingUnitTypesTableSeeder::class);
        $this->call(OperatingUnitsTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(PapTypesTableSeeder::class);
        $this->call(PdpChaptersTableSeeder::class);
        // $this->call(PdpIndicatorsTableSeeder::class);
        $this->call(PipTypologiesTableSeeder::class);
        $this->call(PreparationDocumentsTableSeeder::class);
        $this->call(PrerequisitesTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
        $this->call(ReadinessLevelsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(SdgsTableSeeder::class);
        $this->call(SpatialCoveragesTableSeeder::class);
        $this->call(TenPointAgendasTableSeeder::class);
        $this->call(TiersTableSeeder::class);
        $this->call(RolesAndPermissionsTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
    }
}
