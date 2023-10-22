//delete confirmation
const deleteData = (id) => {
    const formDelete = document.querySelector('#form-delete');

    Swal.fire({
        title: 'Hapus Data?',
        text: "Semua data terkait pesanan termasuk produksi dan finishing juga akan dihapus. Tindakan tidak dapat diurungkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/order/` + id);
            formDelete.submit();
            return;
        }
      })
};

//finish confirmation
const finishOrder = (id) => {
    const formFinish = document.querySelector('#form-finish');
    // if(confirm) {
        // formFinish.setAttribute('action', `/order/finish/` + id);
        // $("#id-finish").val(id);
        // formFinish.submit();
        // return;
    // }

    Swal.fire({
        title: 'Pesanan Selesai?',
        text: "Apakah yakin ingin menyelesaikan pesanan? Aksi tidak dapat diurungkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Selesai!'
      }).then((result) => {
        if (result.isConfirmed) {
            formFinish.setAttribute('action', `/order/finish/` + id);
            $("#id-finish").val(id);
            formFinish.submit();
            return;
        }
      })
};