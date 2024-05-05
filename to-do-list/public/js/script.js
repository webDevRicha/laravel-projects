$(document).ready(function () {
    displayList();
    function displayList(){
        $.ajax({
            url: "/list",
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $('#tasks_list').find("tr").remove();
                console.log(response.data);
                $.each(response.data, function (key, value) {
                    $('#tasks_list').append("<tr><td><input type='text' value='"+value.task+"' class='task-input' disabled></td><td><button id='btn_edit' data-id="+value.id+">Edit</button><button id='btn_delete' data-id="+value.id+">Delete</button></td></tr>");
                })
            },
        });
    }

    function updateTask(id, task){
        var url="";
        if(id==0){
            url = "/add";
        }else{
            url = "/update"
        }
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
                new_task: task,
            },
            success: function (response) {
                displayList();
            },
        });
    }

    function deleteTask(id){
        var  url = "/delete";
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
            },
            success: function (response) {
                displayList();
            },
        });
    }

    $(document).on("click", "#btn_add", function () {
        console.log("Add button click");
        var id = 0;
        var task =  $(document).find("#new_task").val();
        updateTask(id,task);
    });

    $(document).on("click", "#btn_edit", function () {
        console.log("Edit button click");
        $(this).closest("tr").find(".task-input").removeAttr('disabled');
        $(this).removeAttr("id").attr("id",'btn_update');
        $(this).text("Save");
    });

    $(document).on("click", "#btn_update", function () {
        var id = $(this).attr("data-id");
        var task = $(this).closest("tr").find(".task-input").val();
        updateTask(id,task);
    });
    $(document).on("click", "#btn_sort", function () {
        console.log("Sort button click");
    });

    $(document).on("click", "#btn_delete", function () {
        console.log("Delete button click");
        var id = $(this).attr("data-id");
        deleteTask(id);
    });
});
