const baseUrl = 'http://localhost/arip'

$(document).ready(function(){
    ambilKantorCabang();

    $('#kantor-cabang').on('change', function () {
        let cabangValue = $(this).val();
        let cabangLabel = $('option:selected', this).data('label')

        if($('#tampilan-barang').hasClass('d-none') == true){
            $('#tampilan-barang').removeClass('d-none');
        }else{
            $('#tampilan-barang').addClass('d-none');
        }

        $('#form-kantor-cabang-hidden').val(cabangValue);
        $('#form-kantor-cabang').val(cabangLabel);

        ambilBarang(cabangValue);
        ambilDivisi(cabangValue);
    });

    $('#btn-tambah-barang').on('click', function () {
        $('#tambah-barang').modal('show');
    });

    $('#btn-kenmbalikan-barang').on('click', function () {
        $('#kembalikan-barang').modal('show');
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

function ambilBarang(cabang) {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": false,
        "order": false,
        'ajax': {
            'type': 'POST',
            'url': baseUrl+'/controllers/barang.php?action=read',
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
                targets: [0, 1, 2, 3, 4, 5],
                visible: true
            },
            {
                targets: '_all',
                visible: false
            },
            {
                'targets': 0,
                'data': 'nama_barang',
                'title': 'Nama Barang',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? data : '-';
                }
            },
            {
                'targets': 1,
                'data': 'asal_barang',
                'title': 'Divisi',
                'render': function(data, type, row, meta) {
                    let code = ''

                    code +='<span class="d-block">Divisi: '+data.divisi+'</span>' 
                    code +='<span class="d-block">Kantor Cabang: '+data.cabang+'</span>' 

                    return code;
                }
            },
            {
                'targets': 2,
                'data': 'uploader',
                'title': 'Uploader',
                'render': function(data, type, row, meta) {
                    return (data != null && data != 'null' && data != '') ? data : '-';
                }
            },
            {
                'targets': 3,
                'data': 'rak_posisi',
                'title': 'Posisi Barang',
                'render': function(data, type, row, meta) {
                    let posisi = data.split(",")
                    let result = 'Rak ';

                    let mulai = '' + posisi[0];
                    while(mulai.length < 3){
                        mulai = '0' + mulai
                    }

                    let akhir = '' + posisi[1];
                    while(akhir.length < 3){
                        akhir = '0' + akhir
                    }

                    return result + mulai + '.' + akhir;
                }
            },
            {
                'targets': 4,
                'data': 'status_pinjam',
                'title': 'Status Barang',
                'render': function(data, type, row, meta) {
                    let result = '';
                    if(data == 1){
                        result = 'Tersedia'
                    }else{
                        result = 'Dipinjam'
                    }

                    return result;
                }
            },
            {
                'targets': 5,
                'data': 'action',
                'title': 'Action',
                'render': function(data, type, row, meta) {
                    var output = `<button type="button" id="update_barang" data-id="${data.uuid_barang}" class="btn btn-warning btn-sm d-block"><i class="fa fa-edit"></i></button>`
                    
                    if(data.status_pinjam == 1){
                        output += `<button type="button" id="btn-pinjam-barang" data-id="${data.uuid_barang}" class="btn btn-success btn-sm d-block my-2"><i class="fa fa-sign-out-alt"></i></button>` 
                    }else{
                        output += `<button type="button" id="btn-kembalikan-barang" data-id="${data.uuid_barang}" class="btn btn-info btn-sm d-block my-2"><i class="fa fa-sign-in-alt"></i></button>` 
                    }
                    output += `<button type="button" id="delete_barang" data-id="${data.uuid_barang}" class="btn btn-danger btn-sm d-block"><i class="fa fa-trash"></i></button>`;
                    
                    return output;
                }
            }
        ]
    });
}

function ambilDivisi(cabang){
    $.ajax({
        type: 'POST',
        url: baseUrl+'/controllers/kepemilikan.php?action=read',
        data: {
            cabang: cabang,
        },
        dataType: 'json',
        success: function (response) {
            if(response.status == 'ok'){
                let divisi = response.data
                let options = ''
                
                divisi.forEach(divi => {
                    options += '<option data-mulai="'+divi.urutan_rak.rak_mulai_raw+'" data-akhir="'+divi.urutan_rak.rak_akhir_raw+'" data-sublevel="'+divi.jumlah_sublevel+'" value="'+divi.id_divisi+'">'+divi.nama_divisi+'</option>'
                });

                $('#divisi').append(options)
            }else{

            }
        }
    })
}

function membuatDaftarRak(mulai, akhir, sublevel){
    let result = '';

    let mulai_raw = mulai.split(',')
    let akhir_raw = akhir.split(',')
    
    for(let i = mulai_raw[1]; i <= sublevel; i++){
        let string_rak = '' + mulai_raw[0];
        let string_subrak = '' + i;

        while(string_rak.length < 3){
            string_rak = '0' + string_rak
        }

        while(string_subrak.length < 3){
            string_subrak = '0' + string_subrak
        }

        result += '<option value="'+mulai_raw[0]+','+i+'">Rak '+string_rak+'.'+string_subrak+'</option>'
    }

    for(let i = (parseInt(mulai_raw[0]) + 1); i < akhir_raw[0]; i++){
        let string_rak = '' + i;

        while(string_rak.length < 3){
            string_rak = '0' + string_rak
        }

        for(let j = 1; j <= sublevel; j++){
            let string_subrak = '' + j;

            while(string_subrak.length < 3){
                string_subrak = '0' + string_subrak
            }

            result += '<option value="'+mulai_raw[0]+','+i+'">Rak '+string_rak+'.'+string_subrak+'</option>'
        }
    }

    for(let i = 1; i <= akhir_raw[1]; i++){
        let string_rak = '' + akhir_raw[0];
        let string_subrak = '' + i;

        while(string_rak.length < 3){
            string_rak = '0' + string_rak
        }

        while(string_subrak.length < 3){
            string_subrak = '0' + string_subrak
        }

        result += '<option value="'+akhir_raw[0]+','+i+'">Rak '+string_rak+'.'+string_subrak+'</option>'
    }

    $('#rak').html(result)
}

$('#submit-form-divisi').on('click', function () {
    $('#form-loading').removeClass('d-none');

    let kantor_cabang = $('#form-kantor-cabang-hidden').val()
    let divisi = $('#divisi').val()
    let nama_barang = $('#nama-barang').val()
    let rak = $('#rak').val()
    let uploader = $('#uploader').val()
    let status_pinjam = $('#status-pinjam').val()

    $.ajax({
        type: 'POST',
        url: baseUrl+'/controllers/barang.php?action=create',
        data: {
            kantor_cabang: kantor_cabang,
            divisi: divisi,
            nama_barang: nama_barang,
            rak: rak,
            uploader: uploader,
            status_pinjam: status_pinjam
        },
        dataType: 'json',
        success: function (response) {
            if(response.status == 'ok'){
                $('#form-loading').addClass('d-none');
                $('#form-success').removeClass('d-none');

                setTimeout(function () {
                    $('#tambah-barang').modal('hide');
                    location.reload()
                }, 1000)
            }else{
                $('#form-loading').addClass('d-none');
                $('#form-failed').removeClass('d-none');
            }
        }
    })
})

$('#divisi').on('change', function(){
    let mulai = $('option:selected', this).data('mulai')
    let akhir = $('option:selected', this).data('akhir')
    let sublevel = $('option:selected', this).data('sublevel')

    membuatDaftarRak(mulai, akhir, sublevel)
})

$(document).on('click', '#btn-pinjam-barang', function(){
    let uuid_barang = $(this).data('id');

    $('#pinjam-barang').modal('show');
    $('#form-uuid-barang').val(uuid_barang);
});

$('#submit-form-pinjam').on('click', function () {
    $('#form-loading-pinjam').removeClass('d-none');

    let uuid_barang = $('#form-uuid-barang').val()
    let peminjam = $('#peminjam').val()
    let tanggal_pinjam = $('#tanggal-pinjam').val()
    
    $.ajax({
        type: 'POST',
        url: baseUrl+'/controllers/barang.php?action=pinjam',
        data: {
            uuid_barang: uuid_barang,
            peminjam: peminjam,
            tanggal_pinjam: tanggal_pinjam,
        },
        dataType: 'json',
        success: function (response) {
            if(response.status == 'ok'){
                $('#form-loading-pinjam').addClass('d-none');
                $('#form-success-pinjam').removeClass('d-none');

                setTimeout(function () {
                    $('#pinjam-barang').modal('hide');
                    location.reload()
                }, 1000)
            }else{
                $('#form-loading-pinjam').addClass('d-none');
                $('#form-failed-pinjam').removeClass('d-none');
            }
        }
    })
})