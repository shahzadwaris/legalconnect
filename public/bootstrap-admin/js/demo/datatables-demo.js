// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable(
    {
      "order": [],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details for ' + data[0] + ' ' + data[1];
            }
          }),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll()
        }
      },
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      colReorder: true,
      stateSave: true
    }
  );
});
