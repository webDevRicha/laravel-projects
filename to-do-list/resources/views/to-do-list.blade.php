<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To do list</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mainstylesheet.css') }}">

  <script type="text/javascript" src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/font-awesome/js/all.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</head>
<body>

  <div class="container">
    <h1 align="center">Todo List</h1>

    <div class="row">
      <!-- Input box -->
      <div class="col-md-7">

        <div class="form-group">
          <label for="new-task">New Task</label>
          <input type="text" class="form-control" id="new_task"
                 placeholder="Enter the name of the task">
          <small id="newTaskHelp" class="form-text text-muted">A short one line description of your task</small>
        </div>
      </div>

      <!--  Buttons -->
      <div class="col-md-5">
        <div class="row">
          <div class="col-6 col-sm-3 col-md-6 p-1">
            <button class="btn btn-success col w-100" id="btn_add">
              <i class="fas fa-plus-square"></i> Add
            </button>
          </div>
          <div class="col-6 col-sm-3 col-md-6  p-1">
            <button class="btn btn-danger col w-100" id="btn_reset">
              <i class="fas fa-backspace"></i> Reset
            </button>
          </div>
          <div class="col-6 col-sm-3 col-md-6  p-1">
            <button class="btn btn-info col w-100" id="btn_sort">
              <i class="fas fa-sort-amount-down"></i> Sort
            </button>
          </div>
          <div class="col-6 col-sm-3 col-md-6  p-1">
            <button class="btn btn-warning col w-100" id="btn_cleanup">
              <i class="fas fa-trash-alt"></i> Cleanup
            </button>
          </div>
        </div>

      </div>
    </div>

    <!-- Task List -->

    <table class="row list-group m-2" id="tasks_tbl">
      <thead>
        <tr>
            <th>Task</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody id="tasks_list">
      </tbody>
    </table>
  </div>

</body>
</html>
