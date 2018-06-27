<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>

        body, * {
            font-size: 16px;
            margin: 0;
            padding: 0;
        }


        h2, p {
            color: black;
        }

        .container {
            margin-top: 40px;
            background-color: linen;
            height: auto;
        }

        .noteText {
            max-height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .modal-content {
            color: black;
        }

        .modal-title {
            font-size: 300%;
            height: 80px;
            resize: none;
            background-color: lightgrey;
            border: none;
        }

        #modalText {
            width: 470px;
            height: 400px;
            resize: none;
            background-color: lightgrey;
            border: none;
        }

        #newNote {
            margin-bottom: 30px;
        }

        textarea { resize: both; }

        #logOut {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Привет <?php echo $this->user_name; ?></h1>
    <button class="btn btn-secondary" id="logOut">log out</button>
    <div class="row">
        <button class="btn btn-warning" id="newNote" >New note</button>
    </div>
    <div id='test' class="row">

    </div>
</div>

<div class="modal fade" id="modalWindow" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="ModalType" data-type="">
                <textarea autofocus class="modal-title" id="modalTitle">Modal title</textarea>
            </div>
            <div class="modal-body">
                <textarea id="modalText"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="deleteNote" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id='save' type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="script.js"></script>

</body>
</html>