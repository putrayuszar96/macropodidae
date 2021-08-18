var baseUrl = 'http://localhost/arip/';

$(document).ready(function(){
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": false,
        "order": [],
        'ajax': {
            'type': 'POST',
            'url': baseUrl+'/controllers/rak.php?action=read',
            // 'data': function(d) {
            //     d.action = "fetch";
            // },
            'dataSrc': function(json) {
                if (json != null) {
                    if (json.status == 'ok') {
                        if (json.hasOwnProperty('data')) return json.data;
                        else return json;
                    } else {
                        if (json.hasOwnProperty('data')) {
                            console.log(json.data);
                        }
                        return '';
                    }
                } else return '';
            }
        },
        'sAjaxDataProp': '',
        'order': [
            [0, 'asc']
        ],
        'columnDefs': [{
                targets: [0, 1, 2, 3],
                visible: true
            },
            {
                targets: '_all',
                visible: false
            },
            {
                'targets': 0,
                'data': 'nama',
                'title': 'Nama Cabang',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? data : '-';
                }
            },
            {
                'targets': 1,
                'data': 'jumlah_level',
                'title': 'Jumlah Rak',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? 'Rak 1 - Rak '+data : '-';
                }
            },
            {
                'targets': 2,
                'data': 'jumlah_sublevel',
                'title': 'Jumlah Sub Rak',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? 'Subrak x.1 - Subrak x.'+data : '-';
                }
            },
            {
                'targets': 3,
                'data': 'id_rak',
                'title': 'Action',
                'render': function(data, type, row, meta) {
                    var output = `
                            <button type="button" id="update_rak" data-id="${data}" class="btn btn-info btn-sm">Ubah</button>
                            <button type="button" id="delete_rak" data-id="${data}" class="btn btn-danger btn-sm">Hapus</button>
                        `;
                    return output;
                }
            }
        ]
    });
})

function drawDatatable(){
    $.ajax({
        url: baseUrl + "/controllers/rak.php?action=read",
        type: "POST",
        dataType: 'json',
        success: function(response){
            if(response.data.length > 0){
                let result = response.data

                result.forEach(rak => {
                    let row = '';
                    
                    row += '<td>'+rak.nama+'</td>';
                    row += '<td>'+rak.jumlah_level+' (Rak 1 - Rak'+rak.jumlah_level+')</td>'
                    row += '<td>'+rak.jumlah_sublevel+' (Sub Rak 1 - Sub Rak'+rak.jumlah_sublevel+')</td>'
                    row += '<td><a href="update_rak.php?id='+rak.id_rak+'"><i class="fa fa-pencil"></i></a></td>'
                });
            }
        }
    })
}