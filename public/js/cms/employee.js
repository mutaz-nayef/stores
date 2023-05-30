function updateEmployee(id, reference) {
    var formData = new FormData();
    formData.append(
        "name",
        document.getElementById("edit-employee-name-" + id).value
    );
    formData.append(
        "email",
        document.getElementById("edit-employee-email-" + id).value
    );
    formData.append(
        "phone",
        document.getElementById("edit-employee-phone-" + id).value
    );
    formData.append(
        "salary",
        document.getElementById("edit-employee-salary-" + id).value
    );
    formData.append(
        "address",
        document.getElementById("edit-employee-address-" + id).value
    );
    formData.append(
        "job_title",
        document.getElementById("edit-employee-job_title-" + id).value
    );
    formData.append("_method", "PUT");
    axios
        .post("/cms/admin/employees/" + id, formData)
        .then(function (response) {
            console.log(response.data.employee);
            var tr = reference.closest("tr");
            var employeeName = tr.querySelector("#employee-name-" + id);
            if (employeeName) {
                employeeName.textContent = response.data.employee.name;
            }
            var employeeEmail = tr.querySelector("#employee-email-" + id);
            if (employeeEmail) {
                employeeEmail.textContent = response.data.employee.email;
            }
            var employeeAddress = tr.querySelector("#employee-address-" + id);
            if (employeeAddress) {
                employeeAddress.textContent = response.data.employee.address;
            }
            var employeePhone = tr.querySelector("#employee-phone-" + id);
            if (employeePhone) {
                employeePhone.textContent = response.data.employee.phone;
            }
            var employeeSalary = tr.querySelector("#employee-salary-" + id);
            if (employeeSalary) {
                employeeSalary.textContent = response.data.employee.salary;
            }
            var employeeJobTitle = tr.querySelector(
                "#employee-job_title-" + id
            );
            if (employeeJobTitle) {
                employeeJobTitle.textContent = response.data.employee.job_title;
            }
            toastr.success(response.data.message);
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
}
