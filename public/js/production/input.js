$(document).ready( function () {
    $('.detail-table').DataTable();
} );

const getId = (id, modal) => {
    $("#order_id").val(id);
    $('#'+modal).modal('hide');
};