function updateUser(id, reference) {
    var formData = new FormData();
    formData.append("name", document.getElementById("edit-name-" + id).value);
    formData.append("email", document.getElementById("edit-email-" + id).value);
    formData.append("phone", document.getElementById("edit-phone-" + id).value);
    formData.append(
        "address",
        document.getElementById("edit-address-" + id).value
    );
    formData.append("_method", "PUT");
    axios
        .post("/cms/admin/users/" + id, formData)
        .then(function (response) {
            if (response.status === 200) {
                console.log(response.data.user);
                var tr = reference.closest("tr");
                tr.querySelector("#user-name").textContent =
                    response.data.user.name;
                tr.querySelector("#user-email").textContent =
                    response.data.user.email;
                tr.querySelector("#user-address").textContent =
                    response.data.user.address;
                tr.querySelector("#user-phone").textContent =
                    response.data.user.phone;
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
        .delete("/cms/admin/users/" + id)
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
