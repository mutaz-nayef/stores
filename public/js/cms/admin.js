function updateAdmin(id, reference) {
    var formData = new FormData();
    formData.append(
        "name",
        document.getElementById("edit-admin-name-" + id).value
    );
    formData.append(
        "email",
        document.getElementById("edit-admin-email-" + id).value
    );
    formData.append(
        "phone",
        document.getElementById("edit-admin-phone-" + id).value
    );
    formData.append(
        "address",
        document.getElementById("edit-admin-address-" + id).value
    );
    formData.append("_method", "PUT");
    axios
        .post("/cms/admin/admins/" + id, formData)
        .then(function (response) {
            if (response.status === 200) {
                console.log(response.data.admin);
                var tr = reference.closest("tr");
                tr.querySelector("#admin-name-" + id).textContent =
                    response.data.admin.name;
                tr.querySelector("#admin-email-" + id).textContent =
                    response.data.admin.email;
                tr.querySelector("#admin-address-" + id).textContent =
                    response.data.admin.address;
                tr.querySelector("#admin-phone-" + id).textContent =
                    response.data.admin.phone;
                toastr.success(response.data.message);
            }
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
}

function performDelete(id, reference) {
    axios
        .delete("/cms/admin/admins/" + id)
        .then(function (response) {
            console.log(response);
            reference.closest("tr").remove(); // give me the close tr for you then delete it
            showMessage(response.data);
        })
        .catch(function (error) {
            console.log(error);
            // toastr.error(error.response.data.message);
            showMessage(error.response.data);
        });
}
