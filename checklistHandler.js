$(document).ready(function() {

    getData();
    addItem();
    addChecklist();
    updateTitle();
});


function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (o.scrollHeight)+"px";

}

function addItem() {
    var $addButton = $('.add-item');
    $addButton.on('click',function (e) {
        e.stopImmediatePropagation();
        var des = 'task';
        var $checklistId = $(this).attr('id');
        console.log($checklistId);
        $.ajax({
            method: 'POST',
            url: 'addItem.php?' + 'description=' + des + '&ref=' + $checklistId,
            data: 'description=' + des,
            success: function () {
                window.location.reload();
            },
            error: function () {
            }
        })
    });
}

function addChecklist() {
    var $addCLButton = $('.add-checklist');
    $addCLButton.on('click',function () {
        var title = 'checklist';
        $.ajax({
            method: 'POST',
            url: 'addChecklist.php?' + 'title=' + title,
            data: 'description=' + title,
            success: function () {
                console.log('success');
                window.location.reload();
            },
            error: function () {
            }
        })
    });
}

function getData(){
    var cookie = Cookies.get('numList')
    for (var i = 1;i <= cookie; i++) {
        var $id = i;
        getDataSupport($id);
    }
}

function getDataSupport($id) {
    $.ajax({
        url: 'getItem.php?id=' + $id,
        success: function (html) {
            var show = document.getElementById('check' + $id);
            $(show).find('ul').append(html);
        }
    });
}

function updateTitle($a, $val, $id) {
    console.log($id);
    $.ajax({
        method: 'POST',
        url: 'updateItem.php?' + 'description=' + $val + '&id=' + $id,
        data: 'description=' + $val + '&id=' + $id,
        success: function () {

        },
        error: function () {
        }
    })
}

function updateChecklist($a, $val, $id) {
    console.log($id);
    $.ajax({
        method: 'POST',
        url: 'updateChecklist.php?' + 'title=' + $val + '&id=' + $id,
        data: 'title=' + $val + '&id=' + $id,
        success: function () {

        },
        error: function () {
        }
    })
}

function deletChecklist($id) {
    console.log($id);
    $.ajax({
        method: 'POST',
        url: 'deletChecklist.php?' + '&id=' + $id,
        data: '&id=' + $id,
        success: function () {

        },
        error: function () {
        }
    })
}
