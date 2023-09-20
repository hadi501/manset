$(document).ready( function () {
    $('#table-detail').DataTable();
} );

const getId = (id, modal) => {
    $("#order_id").val(id);
    $('#'+modal).modal('hide');
};