$(document).ready( function () {
    $('.detail-table').DataTable();
} );

const getId = (id) => {
    $("#order_id").val(id);
};