$( document ).ready(function() {
    // SCRUM BOARD

    // Init Modal
    $('.modal').modal();
    // Init selects
    $('select').select();

    $('.open_modal').click(function() {
        var id = $(this).attr('id');
        $('.save_modal').attr("id", id);
        /*$('.update_modal').attr("id", id);*/
        $(".modal-title").val('');
        $(".modal-description").val('');
        $(".modal-reason").val('');
        $(".modal-estimate").val('');
        $(".modal-value").val('');
    });

     $(document.body).on('click', '.delete-us', function () {
        var $id = $(this).attr('id');
        $.ajax({
            method: 'POST',
            url: 'delete.php?' + 'id=' + $id,
            data: 'id=' + $id,
            success: function () {
                console.log('success');
                window.location.reload();
            },
            error: function () {
            }
        })
    });

    $('.modal-detail').click(function() {
        var id = $(this).attr('id');
        $('.update_modal').attr("id", id);
        $('.delete-us').attr("id", id);
        $.ajax({
            method: 'GET',
            url: 'modal_details.php?' + 'id=' + id,
            success: function (html) {          
                $(html).appendTo(document.body);
            },
            error: function () {
            }
        })
    });

    $('.save_modal').click(function() {
        var id = $(this).attr('id');
        var title = $('.modal-title').val();
        var des = $('.modal-description').val();
        var reas = $('.modal-reason').val();
        var es = $('.modal-estimate').val();
        var val = $('.modal-value').val();

         $.ajax({
            method: 'POST',
            url: 'create.php?' + 'id=' + id + '&title=' + title + '&description=' + des + '&reason=' + reas + '&estimate=' + es + '&val=' + val,
            data: 'id=' + id + '&title=' + title + '&description=' + des + '&reason=' + reas + '&estimate=' + es + '&val=' + val,
            success: function () {
                window.location.reload();
            },
            error: function () {
            }
        })
    });

    $('.update_modal').click(function() {
        var id = $(this).attr('id');
        var title = $('.modal-title1').val();
        var des = $('.modal-description1').val();
        var reas = $('.modal-reason1').val();
        var es = $('.modal-estimate1').val();
        var val = $('.modal-value1').val();

         $.ajax({
            method: 'POST',
            url: 'update.php?' + 'id=' + id + '&title=' + title + '&description=' + des + '&reason=' + reas + '&estimate=' + es + '&val=' + val,
            data: 'id=' + id + '&title=' + title + '&description=' + des + '&reason=' + reas + '&estimate=' + es + '&val=' + val,
            success: function () {
                window.location.reload();
            },
            error: function () {
            }
        })
    });

    var draggableOptions = {
        cancel: "a.ui-icon",
        revert: true,
        cursor: "move",
        revertDuration: 0
    }
    $('.card-task').draggable(draggableOptions, {
        drag: function () {
            $(this).css("z-index", "1");
        }
    });

    $('.fc-event-container').draggable({
    revert: true,      // immediately snap back to original position
    revertDuration: 0  //
    });

    $('.mycard').droppable();

     var codes = {
        "1": "#1",
        "2": "#2",
        "3": "#3",
        "4": "#4",
        "5": "#5",

    }
    $.each(codes, function (index, value) {
        $('.mycard').droppable({
            drop: function (event, ui) {
                var element = ui.draggable;
                $(this).append(element);
                var id = $(this).attr('id');
                $(element).children().attr('id', id);
                $(element).css("z-index", "0");
                var task_id = $(element).attr('id');
                var card_id = $(this).parent().attr('id');
                $.ajax({
                    method: 'POST',
                    url: 'update_ref.php?' + 'id=' + task_id + '&cardId=' + card_id,
                    cache: false,
                    data: 'id=' + task_id + '&cardId=' + card_id,
                    success: function () {
                        console.log('success');
                    },
                    error: function () {
                    }
                });
            }
        });
    });




/*
    // CHECKLIST
    // Add a new item
    $(document.body).on('click', '.add-item', function(){

        // The number of the current checklist
        var cl_id = $(this).parent().parent().parent().parent().children().length - 1;

        // The number of the new item (task)
        var new_id = $(this).parent().parent().children().length;

        // Add a new item to the list with the correct number of the task cl_id.new_id
        $(this).parent().before('<li class="row" id="item'+cl_id + "." + new_id+'"><div class="col s2"><p class="checkbox-item"><input type="checkbox" class="filled-in filled-in-item" id="filled-in-box-task'+cl_id + "." +new_id+'"/><label for="filled-in-box-task'+cl_id + "." +new_id+'"></label></p></div><div class="col s8 input-field"><input placeholder="Task" id="task'+cl_id + "." +new_id+'" type="text" class="large"><label for="task'+cl_id + "." +new_id+'"></label></div><div class="col s2"><p><i class="material-icons delete-item">delete</i></p></div></li>');
    });

    //Add new checklist
    $('#new-chk-bt').on('click', function () {

        //Find the number of the new checklist
        var new_cl_id = $(this).parent().parent().children().length;

        //Add the new checklist before the "+ New Checklist" button
        $(this).parent().before('<div class="col s12 m5 offset-m1 z-depth-2 checklist" id="checklist'+ new_cl_id +'"><div class="checklist-header white-text blue row"><div class="col s2"><p><i class="material-icons title-check">check</i></p></div><div class="col s8 input-field checklist-title"><input value="Checklist" id="checklist-title'+ new_cl_id +'" type="text" class="checklist-title-input"><label for="checklist-title'+ new_cl_id +'"></label></div><div class="col s2"><p><i class="material-icons trash-checklist">delete</i></p></div></div><ul class="checklist-body row"><li class="row" id="item'+ new_cl_id +'.1"><div class="col s2"><p class="checkbox-item"><input type="checkbox" class="filled-in filled-in-item" id="filled-in-box-task'+ new_cl_id +'.1" /><label for="filled-in-box-task'+ new_cl_id +'.1"></label></p></div><div class="col s8 input-field"><input placeholder="Task" id="task'+ new_cl_id +'.1" type="text" class="large"><label for="task'+ new_cl_id +'.1"></label></div><div class="col s2"><p><i class="material-icons delete-item">delete</i></p></div></li><li class="row"><p class="add-item grey-text">+ Add an Item</p></li></ul></div>');
    });


    // Click on a item trash  button to hide the current list item
    $(document.body).on('click', '.delete-item', function () {
        console.log('hello');
    });

    // Click on a checklist trash button to hide the current checklist
    $(document.body).on('click', '.trash-checklist', function () {
        var div = this.parentNode.parentNode.parentNode.parentNode;
        div.style.display = "none";
    });

    //Click on a checkbox to strikethrough the task
    $(document.body).on('click', '.filled-in-item', function () {
        var div = this.parentNode.parentNode.nextElementSibling;
        div.classList.toggle("strikethrough");

		//Not allowed to change strikethrough task
		$('.strikethrough input[type="text"]').prop('disabled',true);
    });
*/
});