$(document).ready(function () {
    console.log("Javascript call");
    $(document).on("click", "#btn_add", function () {
        console.log("Add button click");
        console.log($('meta[name="csrf-token"]').attr("content"));
        var new_task = $(document).find("#new_task").val();
        $.ajax({
            url: "/add",
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                new_task: new_task,
            },
            success: function (response) {
                console.log("Success");
            },
        });
    });

    $(document).on("click", "#btn_reset", function () {
        console.log("Reset button click");
    });

    $(document).on("click", "#btn_sort", function () {
        console.log("Sort button click");
    });

    $(document).on("click", "#btn_cleanup", function () {
        console.log("Cleanup button click");
    });
});
