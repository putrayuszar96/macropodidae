const baseUrl = 'http://localhost/arip'

$(document).ready(function(){
    ambilKantorCabang();

    $('#kantor-cabang').on('change', function () {
        let cabangValue = $(this).val();
        let cabangLabel = $('option:selected', this).data('label')

        if($('#tampilan-divisi').hasClass('d-none') == true){
            $('#tampilan-divisi').removeClass('d-none');
        }else{
            $('#tampilan-divisi').addClass('d-none');
        }

        $('#form-kantor-cabang-hidden').val(cabangValue);
        $('#form-kantor-cabang').val(cabangLabel);

        ambilKepemilikanRak(cabangValue);
    });

    $('#btn-tambah-divisi').on('click', function () {
        $('#tambah-divisi').modal('show');
    });
})

function ambilKantorCabang() {
    $.ajax({
        type: 'POST',
        url: baseUrl+'/controllers/cabang.php?action=read',
        dataType: 'json',
        success: function (response) {
            if(response.status == 'ok'){
                let data = response.data;
                let option = ''

                data.forEach(cabang => {
                    option += '<option value="'+cabang.id_cabang+'" data-label="'+cabang.nama+'">'+cabang.nama+'</option>';
                });

                $('#kantor-cabang').append(option);
            }else{
                alert('Tidak ada cabang yang ditemukan! Harap menambahkan cabang terlebih dahulu!')
            }
        }
    })
}

function ambilKepemilikanRak(cabang) {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": false,
        "order": false,
        'ajax': {
            'type': 'POST',
            'url': baseUrl+'/controllers/kepemilikan.php?action=read',
            'data': function(d) {
                d.cabang = cabang;
            },
            'dataSrc': function(json) {
                if (json != null) {
                    if (json.status == 'ok') {
                        if (json.hasOwnProperty('data')) return json.data;
                        else return json;
                    } else {
                        if (json.hasOwnProperty('data')) {
                            
                        }
                        return '';
                    }
                } else return '';
            }
        },
        'sAjaxDataProp': '',
        'columnDefs': [{
                targets: [0, 1, 2, 3, 4],
                visible: true
            },
            {
                targets: '_all',
                visible: false
            },
            {
                'targets': 0,
                'data': 'nama_divisi',
                'title': 'Nama Divisi',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? data : '-';
                }
            },
            {
                'targets': 1,
                'data': 'jumlah_rak',
                'title': 'Jumlah Rak',
                'render': function(data, type, row, meta) {
                    return data;
                }
            },
            {
                'targets': 2,
                'data': 'urutan_rak',
                'title': 'Urutan Rak',
                'render': function(data, type, row, meta) {
                    return data.rak_mulai + ' sampai ' + data.rak_akhir
                }
            },
            {
                'targets': 3,
                'data': 'rak_tambahan',
                'title': 'Rak Tambahan',
                'render': function(data, type, row, meta) {
                    return data
                }
            },
            {
                'targets': 4,
                'data': 'id_divisi',
                'title': 'Action',
                'render': function(data, type, row, meta) {
                    var output = `
                            <button type="button" id="update_divisi" data-id="${data}" class="btn btn-info btn-sm">Ubah</button>
                            <button type="button" id="delete_divisi" data-id="${data}" class="btn btn-danger btn-sm">Hapus</button>
                        `;
                    return output;
                }
            }
        ]
    });
}