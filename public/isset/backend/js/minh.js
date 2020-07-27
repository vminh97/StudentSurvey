// function clFunction() {
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("dataTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[1];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }
$(document).ready(function() {
  $('#myInput').on('keyup', function(event) {
     event.preventDefault();
     /* Act on the event */
     var tukhoa = $(this).val().toLowerCase();
     $('#dataTable tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
     });
  });
});