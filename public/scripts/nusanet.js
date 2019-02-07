get_data_router();
function get_data_router() {
    $.ajax({
        url: base_url + 'API/RouterData',
        method: 'POST',
        datatype: 'JSON',
        success: function (final) {
            var final = JSON.parse(final);
            $('#val-hdd').html(final[0]['hdd']);
            $('#val-hdd').val(final[0]['hdd']);

            $('#val-memory').html(final[0]['memory']);
            $('#val-memory').val(final[0]['memory']);

            $('#val-cpu').html(final[0]['cpu']);
            $('#val-cpu').val(final[0]['cpu']);
                        
            get_data_router();
        },
        error: function (final) {
            console.error('gagal');
        }
    });
}

get_data_server();
function get_data_server() {
    $.ajax({
        url: base_url + 'API/ServerData',
        method: 'POST',
        datatype: 'JSON',
        success: function (final) {
            var final = JSON.parse(final);
            $('#val-hdd2').html(final[0]['hdd']);
            $('#val-hdd2').val(final[0]['hdd']);

            $('#val-memory2').html(final[0]['memory']);
            $('#val-memory2').val(final[0]['memory']);

            $('#val-cpu2').html(final[0]['cpu']);
            $('#val-cpu2').val(final[0]['cpu']);
                        
            get_data_server();
        },
        error: function (final) {
            var x = "Error";
            console.error('gagal');
            $('#val-hdd').html(x);
            $('#val-hdd').val(x);

            $('#val-memory').html(x);
            $('#val-memory').val(x);

            $('#val-cpu').html(x);
            $('#val-cpu').val(x);
        }
    });
}

// get_interface(); 
// function get_interface() {

//     $.ajax({
//         url: base_url + 'API/InterfaceData',
//         method: 'POST',
//         datatype: 'JSON',
//         success: function (final) {
//             var final = JSON.parse(final);
            
//             console.log("Ikko",final[0].data[0]);
//             series.addPoint([x,final[0].data[0]], true, true);          
//         },
//         error: function (final) {
//             console.error('gagal');
//         }
//     });
        
// }

