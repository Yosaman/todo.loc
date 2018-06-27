function init() {
    $.post(
        "index.php",
        {
            "action": "init"
        },
        showNotes
    )
}

function showNotes(data) {
    data = JSON.parse(data);
    console.log(data);
    var out = '';
    for (var id in data) {
        out += `<div id="${data[id].id}" class="note col-md-4">`;
        out += `<p class="date">${data[id].date}</p>`;
        out += `<h2>${data[id].title}</h2>`;
        out += `<p class="noteText">${data[id].note}</p>`;
        out += `<button data-id="${data[id].id}" type="button" class="btn btn-block btn-primary">More</button></div>`;
    }
    $('#test').html(out);
    $('.note').click(openModal);
}

function openModal() {
    let id = $(this).attr('id');
    var title = $(this).find('h2').html();
    $("#modalTitle").val(title);

    var note = $(this).find('.noteText').html();
    $("#modalText").val(note);

    $('#save').attr('data-id', id);
    $("#ModalType").attr('data-type', 'save')

    $("#modalWindow").modal();
};

function newModal() {
    $("#modalTitle").val(' ');

    $("#modalText").val(' ');

    $('#save').attr('data-id', 0);
    $("#ModalType").attr('data-type', 'new')

    $("#modalWindow").modal();
};

function sendModel() {
    $.post(
        "index.php",
        {
            "action": $("#ModalType").attr('data-type'),
            "id"    : $('#save').attr('data-id'),
            "title" : $("#modalTitle").val(),
            "note"  : $('#modalText').val(),
        },
        function () {
            init();
        }
    );

}

function deleteModel() {
    $.post(
        "index.php",
        {
            "action": "delete",
            "id"    : $('#save').attr('data-id'),
        },
        function () {
            $("#modalWindow").modal({backdrop: true});
            console.log('закрылось');
            init();
        }
    );

}


$(document).ready(function () {
    init();

    $('#deleteNote').click(deleteModel);
    $('#save').click(sendModel);
    $('#newNote').click(newModal);
    // $('.modal-title').attr('disabled', false);
    // $('.edit').click(editNote);
});