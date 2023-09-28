$(document).ready( function () {
    $('#table-detail').DataTable();
} );

$(function () {
    $('[data-toggle="popover"]').popover()
})

const deleteData = (id) => {
    // const confirm = window.confirm('Apakah yakin ingin menghapus data?')
    const formDelete = document.querySelector('#form-delete');

    Swal.fire({
        title: 'Hapus Data?',
        text: "Tindakan tidak dapat diurungkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/finishing/` + id);
            formDelete.submit();
            return;
        }
      })
};