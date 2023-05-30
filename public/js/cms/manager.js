function updateManager(id, reference) {
    var formData = new FormData();
    formData.append(
        "name",
        document.getElementById("edit-manager-name-" + id).value
    );
    formData.append(
        "email",
        document.getElementById("edit-manager-email-" + id).value
    );
    formData.append(
        "phone",
        document.getElementById("edit-manager-phone-" + id).value
    );
    formData.append(
        "address",
        document.getElementById("edit-manager-address-" + id).value
    );

    formData.append("_method", "PUT");
    axios
        .post("/cms/admin/managers/" + id, formData)
        .then(function (response) {
            console.log(response.data.manager);
            var tr = reference.closest("tr");
            var managerName = tr.querySelector("#manager-name-" + id);
            if (managerName) {
                managerName.textContent = response.data.manager.name;
            }
            var ManagerEmail = tr.querySelector("#manager-email-" + id);
            if (ManagerEmail) {
                ManagerEmail.textContent = response.data.manager.email;
            }
            var managerAddress = tr.querySelector("#manager-address-" + id);
            if (managerAddress) {
                managerAddress.textContent = response.data.manager.address;
            }
            var managerPhone = tr.querySelector("#manager-phone-" + id);
            if (managerPhone) {
                managerPhone.textContent = response.data.manager.phone;
            }

            toastr.success(response.data.message);
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
}
