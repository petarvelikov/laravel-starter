$(document).ready(() => {

    $('#todos-grid-table')
        .on('init.dt', function () {
            $('#todos-grid-table').show();
            $('.loading-table-message').hide();
        })
        .DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Всички"]],
            "pagingType": "numbers",
            "columnDefs": [
                {
                    "orderable": false, targets: [5],
                }
            ],
            "order": [[0, "desk"]],
            "language": {
                "decimal": ".",
                "thousands": " ",
                "search": "Търси:",
                "lengthMenu": "Покажи _MENU_ записа на страница",
                "zeroRecords": "Нищо не е намерено",
                "loadingRecords": "Зареждане ...",
                "processing": "Обработване ...",
                "paginate": {
                    "first": "Първа",
                    "last": "Последна",
                    "next": "Следваща",
                    "previous": "Предишна"
                },
                "info": "Показване на страница _PAGE_ от _PAGES_ от общо: _MAX_ записа",
                "infoEmpty": "Няма налични записи",
                "infoFiltered": "(филтрирани: _TOTAL_)",
            }
        });



    // ====================================== Inline edit todo - Start ===========================================

    var todoEditActiveRowCount = 0;
    var editedTodoRow = null;

    $('.btn-edit-mode-show').on('click', function () {
        todoEditActiveRowCount++;
        if (todoEditActiveRowCount <= 1) {
            var btnEditAcive = $(this).prop('active');
            editedTodoRow = $(this).parent().parent();
            var editModeIsActive = editedTodoRow.find('.btn-edit-mode-save').css('display');

            if (editModeIsActive === 'none') {
                editedTodoRow.find('.normal-mode').css('display', 'none');
                editedTodoRow.find('.edit-mode').css('display', 'inline-block');
            } else {
                editedTodoRow.find('.normal-mode').css('display', 'inline-block');
                editedTodoRow.find('.edit-mode').css('display', 'none');
            }
        }
    });

    $('.btn-edit-mode-cancel').on('click', function () {
        editedTodoRow.find('.normal-mode').css('display', 'inline-block');
        editedTodoRow.find('.edit-mode').css('display', 'none');
        todoEditActiveRowCount = 0;
    });

    $('.btn-edit-mode-save').on('click', function () {
        var editedTodoRow = $(this).parent().parent();

        var editedTodoId = editedTodoRow.find('.todo-id').text();
        var editedTodoTitle = editedTodoRow.find('.todo-title').val();
        var editedTodoDescription = editedTodoRow.find('.todo-description').val();
        var editedTodoExpiredData = editedTodoRow.find('.todo-expired-data').val();
        var editedTodoExecuted = editedTodoRow.find('.todo-executed').val();


        if (editedTodoTitle === '' || editedTodoExpiredData === '') {
            editedTodoRow.find('.todo-title').css('border', '2px solid red');
        } else {
            $.ajax({
                method: "GET",
                url: "/ajax-todo-edit",
                data: {
                    editedTodoId,
                    editedTodoTitle,
                    editedTodoDescription,
                    editedTodoExpiredData,
                    editedTodoExecuted
                }
            });

            setTimeout(function () { location.reload(true); }, 500);

            editedTodoRow.find('.normal-mode').css('display', 'inline-block');
            editedTodoRow.find('.edit-mode').css('display', 'none');
            todoEditActiveRowCount = 0;
            editedTodoRow.find('td').addClass('bg-danger');
        }
    });

    // ======================================= Inline edit todo - End ==========================================


});
