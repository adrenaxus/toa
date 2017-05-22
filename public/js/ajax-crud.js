$(document).ready(function(){

    var url = "/toa/public/characters";

    //display modal form for character editing
    $('.open-modal').click(function(){
        var character_id = $(this).val();

        $.get(url + '/' + character_id, function (data) {
            //success data
            console.log(data);
            $('#character_id').val(data.id);
            $('#character').val(data.character);
            $('#name').val(data.name);
            $('#description').val(data.description);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new character
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmCharacters').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete character and remove it from list
    $('.delete-character').click(function(){
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })    
    
        var character_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + character_id,
            success: function (data) {
                console.log(data);

                $("#character" + character_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new character / update existing character
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            character: $('#character').val(),
            user_id: $('#user_id').val(),
            name: $('#name').val(),
            description: $('#description').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var character_id = $('#character_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + character_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var character = '<tr id="character' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';
                character += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                character += '<button class="btn btn-danger btn-xs btn-delete delete-character" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#characters-list').append(character);
                }else{ //if user updated an existing record

                    $("#character" + character_id).replaceWith( character );
                }

                $('#frmCharacters').trigger("reset");

                $('#myModal').modal('hide');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});