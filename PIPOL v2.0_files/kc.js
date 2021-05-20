
function CovidCheckboxes() {
     // $('').removeAttr('required');
     var requiredCheckboxes = $('.covidImp :checkbox');
      if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
   }

function ChapOutcome() {
     // $('').removeAttr('required');
     var requiredCheckboxes = $('.chapReq :checkbox');
      if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
   }

function BasisImpCheckboxes() {
     // $('').removeAttr('required');
     var requiredCheckboxes = $('.basisImp :checkbox');
      if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
   }

function InfraSectorCheckboxes() {
  var infraSecChbxs = $('.infraSecChbxs :checkbox[name="sectors[]"]');
  

   if(infraSecChbxs.is(':checked')) {
        infraSecChbxs.removeAttr('required');
    } else {
        infraSecChbxs.attr('required', 'required');
    }
}

function InfraSubSectorCheckboxes1() {
  // alert('1');
  var infraSecChbxs = $('.infraSubSecChbxs1 :checkbox');
  var checkboxCustomSector = $('#checkboxCustomSector1');
  
  if(infraSecChbxs.is(':checked') || !checkboxCustomSector.is(':checked')) {
        infraSecChbxs.removeAttr('required');
    } else {
        infraSecChbxs.attr('required', 'required');
    }
}

function InfraSubSectorCheckboxes3() {
  // alert('3');
  var infraSecChbxs = $('.infraSubSecChbxs3 :checkbox');
  var checkboxCustomSector = $('#checkboxCustomSector3');

   if(infraSecChbxs.is(':checked') || !checkboxCustomSector.is(':checked')) {
        infraSecChbxs.removeAttr('required');
    } else {
        infraSecChbxs.attr('required', 'required');
    }
}

function InfraSubSectorCheckboxes4() {
  // alert('4');
  var infraSecChbxs = $('.infraSubSecChbxs4 :checkbox');
  var checkboxCustomSector = $('#checkboxCustomSector4');

   if(infraSecChbxs.is(':checked') || !checkboxCustomSector.is(':checked')) {
        infraSecChbxs.removeAttr('required');
    } else {
        infraSecChbxs.attr('required', 'required');
    }
}

function InfraSubSectorCheckboxes6() {
  // alert('6');
  var infraSecChbxs = $('.infraSubSecChbxs6 :checkbox');
  var checkboxCustomSector = $('#checkboxCustomSector6');

   if(infraSecChbxs.is(':checked') || !checkboxCustomSector.is(':checked')) {
        infraSecChbxs.removeAttr('required');
    } else {
        infraSecChbxs.attr('required', 'required');
    }
}

function ImpReadinessCheckboxes() {
  var requiredCheckboxes = $('.impReadiness :checkbox');

   if(requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    } else {
        requiredCheckboxes.attr('required', 'required');
    }
}

function SocioPointsCheckboxes() {
  var requiredCheckboxes = $('.socoPoints :checkbox');

   if(requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    } else {
        requiredCheckboxes.attr('required', 'required');
    }
}

function SusPointsCheckboxes() {
  var requiredCheckboxes = $('.susPoints :checkbox');

   if(requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    } else {
        requiredCheckboxes.attr('required', 'required');
    }
}


function SaveValidate() {
if (this.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    this.classList.add('was-validated');

}

function SaveAsDraft() {
var title = document.getElementById('title');

if(title.value == ""){ //if title is empty
  SaveAsFinal();
}else {
 var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    form.removeEventListener('submit', SaveValidate, false);
  });
}
}

function SaveAsFinal() {
  jQuery(function($) {
  var validator = $('#addProjForm').validate({
    messages: {
      title: "Project Title",
      prog_proj: "Program or Project",
      "basis_id[]": "Basis for Implementation",
      description: "Description",
      spatial: "Spatial Coverage",
      iccable: "Level of Approval",
      pip_typo: "PIP Typologies",
      cip_typo: "CIP Typologies",
      rdip: "RDIP Inclusion",
      mainpdp: "Main PDP Chapter",
      "agenda[]": "0-10 Socioeconomic Agenda",
      output: "Expected Output",
      start: "Start of Project Implementation",
      end: "Year of Project Completion",
      mainfsource: "Funding Source",
      modeofimplementation: "Mode of Implementation",
      "sdg[]": "Sustainable Development Goals",
      "sectors[]": "Infrastructure Sectors",
      "subsectors[]": "Infrastructure Subsectors",
      "status[]": "Status of Implementation Readiness",
      ppdetails: "Project Prepartaion Details",
      rowa: "ROWA",
      rc: "Resettlement",
      wrrc: "ROWA and Resettlement Action Plan",
      gad: "Level of Gender Responsiveness",
      category: "Categorization",
      updates: "Project Updates",
      asof: "Project As Of Updates",
      "_1rm5[]": "PDP Chapter Outcome",
      "_1rm6[]": "PDP Chapter Outcome",
      "_1rm7[]": "PDP Chapter Outcome",
      "_1rm8[]": "PDP Chapter Outcome",
      "_1rm9[]": "PDP Chapter Outcome",
      "_1rm10[]": "PDP Chapter Outcome",
      "_1rm11[]": "PDP Chapter Outcome",
      "_1rm12[]": "PDP Chapter Outcome",
      "_1rm13[]": "PDP Chapter Outcome",
      "_1rm14[]": "PDP Chapter Outcome",
      "_1rm15[]": "PDP Chapter Outcome",
      "_1rm16[]": "PDP Chapter Outcome",
      "_1rm17[]": "PDP Chapter Outcome",
      "_1rm18[]": "PDP Chapter Outcome",
      "_1rm19[]": "PDP Chapter Outcome",
      "_1rm20[]": "PDP Chapter Outcome"
    },
    errorElement : 'span',
    errorClass: 'error_required',
    errorLabelContainer: '.errorTxt'
  });
});
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit',SaveValidate, false);
});
}

function SaveAsValidated() {
  jQuery(function($) {
  var validator = $('#addProjForm').validate({
    messages: {
      title: "Project Title",
      prog_proj: "Program or Project",
      "basis_id[]": "Basis for Implementation",
      description: "Description",
      spatial: "Spatial Coverage",
      iccable: "Level of Approval",
      pip_typo: "PIP Typologies",
      cip_typo: "CIP Typologies",
      rdip: "RDIP Inclusion",
      mainpdp: "Main PDP Chapter",
      "agenda[]": "0-10 Socioeconomic Agenda",
      output: "Expected Output",
      start: "Start of Project Implementation",
      end: "Year of Project Completion",
      mainfsource: "Funding Source",
      modeofimplementation: "Mode of Implementation",
      "sdg[]": "Sustainable Development Goals",
      "sectors[]": "Infrastructure Sectors",
      "subsectors[]": "Infrastructure Subsectors",
      "status[]": "Status of Implementation Readiness",
      ppdetails: "Project Prepartaion Details",
      rowa: "ROWA",
      rc: "Resettlement",
      wrrc: "ROWA and Resettlement Action Plan",
      gad: "Level of Gender Responsiveness",
      category: "Categorization",
      updates: "Project Updates",
      asof: "Project As Of Updates"

    },
    errorElement : 'span',
    errorClass: 'error_required',
    errorLabelContainer: '.errorTxt'
  });
});
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit',SaveValidate, false);
});
}

function SaveAsUncat() {
  jQuery(function($) {
  var validator = $('#uncatProjForm').validate({
    messages: {
      uncat: "Project Title",
    },
    errorElement : 'span',
    errorClass: 'error_required',
    errorLabelContainer: '.errorTxt'
  });
});
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit',SaveValidate, false);
});
}

function SaveAsValRegions() {
  jQuery(function($) {
  var validator = $('#valProjForm').validate({
    messages: {
      uncat: "Project Title",
    },
    errorElement : 'span',
    errorClass: 'error_required',
    errorLabelContainer: '.errorTxt'
  });
});
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit',SaveValidate, false);
});
}

$('input.number').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // alert($(this).attr('name').indexOf("nep"));
  ComputeFinancialAccomplishment($(this));
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;

  });
});


$('input.it-number').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  ComputeInvestmentTargets($(this));
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;

  });
});

 $('input.rb-number').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  ComputeRegionalBreakdown($(this));
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;

  });
});

  $('input.ic-number').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  ComputeInfrastructureCost($(this));
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;

  });
});


function ComputeInputElementsByClassName($className, $totalId) {
  var elements = document.getElementsByClassName($className);
  var sum = 0;

  for(var i=0; i<elements.length; i++) {
    var value = elements[i].value;
  
    if(value=="" || value==null)
      value = 0;
    else 
      value = value.split(',').join('');
  
    sum+=parseInt(value);
  }
  $($totalId).text(String(sum).replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    );
}

function ComputeLabelElemetsByClassName($className, $totalId) {
  var elements = document.getElementsByClassName($className);
  var sum = 0;

  for(var i=0; i<elements.length; i++) {
    var value = elements[i].innerHTML;
  
    if(value=="" || value==null)
      value = 0;
    else 
      value = value.split(',').join('');
  
    sum+=parseInt(value);
  }
  $($totalId).text(String(sum).replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    );
}

function ComputeFinancialAccomplishment($val) {
  var value = $val.attr('name');

  if(value.indexOf("nep") != -1) {
    ComputeInputElementsByClassName("nep", "#nep_total");
  } else if(value.indexOf("all") != -1) {
    ComputeInputElementsByClassName("all", "#all_total");
  } else if(value.indexOf("ad") != -1) {
    ComputeInputElementsByClassName("ad", "#ad_total");
  } 
}

function ComputeInfrastructureCost($val) {
  ComputeInfrastructureCostRight($val, "nglocal", "ic-nglocal1", "#ic-nglocal_total_all", "ic-nglocal2", "#ic-nglocal2_total");
  ComputeInfrastructureCostRight($val, "ngloan", "ic-ngloan1", "#ic-ngloan_total_all", "ic-ngloan2", "#ic-ngloan2_total");
  ComputeInfrastructureCostRight($val, "odagrant", "ic-odagrant1", "#ic-odagrant_total_all", "ic-odagrant2", "#ic-odagrant2_total");
  ComputeInfrastructureCostRight($val, "gocc", "ic-gocc1", "#ic-gocc_total_all", "ic-gocc2", "#ic-gocc2_total");
  ComputeInfrastructureCostRight($val, "lgu", "ic-lgu1", "#ic-lgu_total_all", "ic-lgu2", "#ic-lgu2_total");
  ComputeInfrastructureCostRight($val, "ps", "ic-ps1", "#ic-ps_total_all", "ic-ps2", "#ic-ps2_total");
  ComputeInfrastructureCostRight($val, "others", "ic-others1", "#ic-others_total_all", "ic-others2", "#ic-others2_total");
  
  ComputeInfrastructureCostBottom($val, "2016", "ic_2016", "#ic_2016_total");
  ComputeInfrastructureCostBottom($val, "2017", "ic_2017", "#ic_2017_total");
  ComputeInfrastructureCostBottom($val, "2018", "ic_2018", "#ic_2018_total");
  ComputeInfrastructureCostBottom($val, "2019", "ic_2019", "#ic_2019_total");
  ComputeInfrastructureCostBottom($val, "2020", "ic_2020", "#ic_2020_total");
  ComputeInfrastructureCostBottom($val, "2021", "ic_2021", "#ic_2021_total");
  ComputeInfrastructureCostBottom($val, "2022", "ic_2022", "#ic_2022_total");
  ComputeInfrastructureCostBottom($val, "2023", "ic_2023", "#ic_2023_total");

  ComputeLabelElemetsByClassName("ic-total2", "#ic_total2");
  ComputeLabelElemetsByClassName("ic-total_all", "#ic_total_all");
}

function ComputeInfrastructureCostRight($val, $indexName, $className1, $totalIdAll, $className2, $totalId2) {
  if($val.attr('name').includes($indexName, 7)) {

    var elements2 = document.getElementsByClassName($className2);
    var sum2 = 0;
    for(var i=0; i<elements2.length; i++) {
      var value = elements2[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum2+=parseInt(value);
    }
    $($totalId2).text(String(sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );

    var elements1 = document.getElementsByClassName($className1);
    var sum1 = 0;
    for(var i=0; i<elements1.length; i++) {
      var value = elements1[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum1+=parseInt(value);
    }
    $($totalIdAll).text(String(sum1+sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );
  }
}

function ComputeInfrastructureCostBottom($val, $indexName, $className, $totalId) {
  if($val.attr('name').indexOf($indexName) != -1) {
    ComputeInputElementsByClassName($className, $totalId);
  }
}

function ComputeInvestmentTargets($val) {

  ComputeInvestmentTargetsRight($val, "nglocal", "nglocal1", "#nglocal_total_all", "nglocal2", "#nglocal2_total");
  ComputeInvestmentTargetsRight($val, "ngloan", "ngloan1", "#ngloan_total_all", "ngloan2", "#ngloan2_total");
  ComputeInvestmentTargetsRight($val, "odagrant", "odagrant1", "#odagrant_total_all", "odagrant2", "#odagrant2_total");
  ComputeInvestmentTargetsRight($val, "gocc", "gocc1", "#gocc_total_all", "gocc2", "#gocc2_total");
  ComputeInvestmentTargetsRight($val, "lgu", "lgu1", "#lgu_total_all", "lgu2", "#lgu2_total");
  ComputeInvestmentTargetsRight($val, "ps", "ps1", "#ps_total_all", "ps2", "#ps2_total");
  ComputeInvestmentTargetsRight($val, "others", "others1", "#others_total_all", "others2", "#others2_total");
  
  // ComputeInvestmentTargetsBottom($val, "2016", "it_2016", "#it_2016_total");
  // ComputeInvestmentTargetsBottom($val, "2017", "it_2017", "#it_2017_total");
  // ComputeInvestmentTargetsBottom($val, "2018", "it_2018", "#it_2018_total");
  // ComputeInvestmentTargetsBottom($val, "2019", "it_2019", "#it_2019_total");
  // ComputeInvestmentTargetsBottom($val, "2020", "it_2020", "#it_2020_total");
  ComputeInvestmentTargetsBottom($val, "2021", "it_2021", "#it_2021_total");
  ComputeInvestmentTargetsBottom($val, "2022", "it_2022", "#it_2022_total");
  ComputeInvestmentTargetsBottom($val, "2023", "it_2023", "#it_2023_total");
  ComputeInvestmentTargetsBottom($val, "2024", "it_2024", "#it_2024_total");
  ComputeInvestmentTargetsBottom($val, "2025", "it_2025", "#it_2025_total");

  ComputeLabelElemetsByClassName("it-total2", "#it_total2");
  ComputeLabelElemetsByClassName("it-total_all", "#it_total_all");
}


function ComputeInvestmentTargetsRight($val, $indexName, $className1, $totalIdAll, $className2, $totalId2) {
  if($val.attr('name').indexOf($indexName) != -1) {

    var elements2 = document.getElementsByClassName($className2);
    var sum2 = 0;
    for(var i=0; i<elements2.length; i++) {
      var value = elements2[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum2+=parseInt(value);
    }
    $($totalId2).text(String(sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );

    var elements1 = document.getElementsByClassName($className1);
    var sum1 = 0;
    for(var i=0; i<elements1.length; i++) {
      var value = elements1[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum1+=parseInt(value);
    }
    $($totalIdAll).text(String(sum1+sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );
  }
}

function ComputeInvestmentTargetsBottom($val, $indexName, $className, $totalId) {
  if($val.attr('name').indexOf($indexName) != -1) {
    ComputeInputElementsByClassName($className, $totalId);
  }
}

function ComputeRegionalBreakdown($val) {
  ComputeRegionalBreakdownRight($val, "NCR", "NCR1", "#NCR_total_all", "NCR2", "#NCR2_total");
  ComputeRegionalBreakdownRight($val, "CAR", "CAR1", "#CAR_total_all", "CAR2", "#CAR2_total");
  ComputeRegionalBreakdownRight($val, "Region_I", "Region_I1", "#Region_I_total_all", "Region_I2", "#Region_I2_total");
  ComputeRegionalBreakdownRight($val, "Region_II", "Region_II1", "#Region_II_total_all", "Region_II2", "#Region_II2_total");
  ComputeRegionalBreakdownRight($val, "Region_III", "Region_III1", "#Region_III_total_all", "Region_III2", "#Region_III2_total");
  ComputeRegionalBreakdownRight($val, "Region_IVA", "Region_IVA1", "#Region_IVA_total_all", "Region_IVA2", "#Region_IVA2_total");
  ComputeRegionalBreakdownRight($val, "Region_IVB", "Region_IVB1", "#Region_IVB_total_all", "Region_IVB2", "#Region_IVB2_total");
  ComputeRegionalBreakdownRight($val, "Region_V", "Region_V1", "#Region_V_total_all", "Region_V2", "#Region_V2_total");
  ComputeRegionalBreakdownRight($val, "Region_VI", "Region_VI1", "#Region_VI_total_all", "Region_VI2", "#Region_VI2_total");
  ComputeRegionalBreakdownRight($val, "Region_VII", "Region_VII1", "#Region_VII_total_all", "Region_VII2", "#Region_VII2_total");
  ComputeRegionalBreakdownRight($val, "Region_VIII", "Region_VIII1", "#Region_VIII_total_all", "Region_VIII2", "#Region_VIII2_total");
  ComputeRegionalBreakdownRight($val, "Region_IX", "Region_IX1", "#Region_IX_total_all", "Region_IX2", "#Region_IX2_total");
  ComputeRegionalBreakdownRight($val, "Region_X", "Region_X1", "#Region_X_total_all", "Region_X2", "#Region_X2_total");
  ComputeRegionalBreakdownRight($val, "Region_XI", "Region_XI1", "#Region_XI_total_all", "Region_XI2", "#Region_XI2_total");
  ComputeRegionalBreakdownRight($val, "Region_XII", "Region_XII1", "#Region_XII_total_all", "Region_XII2", "#Region_XII2_total");
  ComputeRegionalBreakdownRight($val, "Region_XIII", "Region_XIII1", "#Region_XIII_total_all", "Region_XIII2", "#Region_XIII2_total");
  ComputeRegionalBreakdownRight($val, "BARMM", "BARMM1", "#BARMM_total_all", "BARMM2", "#BARMM2_total");

  ComputeRegionalBreakdownBottom($val, "2016", "rb_2016", "#rb_2016_total");
  ComputeRegionalBreakdownBottom($val, "2017", "rb_2017", "#rb_2017_total");
  ComputeRegionalBreakdownBottom($val, "2018", "rb_2018", "#rb_2018_total");
  ComputeRegionalBreakdownBottom($val, "2019", "rb_2019", "#rb_2019_total");
  ComputeRegionalBreakdownBottom($val, "2020", "rb_2020", "#rb_2020_total");
  ComputeRegionalBreakdownBottom($val, "2021", "rb_2021", "#rb_2021_total");
  ComputeRegionalBreakdownBottom($val, "2022", "rb_2022", "#rb_2022_total");
  ComputeRegionalBreakdownBottom($val, "2023", "rb_2023", "#rb_2023_total");

  ComputeLabelElemetsByClassName("rb-total2", "#rb_total2");
  ComputeLabelElemetsByClassName("rb-total_all", "#rb_total_all");
}

function ComputeRegionalBreakdownRight($val, $indexName, $className1, $totalIdAll, $className2, $totalId2) {
  if($val.attr('name').indexOf($indexName) != -1) {

    var elements2 = document.getElementsByClassName($className2);
    var sum2 = 0;
    for(var i=0; i<elements2.length; i++) {
      var value = elements2[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum2+=parseInt(value);
    }
    $($totalId2).text(String(sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );

    var elements1 = document.getElementsByClassName($className1);
    var sum1 = 0;
    for(var i=0; i<elements1.length; i++) {
      var value = elements1[i].value;

      if(value=="" || value==null)
        value = 0;
      else 
        value = value.split(',').join('');
    
      sum1+=parseInt(value);
    }
    $($totalIdAll).text(String(sum1+sum2).replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      );
  }
}

function ComputeRegionalBreakdownBottom($val, $indexName, $className, $totalId) {
  if($val.attr('name').indexOf($indexName) != -1) {
    ComputeInputElementsByClassName($className, $totalId);
  }
}