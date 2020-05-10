$('.date').datepicker({
    multidate: true,
    format: 'dd-mm-yyyy'
});


$('#onSubmit').click(function(){
    var selectDate = $("#unavailable_date").val();
    console.log(selectDate);
});
