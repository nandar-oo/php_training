$.ajax({
    type: "GET",
    url: "http://127.0.0.1:8000/api/students",
    dataType: "json",
    success: function (result) {
        result.forEach((student) => {
            $("tbody").append(
                `<tr><td>${student.id}</td><td>${student.name}</td>
                            <td>${student.email}</td><td>${student.major_name}</td>
                            <td>${student.city}</td>
                            <td>
                <a href="students/edit/${student.id}"><button class="btn"><i class="fas fa-edit text-primary"></i></button></a>
                <button onclick="deleteStudent(${student.id})" class="btn"><i class="fas fa-trash-alt text-danger"></i></button>
                </td>
                            </tr>`
            );
        });
    },
});

function addStudent() {
    var student = {
        name: $("#name").val(),
        email: $("#email").val(),
        major: $("#major").val(),
        city: $("#city").val(),
    };

    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/api/students",
        data: student,
        dataType: "json",
        success: function (result) {
            if (result.fail) {
                $(".message").append(
                    `<div class="alert alert-warning alert-dismissible fade show" role="alert">${result.fail}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
                );
            }
            if (result.success) {
                $(".message").append(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">${result.success}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
                );
                window.location.href = "http://127.0.0.1:8000/api-view/students";
            }
        },
    });
}

$(function () {
    var id = window.location.pathname.split("/")[4];
    if (id != null) {
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/api/students/" + id,
            dataType: "json",
            success: function (result) {
                var majors = result.majors;
                var student = result.student;
                $('#name').val(student.name);
                $('#email').val(student.email);
                majors.forEach(item => {
                    if (item.id == student.major_id) {
                        $('#major').append(`<option value="${item.id}" selected>${item.name}</option>`);
                    } else {
                        $('#major').append(`<option value="${item.id}">${item.name}</option>`);
                    }
                });
                $('#city').val(student.city);
            },
        });
    }

})

function updateStudent(id) {
    var id = $("#student_id").val();
    var student = {
        name: $("#name").val(),
        email: $("#email").val(),
        major: $("#major").val(),
        city: $("#city").val(),
    };
    var url = "http://127.0.0.1:8000/api/students/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: student,
        dataType: "json",
        success: function (result) {
            if (result.fail) {
                $(".message").append(
                    `<div class="alert alert-warning alert-dismissible fade show" role="alert">${result.fail}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
                );
            }
            if (result.success) {
                $(".message").append(
                    `<div class="alert alert-success alert-dismissible fade show" role="alert">${result.success}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
                );
                window.location.href = "http://127.0.0.1:8000/api-view/students";
            }

        },
    });
}

function deleteStudent(id) {
    if (confirm("Are you sure you want to delete this record?") == true) {
        var url = "http://127.0.0.1:8000/api/students/" + id;
        $.ajax({
            type: "DELETE",
            url: url,
            dataType: "json",
            success: function (result) {
                if (result.success) {
                    location.reload();
                    alert(result.success);
                }
            },
        });
    }
}
