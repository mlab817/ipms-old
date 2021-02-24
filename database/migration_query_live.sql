SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- CREATE LOGIN cp125823_tdd WITH PASSWORD = '0123456@dapipd'; GO;

TRUNCATE cp125823_tdd.projects;
INSERT INTO cp125823_tdd.projects
SELECT
    id,
    LEFT(uuid(),36) as uuid,
    pipol_code as code,
    title,
    ifnull(slug, concat(replace(trim(lower(title)), ' ', '-'),'-',id)),
    type_id as pap_type_id,
    regular as regular_program,
    description,
    null as summary,
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
    null as mitigation_strategy,
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
    technical_readiness_id as readiness_level_id,
    operating_unit_id as office_id
FROM cp125823_ipms.projects
-- WHERE banner_program_id IS NULL and prexc_activity_id IS NULL and deleted_at IS NULL and operating_unit_id NOT IN (12,13);
WHERE id IN (1,2,238,241,240,239,244,243,242,129,141,158,159,155,161,56,214,212,202,120,156,157,59,60,73,151,74,75,78,36,44,237,69,85,38,48,46,168,76,45,81,130,135,52,131,136,127,80,133,134,132,35,98,34,207,29,92,206,30,99,33,88,228,118,119,115,114,116,117,94,101,27,61,86,209,102,204,96,110,185,164,184,55,3,71,140,84,62,68,82,77,203,1503,139,232,236,138,234,32,128,150,152,146,154,153,160,143,144,148,147,1590,142,145,233,176,11,28,31,104,87,89,19,15,13,20,210,22,24,25,21,26,111,112,93,113,53,54,109,97,100,95,103,208,205,211,66,108,50,51,107,106,105,219,235,79,148,149,473,478,481,486,305,794,852,879,866,803,889,491,892,495,778,499,504,247,809,807,897,780,818,898,902,906,908,910,907,1065,974,1271,1268,1261,1259,1258,171,1256,1255,173,1253,1248,195,1247,1246,199,1221,748,201,146,1217,911,1378,1388,1386,1383,1413,379,732,779,707,1060,574,976,848,1107,817,801,70,995,705,811,248,824,1194,306,72,752);

-- recode type
UPDATE cp125823_tdd.projects SET pap_type_id=2 WHERE pap_type_id=1; -- change programs to 1
UPDATE cp125823_tdd.projects SET pap_type_id=1 WHERE pap_type_id=3; -- change programs to 1

TRUNCATE cp125823_tdd.allocations;
INSERT INTO cp125823_tdd.allocations
SELECT
null AS id,
LEFT(uuid(),36) as uuid,
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
FROM cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.disbursements;
INSERT INTO cp125823_tdd.disbursements
SELECT
null AS id,
LEFT(uuid(),36) as uuid,
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
FROM cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.neps;
INSERT INTO cp125823_tdd.neps
SELECT
null AS id,
LEFT(uuid(),36) as uuid,
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
FROM cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.basis_project;
INSERT INTO cp125823_tdd.basis_project
SELECT
basis_id AS basis_id,
project_id AS project_id,
created_at,
updated_at
FROM cp125823_ipms.project_basis
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.project_sdg;
INSERT INTO cp125823_tdd.project_sdg
SELECT
project_id AS project_id,
sdg_id AS sdg_id,
created_at,
updated_at
FROM cp125823_ipms.project_sdg
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.project_region;
INSERT INTO cp125823_tdd.project_region
SELECT
project_id AS project_id,
region_id AS region_id,
null AS created_at,
null AS updated_at
FROM cp125823_ipms.project_region
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

-- needs rework
TRUNCATE cp125823_tdd.infrastructure_subsector_project;
INSERT INTO cp125823_tdd.infrastructure_subsector_project
SELECT
infra_subsector_id as is_id,
project_id as project_id,
created_at,
updated_at
FROM cp125823_ipms.infrastructure_subsector_project
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.funding_source_project;
INSERT INTO cp125823_tdd.funding_source_project
SELECT
funding_source_id,
project_id as project_id,
null as created_at,
null as updated_at
FROM cp125823_ipms.project_funding_source
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

TRUNCATE cp125823_tdd.funding_institution_project;
INSERT INTO cp125823_tdd.funding_institution_project
SELECT
funding_institution_id,
id as project_id,
created_at,
updated_at
FROM cp125823_ipms.projects
WHERE funding_institution_id IS NOT NULL AND id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.feasibility_studies;
insert into cp125823_tdd.feasibility_studies
SELECT
null as id,
LEFT(uuid(),36) as uuid,
id as project_id,
ifnull(fs_status_id, 0) as fs_status_id,
fs_assistance as needs_assistance,
fs_start_date as fs_start_date,
fs_end_date as fs_end_date,
0 as y2016,
ifnull(fs_target_2017, 0) as y2017,
ifnull(fs_target_2018, 0) as y2018,
ifnull(fs_target_2019, 0) as y2019,
ifnull(fs_target_2020, 0) as y2020,
ifnull(fs_target_2021, 0) as y2021,
ifnull(fs_target_2022, 0) as y2022,
ifnull(fs_target_2023, 0) as y2023,
ifnull(fs_target_2024, 0) as y2024,
ifnull(fs_target_2025, 0) as y2025,
created_at as created_at,
updated_at as updated_at
from cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.right_of_ways;
insert into cp125823_tdd.right_of_ways
SELECT
null as id,
LEFT(uuid(),36) as uuid,
id as project_id,
0 as y2016,
ifnull(row_target_2017, 0) as y2017,
ifnull(row_target_2018, 0) as y2018,
ifnull(row_target_2019, 0) as y2019,
ifnull(row_target_2020, 0) as y2020,
ifnull(row_target_2021, 0) as y2021,
ifnull(row_target_2022, 0) as y2022,
ifnull(row_target_2023, 0) as y2023,
ifnull(row_target_2024, 0) as y2024,
ifnull(row_target_2025, 0) as y2025,
row_affected as affected_households,
created_at as created_at,
updated_at as updated_at
from cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.resettlement_action_plans;
insert into cp125823_tdd.resettlement_action_plans
SELECT
null as id,
LEFT(uuid(),36) as uuid,
id as project_id,
0 as y2016,
ifnull(rap_target_2017, 0) as y2017,
ifnull(rap_target_2018, 0) as y2018,
ifnull(rap_target_2019, 0) as y2019,
ifnull(rap_target_2020, 0) as y2020,
ifnull(rap_target_2021, 0) as y2021,
ifnull(rap_target_2022, 0) as y2022,
ifnull(rap_target_2023, 0) as y2023,
ifnull(rap_target_2024, 0) as y2024,
ifnull(rap_target_2025, 0) as y2025,
rap_affected as affected_households,
created_at as created_at,
updated_at as updated_at
from cp125823_ipms.projects
WHERE id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.region_investments;
insert into cp125823_tdd.region_investments
SELECT
    null as id,
    LEFT(uuid(),36) as uuid,
    project_id as project_id,
    region_id as region_id,
    investment_target_2016 as y2016,
    investment_target_2017 as y2017,
    investment_target_2018 as y2018,
    investment_target_2019 as y2019,
    investment_target_2020 as y2020,
    investment_target_2021 as y2021,
    investment_target_2022 as y2022,
    investment_target_2023 as y2023,
    investment_target_2024 as y2024,
    investment_target_2025 as y2025,
    created_at as created_at,
    updated_at as updated_at
from cp125823_ipms.region_financials
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.region_infrastructures;
insert into cp125823_tdd.region_infrastructures
SELECT
    null as id,
    LEFT(uuid(),36) as uuid,
    project_id as project_id,
    region_id as region_id,
    infrastructure_target_2016 as y2016,
    infrastructure_target_2017 as y2017,
    infrastructure_target_2018 as y2018,
    infrastructure_target_2019 as y2019,
    infrastructure_target_2020 as y2020,
    infrastructure_target_2021 as y2021,
    infrastructure_target_2022 as y2022,
    infrastructure_target_2023 as y2023,
    infrastructure_target_2024 as y2024,
    infrastructure_target_2025 as y2025,
    created_at as created_at,
    updated_at as updated_at
from cp125823_ipms.region_financials
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.fs_investments;
insert into cp125823_tdd.fs_investments
SELECT
    null as id,
    LEFT(uuid(),36) as uuid,
    project_id as project_id,
    funding_source_id as fs_id,
    investment_target_2016 as y2016,
    investment_target_2017 as y2017,
    investment_target_2018 as y2018,
    investment_target_2019 as y2019,
    investment_target_2020 as y2020,
    investment_target_2021 as y2021,
    investment_target_2022 as y2022,
    investment_target_2023 as y2023,
    investment_target_2024 as y2024,
    investment_target_2025 as y2025,
    created_at as created_at,
    updated_at as updated_at
from cp125823_ipms.funding_source_financials
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.fs_infrastructures;
insert into cp125823_tdd.fs_infrastructures
SELECT
    null as id,
    LEFT(uuid(),36) as uuid,
    project_id as project_id,
    funding_source_id as fs_id,
    infrastructure_target_2016 as y2016,
    infrastructure_target_2017 as y2017,
    infrastructure_target_2018 as y2018,
    infrastructure_target_2019 as y2019,
    infrastructure_target_2020 as y2020,
    infrastructure_target_2021 as y2021,
    infrastructure_target_2022 as y2022,
    infrastructure_target_2023 as y2023,
    infrastructure_target_2024 as y2024,
    infrastructure_target_2025 as y2025,
    created_at as created_at,
    updated_at as updated_at
from cp125823_ipms.funding_source_infrastructures
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.project_ten_point_agenda;
insert into cp125823_tdd.project_ten_point_agenda
select
ten_point_agenda_id as tpa_id,
project_id as project_id,
created_at,
updated_at
from cp125823_ipms.project_ten_point_agenda
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.pdp_chapter_project;
insert into cp125823_tdd.pdp_chapter_project
select *
from cp125823_ipms.project_pdp_chapter
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.basis_project;
insert into cp125823_tdd.basis_project
select *
from cp125823_ipms.project_basis
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.prerequisite_project;
insert into cp125823_tdd.prerequisite_project
select
project_id as project_id,
tr_id as prerequisite_id,
null as created_at,
null as updated_at
from cp125823_ipms.project_technical_readiness
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

truncate cp125823_tdd.pdp_indicator_project;
insert into cp125823_tdd.pdp_indicator_project
select
pdp_indicator_id as pi_id,
project_id,
null as created_at,
null as updated_at
from cp125823_ipms.project_pdp_indicators
WHERE project_id IN (SELECT id FROM cp125823_tdd.projects);

-- truncate tdd.pdp_indicators;
-- insert into tdd.pdp_indicators
-- select
-- id,
-- LEFT(uuid(),36) as uuid,
-- name as name,
-- null as description,
-- replace(trim(lower(name)), ' ', '-') as slug,
-- updated_at,
-- created_at,
-- null as parent_id
-- from ipms.pdp_indicators;

truncate cp125823_tdd.users;
insert into cp125823_tdd.users
select
id,
name,
email,
email_verified_at,
password,
null as two_factor_secret,
null as two_factor_recovery_codes,
remember_token,
created_at,
updated_at
from cp125823_ipms.users;

truncate cp125823_tdd.profiles;
insert into cp125823_tdd.profiles
select
null as id,
id as user_id,
operating_unit_id as office_id,
nickname as nickname,
avatar as avatar,
created_at,
updated_at
from cp125823_ipms.users;

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
