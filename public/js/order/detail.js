$(document).ready( function () {
    $('.detail-table').DataTable();
} );

//delete confirmation
const deleteData = (id) => {
    const confirm = window.confirm('Apakah yakin ingin menghapus data?')
    const formDelete = document.querySelector('#form-delete');

    if(confirm) {
        formDelete.setAttribute('action', `/order/` + id);
        formDelete.submit();
        return;
    }
};

//finish confirmation
const finishOrder = (id) => {
    const confirm = window.confirm('Apakah yakin ingin menyelesaikan pesanan? Aksi tidak dapat diurungkan!')
    const formFinish = document.querySelector('#form-finish');

    if(confirm) {
        formFinish.setAttribute('action', `/order/finish/` + id);
        $("#id-finish").val(id);
        formFinish.submit();
        return;
    }
};