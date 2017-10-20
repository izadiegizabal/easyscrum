$( document ).ready(function() {
    // SCRUM BOARD

    // Init Modal
    $('.modal').modal();
    // Init selects
    $('select').select();

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