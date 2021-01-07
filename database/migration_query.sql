USE for_transfer;

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

TRUNCATE tdd.projects;
INSERT INTO tdd.projects
SELECT
id,
uuid,
pipol_code as code,
title,
slug,
type_id as pap_type_id,
regular as regular_program,
description,
expected_outputs,
spatial_coverage_id,
iccable,
pip,
research,
cip,
cip_type_id,
trip,
rdip,
rdc_required as rdc_endorsement_required,
rdc_endorsed,
rdc_endorsed_date,
null as other_infrastructure,
implementation_risk as risk,
pdp_chapter_id,
false as no_pdp_indicator,
gad_id,
target_start_year,
target_end_year,
has_fs,
has_row,
has_rap,
employment_generated,
main_funding_source_id as funding_source_id,
implementation_mode_id,
null as other_fs,
project_status_id,
updates,
updates_date,
uacs_code,
tier_id,
created_by,
updated_by,
deleted_by,
created_at,
updated_at,
deleted_at,
typology_id as pip_typology_id,
null as approval_level_id,
null as approval_date,
project_preparation_document_id as preparation_document_id,
null as preparation_document_others,
technical_readiness_id as readiness_level_id
FROM for_transfer.projects;

TRUNCATE tdd.allocations;
INSERT INTO tdd.allocations
SELECT 
null AS id,
null as uuid,
id AS project_id,
gaa_2016 AS y2016,
gaa_2017 AS y2017,
gaa_2018 AS y2018,
gaa_2019 AS y2019,
gaa_2020 AS y2020,
gaa_2021 AS y2021,
gaa_2022 AS y2022,
gaa_2023 AS y2023,
gaa_2024 AS y2024,
gaa_2025 AS y2025,
created_at,
updated_at
FROM for_transfer.projects;

TRUNCATE tdd.disbursements;
INSERT INTO tdd.disbursements
SELECT 
null AS id,
null as uuid,
id AS project_id,
disbursement_2016 AS y2016,
disbursement_2017 AS y2017,
disbursement_2018 AS y2018,
disbursement_2019 AS y2019,
disbursement_2020 AS y2020,
disbursement_2021 AS y2021,
disbursement_2022 AS y2022,
disbursement_2023 AS y2023,
disbursement_2024 AS y2024,
disbursement_2025 AS y2025,
created_at,
updated_at
FROM for_transfer.projects;

TRUNCATE tdd.neps;
INSERT INTO tdd.neps
SELECT 
null AS id,
null as uuid,
id AS project_id,
nep_2016 AS y2016,
nep_2017 AS y2017,
nep_2018 AS y2018,
nep_2019 AS y2019,
nep_2020 AS y2020,
nep_2021 AS y2021,
nep_2022 AS y2022,
nep_2023 AS y2023,
nep_2024 AS y2024,
nep_2025 AS y2025,
created_at,
updated_at
FROM for_transfer.projects;

TRUNCATE tdd.basis_project;
INSERT INTO tdd.basis_project
SELECT 
basis_id AS basis_id,
project_id AS project_id,
created_at,
updated_at
FROM for_transfer.project_basis;

TRUNCATE tdd.project_sdg;
INSERT INTO tdd.project_sdg
SELECT 
sdg_id AS sdg_id,
project_id AS project_id,
created_at,
updated_at
FROM for_transfer.project_sdg;

TRUNCATE tdd.project_region;
INSERT INTO tdd.project_region
SELECT 
region_id AS region_id,
project_id AS project_id,
null AS created_at,
null AS updated_at
FROM for_transfer.project_region;

SET FOREIGN_KEY_CHECKS=1;
COMMIT;