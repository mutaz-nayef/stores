function confirmDelete(id, reference) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id, reference);
        }
    });
}

function showMessage(data) {
    Swal.fire(data.title, data.text, data.icon);
}
