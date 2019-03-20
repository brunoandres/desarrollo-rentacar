$('#fecha_desde').datepicker({
  dateFormat: "dd/mm/yy",
  autoclose : true
});

$('#fecha_hasta').datepicker({
  dateFormat: "dd/mm/yy",
  autoclose : true
});

$('#fecha_desde_chile').datepicker({
  dateFormat: "dd/mm/yy",
  autoclose : true
});

$('#fecha_hasta_chile').datepicker({
  dateFormat: "dd/mm/yy",
  autoclose : true
});


$(".dp").datepicker();

var dates = jQuery('.start_date, .end_date').datepicker("option", "onSelect", 
   function(selectedDate){
       var $this = $(this),
           option = $this.hasClass("start_date") ? "minDate" : "maxDate",
           adjust = $this.hasClass("start_date") ? 1 : -1,
           base_date = new Date(selectedDate),
           new_date = new Date();

       new_date.setDate(base_date.getDate() + (1 * adjust));
       dates.not(this).datepicker("option", option, new_date);
       
   }
);
