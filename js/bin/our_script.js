$( document ).ready(function() {
    // Init Modal
    $('.modal').modal();
    // Init selects
    $('select').select();

    // Init Datepicker
    $('.datepicker').pickadate({
        container: 'body',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});