$(document).ready( function () {
    $('#table-detail').DataTable();
} );

//delete confirmation
const deleteData = (id) => {
    const confirm = window.confirm('Apakah yakin ingin menghapus data?')
    const formDelete = document.querySelector('#form-delete');

    if(confirm) {
        formDelete.setAttribute('action', `/sock/` + id);
        formDelete.submit();
        return;
    }
};