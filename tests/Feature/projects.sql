SELECT
    operating_units.name,
    SUBSTRING(a.title, 1,100) AS short_title,
    b.name AS pipol_status,
    c.name AS type_name,
    d.name AS operating_unit,
    a.trip,
    a.cip,
    a.rdip,
    e.name AS main_funding_source,
    f.name AS pdp_chapter,
    g.name AS spatial_coverage,
    h.name AS project_status,
    a.target_start_year AS implementation_start,
    a.target_end_year AS implementation_end,
    j.name AS operating_unit_type,
    SUM(distinct l.infrastructure_target_2016) AS infrastructure_target_2016_bd,
    SUM(distinct l.infrastructure_target_2017) AS infrastructure_target_2017_bd,
    SUM(distinct l.infrastructure_target_2018) AS infrastructure_target_2018_bd,
    SUM(distinct l.infrastructure_target_2019) AS infrastructure_target_2019_bd,
    SUM(distinct l.infrastructure_target_2020) AS infrastructure_target_2020_bd,
    SUM(distinct l.infrastructure_target_2021) AS infrastructure_target_2021_bd,
    SUM(distinct l.infrastructure_target_2022) AS infrastructure_target_2022_bd,
    SUM(distinct l.infrastructure_target_2023) AS infrastructure_target_2023_bd,
    SUM(distinct l.infrastructure_target_2024) AS infrastructure_target_2024_bd,
    SUM(distinct l.infrastructure_target_2025) AS infrastructure_target_2025_bd,
    SUM(distinct k.investment_target_2016) AS investment_target_2016_bd,
    SUM(distinct k.investment_target_2017) AS investment_target_2017_bd,
    SUM(distinct k.investment_target_2018) AS investment_target_2018_bd,
    SUM(distinct k.investment_target_2019) AS investment_target_2019_bd,
    SUM(distinct k.investment_target_2020) AS investment_target_2020_bd,
    SUM(distinct k.investment_target_2021) AS investment_target_2021_bd,
    SUM(distinct k.investment_target_2022) AS investment_target_2022_bd,
    SUM(distinct k.investment_target_2023) AS investment_target_2023_bd,
    SUM(distinct k.investment_target_2024) AS investment_target_2024_bd,
    SUM(distinct k.investment_target_2025) AS investment_target_2025_bd
FROM projects a
         LEFT JOIN
     operating_units ON a.operating_unit_id=operating_units.id
         LEFT JOIN
     funding_source_infrastructures l ON a.id=l.project_id
         LEFT JOIN
     pipol_statuses b ON a.pipol_status_id=b.id
         LEFT JOIN
     types c ON a.type_id=c.id
         LEFT JOIN
     operating_units d ON a.operating_unit_id=d.id
         LEFT JOIN
     operating_unit_types i ON d.operating_unit_type_id=i.id
         LEFT JOIN
     funding_sources e ON a.main_funding_source_id=e.id
         LEFT JOIN
     pdp_chapters f ON a.pdp_chapter_id=f.id
         LEFT JOIN
     spatial_coverages g ON a.spatial_coverage_id=g.id
         LEFT JOIN
     project_statuses h ON a.project_status_id=h.id
         LEFT JOIN
     operating_unit_types j ON d.operating_unit_type_id=j.id
         LEFT JOIN
     funding_source_financials k ON k.project_id=a.id
WHERE a.pipol_status_id=3
GROUP BY a.id;

SELECT
    operating_units.name,
    a.title,
    SUBSTRING(a.title, 1,100) AS short_title,
    SUBSTRING(a.description,1,100) AS short_description,
    b.name AS pipol_status,
    c.name AS type_name,
    d.name AS operating_unit,
    a.trip,
    a.cip,
    a.rdip,
    e.name AS main_funding_source,
    f.name AS pdp_chapter,
    g.name AS spatial_coverage,
    h.name AS project_status,
    a.target_start_year AS implementation_start,
    a.target_end_year AS implementation_end,
    j.name AS operating_unit_type,
    ifnull(l.infrastructure_target_2016,0),
    ifnull(l.infrastructure_target_2017,0),
    ifnull(l.infrastructure_target_2018,0),
    ifnull(l.infrastructure_target_2019,0),
    ifnull(l.infrastructure_target_2020,0),
    ifnull(l.infrastructure_target_2021,0),
    ifnull(l.infrastructure_target_2022,0),
    ifnull(l.infrastructure_target_2023,0),
    ifnull(l.infrastructure_target_2024,0),
    ifnull(l.infrastructure_target_2025,0),
    ifnull(k.investment_target_2016,0),
    ifnull(k.investment_target_2017,0),
    ifnull(k.investment_target_2018,0),
    ifnull(k.investment_target_2019,0),
    ifnull(k.investment_target_2020,0),
    ifnull(k.investment_target_2021,0),
    ifnull(k.investment_target_2022,0),
    ifnull(k.investment_target_2023,0),
    ifnull(k.investment_target_2024,0),
    ifnull(k.investment_target_2025,0)
FROM projects a
         LEFT JOIN
     operating_units ON a.operating_unit_id=operating_units.id
         LEFT JOIN
     funding_source_infrastructures l ON a.id=l.project_id
         LEFT JOIN
     pipol_statuses b ON a.pipol_status_id=b.id
         LEFT JOIN
     types c ON a.type_id=c.id
         LEFT JOIN
     operating_units d ON a.operating_unit_id=d.id
         LEFT JOIN
     operating_unit_types i ON d.operating_unit_type_id=i.id
         LEFT JOIN
     funding_sources e ON a.main_funding_source_id=e.id
         LEFT JOIN
     pdp_chapters f ON a.pdp_chapter_id=f.id
         LEFT JOIN
     spatial_coverages g ON a.spatial_coverage_id=g.id
         LEFT JOIN
     project_statuses h ON a.project_status_id=h.id
         LEFT JOIN
     operating_unit_types j ON d.operating_unit_type_id=j.id
         LEFT JOIN
     funding_source_financials k ON k.project_id=a.id
WHERE a.pipol_status_id=3;

SELECT
    b.id,
    c.name AS funding_source,
    SUBSTRING(b.title, 1,100) AS short_title,
    ifnull(a.investment_target_2016,0) AS 2016_PIP,
    ifnull(a.investment_target_2017,0) AS 2017_PIP,
    ifnull(a.investment_target_2018,0) AS 2018_PIP,
    ifnull(a.investment_target_2019,0) AS 2019_PIP,
    ifnull(a.investment_target_2020,0) AS 2020_PIP,
    ifnull(a.investment_target_2021,0) AS 2021_PIP,
    ifnull(a.investment_target_2022,0) AS 2022_PIP,
    ifnull(a.investment_target_2023,0) AS 2023_PIP,
    ifnull(a.investment_target_2024,0) AS 2024_PIP,
    ifnull(a.investment_target_2025,0) AS 2025_PIP
FROM funding_source_financials a
LEFT JOIN
    projects b ON b.id=a.project_id
LEFT JOIN
    funding_sources c ON a.funding_source_id=c.id
WHERE b.pipol_status_id=3;

SELECT
    b.id,
    c.name AS funding_source,
    SUBSTRING(b.title, 1,100) AS short_title,
    ifnull(a.infrastructure_target_2016,0) AS 2016_TRIP,
    ifnull(a.infrastructure_target_2017,0) AS 2017_TRIP,
    ifnull(a.infrastructure_target_2018,0) AS 2018_TRIP,
    ifnull(a.infrastructure_target_2019,0) AS 2019_TRIP,
    ifnull(a.infrastructure_target_2020,0) AS 2020_TRIP,
    ifnull(a.infrastructure_target_2021,0) AS 2021_TRIP,
    ifnull(a.infrastructure_target_2022,0) AS 2022_TRIP,
    ifnull(a.infrastructure_target_2023,0) AS 2023_TRIP,
    ifnull(a.infrastructure_target_2024,0) AS 2024_TRIP,
    ifnull(a.infrastructure_target_2025,0) AS 2025_TRIP
FROM funding_source_infrastructures a
         RIGHT JOIN
     projects b ON b.id=a.project_id
         LEFT JOIN
     funding_sources c ON a.funding_source_id=c.id
WHERE b.pipol_status_id=3;
