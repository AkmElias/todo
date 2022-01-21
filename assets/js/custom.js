$(document).ready(function (){

  $('#add-button').on('click', function (e){
      e.preventDefault();
      if($('#task-input').val() !== ''){
          const action = "insert";
          const task_title = $('#task-input').val();
          const task_status = "in_progress";

          $.ajax({
              method: "POST",
              url: "includes/Actions/Action.php",
              data: {
                  'action' : action,
                  'task_title': task_title,
                  'task_status': task_status
              },
              success: function (response) {
                  console.log('task title added: ', response);
                  $('#add-form')[0].reset();
                  load_tasks();
              }
          })
      }
  })

    $('.delete-item').on('click', '.delete-item', function (e){
        setTimeout(function (){
            $.ajax({
                method: 'POST',
                url: "includes/Actions/Action.php",
                data: {
                    'action': 'delete',
                    'id': 1
                },
                success: function (response) {
                    console.log(response)
                    load_tasks();
                },
                error: function (error) {
                    console.log(error);
                }
            })
        },500)
    })

    $('.delete-item').on('click', '.done-delete-item', function (e){
        setTimeout(function (){
            $.ajax({
                method: 'POST',
                url: "includes/Actions/Action.php",
                data: {
                    'action': 'delete',
                    'id': 1
                },
                success: function (response) {
                    console.log(response)
                    load_tasks();
                },
                error: function (error) {
                    console.log(error);
                }
            })
        },500)
    })

    $(document).on('click', 'done-icon', function (e){
        setTimeout(function (){
            $.ajax({
                method: 'POST',
                url: "includes/Actions/Action.php",
                data: {
                    'action': 'update',
                    'id': $(this)
                },
                success: function (response) {
                    console.log(response);
                    load_tasks();
                },
                error: function (error) {
                    console.log(error);
                }
            })
        },500)
    })

    function load_tasks(){
      setTimeout(() => {
          $.ajax({
              type: 'POST',
              url: 'includes/Actions/Action.php',
              data: {
                  'action': "load",
                  fetch: 1
              },
              success:function(data){
                  // $('#table').html(data);
                  // console.log(data);
                  $('#todo-lists').html(data);
              },
              error: function (error) {
                  console.log(error);
              }
          });
      }, 500);

        setTimeout(() => {
            $.ajax({
                type: 'POST',
                url: 'includes/Actions/Action.php',
                data: {
                    'action': "load_done_tasks",
                    fetch: 1
                },
                success:function(data){
                    // $('#table').html(data);
                    console.log(data);
                    $('#done-lists').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, 500);
    }
})