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

    // Init Datepicker
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
        container: 'body',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });


   
    $('.create_schedule').click(function (e) {
        var title = $('.event-title').val();
        var date = $('.event-date').val();
        var time = $('.event-time').val();
        var desc = $('.event-desc').val();

        var datetime = date + " " + time + ":00";
        console.log(datetime);
        $.ajax({
            method: 'POST',
            url: 'add-event.php?' + 'title=' + title + '&date=' + datetime + '&desc=' + desc,
            data: 'title=' + title + '&date=' + date + '&desc=' + desc,
            success: function () {                
                window.location.reload();
            },
            error: function () {
            }
        })
    });


});