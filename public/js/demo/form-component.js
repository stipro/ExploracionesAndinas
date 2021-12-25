
// Form-Component.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {


    // CHOSEN
    // =================================================================
    // Require Chosen
    // http://harvesthq.github.io/chosen/
    // =================================================================
    $('#demo-chosen-select').chosen();
    $('#demo-chosen-select-xd').chosen();
    
    $('#demo-cs-multiselect').chosen({width:'100%'});







    // SELECT2 SINGLE
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2").select2();




    // SELECT2 PLACEHOLDER
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2-placeholder").select2({
        placeholder: "Select a state",
        allowClear: true
    });



    // SELECT2 SELECT BOXES
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2-multiple-selects").select2();




});
