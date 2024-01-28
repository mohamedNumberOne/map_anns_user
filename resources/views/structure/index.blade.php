@extends('layouts.app')

@section('title', 'Structure')

@section('content')
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Structure</h1>
        

           <div> 
                <a href="{{route('structure.create')}}" class="btn btn-sm btn-primary" >
                    <i class="fas fa-plus"></i> Ajouter nouveau
                </a>

                <a href="#"  class="btn  btn-success btn-elevate btn-icon-sm ml-2 btn-sm"  data-toggle="modal" data-target="#kt_modal_14">
                    <i class="la la-plus"></i>
                        Importer depuis Excel
                </a>

                <a href="#" class="btn btn-danger btn-elevate btn-icon-sm btn-sm ml-2" data-toggle="modal" data-target="#kt_modal_13">
                    <i class="la la-plus"></i>
                    Actualiser localisations
                </a>

               

          </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="modal fade" id="kt_modal_14"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Importer depuis Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form id="kt_form_2"  >
                        @csrf
                            <div class="modal-body">
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Excel  *:</label>
                                                <input type="file" class="form-control" name="excel_add" id="excel_add"
                                                    placeholder="" required
    
                                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" 
                                                    >
                                                <span class="form-text text-muted"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Type Structure *:</label>  
                                               
                                                <select class="form-control " id="id_typestructure"
                                               name="id_typestructure" required >
                                                @foreach($typestructures as $typestructure)
                                                <option value="{{$typestructure->id}}" >{{$typestructure->name}}</option>
                                                @endforeach
                                                    
                                                </select>
                                                <span class="form-text text-muted"></span>
                                            </div>
                                        </div>
                            </div>
                            <div class="modal-footer">
                            
                                <input type="hidden" class="form-control" name="id" id="id" >
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                <button type="button" class="btn btn-primary" id='importer_depuis_Excel_btn'>Oui</button>
                                
    
                            </div>
                   </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="kt_modal_13" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Actualiser localisations </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Voulez-vous vraiment mettre à jour la  liste des localisations sur map   ? 
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form id="kt_form_1"  >
                            @csrf
                        <input type="hidden" class="form-control" name="id" id="id" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="button" class="btn btn-primary"   id="refrach" >Oui</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Structure
                </h6>

            </div>
            <div class="card-body">
              

                <div class="kt-portlet__body">
					
                    <div class="row mb-3">
                        
                        

                        
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label><b>Type structures  :</b></label>
                            <select class="form-control  " name="typestructure" id='typestructure'>
                                <option  value="" ></option>
                                @foreach($typestructures as $typestructure)
                                        <option value="{{$typestructure->id}}" >{{$typestructure->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label><b>Wilaya  :</b></label>
                            <select class="form-control  " name="wilaya" id='wilaya'>
                                <option  value="" ></option>
                                @foreach($wilayas as $wilaya)
                                        <option value="{{$wilaya->id}}" >{{$wilaya->code}} - {{$wilaya->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label>Commune</label>
                            <select class="form-control select2  " id="commune" style="width:100% !important" required
                                        name="commune">
                            </select>
                        </div>

                    
                        

                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile ">
                            <label><b>Staut   :</b></label>
                            <select class="form-control  " name="status" id='status'>
                                <option  value="" ></option>
                                <option value="1">Actif</option>
                                <option value="2">En attente</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                          <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile ">
                            <label><b>Il possède une position  géographique   :</b></label>
                            <select class="form-control  " name="status_geo" id='status_geo'>
                                <option  value="" ></option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                    



                    </div>
                
                    
                    
					<table class="table table-striped- table-bordered table-hover responsive no-wrap table-checkable mt-3" width="100%" id="kt_table_1">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Nom</th>
								<th>Adress</th>
                                <th>Wilaya</th>
                                <th>Commune</th>
                                

                                <th>latitude</th>
                                <th>longitude</th>
								<th>Type structure</th>
								<th>Staut</th>   
                                <th>Ajouté Par</th>
                                <th>Date</th>
                                <th>date </th>
                                <th>Date</th>
                                <th>date </th>
                                 <th>date </th>
                                <th>Action</th>

                                
							</tr>
						</thead>
					</table>

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalExample"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body"> Voulez-vous vraiment supprimer ce structure? </div>
                                <div class="modal-footer"> 
                                    <form id="test-form"> 
                                        @csrf
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <button class="btn btn-info" type="button"  id='delete'>
                                        Oui
                                    </button>
                                    <input type="hidden" class="form-control" name="id" id="id" >
                                
                                    
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    
                


		       </div>
            </div>
        </div>

    </div>


@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('js/nv/dataTables.responsive.css') }}"/>
<link rel="stylesheet" href="{{ asset('js/nv/select2.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('js/nv/daterangepicker.css') }}"/>
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    b{
        color: black;
    }
    .form-control {
        color: black;
    }
    td{
        text-align: center;
    }
</style>

@endsection
@section('scripts')

<script type="text/javascript" src="{{ asset('js/nv/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nv/axios.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nv/sweetalert.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nv/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nv/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nv/daterangepicker.min.js') }}"></script>

<script type="text/javascript" language="javascript" src="{{ asset('js/nv/dataTables.buttons2.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/nv/jszip.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/nv/pdfmake2.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/nv/vfs_fonts2.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/nv/buttons.html5.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/nv/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/nv/jquery.validate.min.js') }}"></script>

<script>

   
    $('#type').change(function () {
                table1.draw();
    });
    $('#typestructure').change(function () {
                table1.draw();
    });
    $('#wilaya').change(function () {
                table1.draw();
                $('#commune').empty();  
    });
    
    $('#status').change(function () {
                table1.draw();
    });

    $('#commune').change(function () {
                table1.draw();
    });

    $("#commune").select2({
            placeholder: "",
            allowClear: true,
            ajax: {
                url: "{{ route('wilaya.getCommunes') }}",
                type: "post",

                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: '{{ csrf_token() }}',
                        status: 5,
                        wilaya_code:$("#wilaya").val(), // search term
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
    });

    $('#status_geo').change(function () {
                table1.draw();
    });

    
    
        var table1 = $('#kt_table_1').DataTable({
            
            dom: `<'row'<'col-sm-12 col-md-5 'Bl><'col-sm-12 col-md-7 'f>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
                buttons: [
                
                    {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                ],
            
                
                    responsive: true,
                    lengthMenu:[ [5, 10, 30 , 100 ,500, 1000 ], [5 , 10 , 30 ,500, 1000] ],
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    "order": [0, 'desc' ],
                    'ajax': {
                            type: 'POST',
                            'url':"{{ Route('structure.show') }}",
                            'data': function(data){
                                data._token            = '{{ csrf_token() }}' ;
                                data.typestructure     = $('#typestructure').val();
                                data.status            = $('#status').val();
                                data.wilaya            = $('#wilaya').val();
                                data.commune           = $('#commune').val();
                                data.status_geo        = $('#status_geo').val();
                            }
                    },
                    
                    
            


                    columns: [
                        {
                        data: 'id'
                        },
                        {
                        data: 'name'
                        },
                        {
                        data: 'adresse'
                        },

                        {
                        data: 'wilaya'
                        },
                        {
                        data: 'commune'
                        },
                        

        
                        {
                        data: 'latitude'
                        },
                        {
                        data: 'longitude'
                        },

                        {
                        data: 'type_structure'
                        },
                        
                        {
                        data: 'status'
                        },
                        {
                        data: 'created_by'
                        }, 
                        {
                        data: 'created_at'
                        },
                        {
                        data: 'user_creator'
                        },
                        {
                            data:'typestructure'
                        },  
                        {
                        data: 'wilayaent'
                        },
                        {
                        data: 'communeent'
                        },
                        
                        {
                            data: 'action'
                        }

                        
                    ],
                
                    columnDefs: [
                        
                        {
                            targets: 3,
                            render: function(data, type, row) {
                            return row['wilayaent'];
                            },
                        },

                        
                        {
                            targets: 4,
                            render: function(data, type, row) {
                            return row['communeent'];
                            },
                        },

                        {
                            targets: 7,
                            render: function(data, type, row) {
                            return row['typestructure'];
                            },
                        },
                        {
                            targets: 9,
                            render: function(data, type, row) {
                            return row['user_creator'];
                            },
                        },
                        {
                            "targets": [13,14,11,12],
                            "visible": false,
                            "searchable": false
                        },
                        {
                                targets: 8,
                                render: function(data, type, full, meta) {
                                var status = {
                                0: {
                                'title': 'Inactive',
                                'class': ' bg-danger'
                                },
                                1: {
                                'title': 'Actif',
                                'class': ' bg-success'
                                },
                                2: {
                                'title': 'En attente',
                                'class': ' bg-brand'
                                },
                                3: {
                                'title': 'Modifié',
                                'class': ' bg-primary'
                                },
                                4: {
                                'title': 'Pending',
                                'class': 'bg-brand'
                                },
                                5: {
                                'title': 'Info',
                                'class': ' bg-info'
                                },
                                6: {
                                'title': 'Warning',
                                'class': ' bg-warning'
                                },
                                };
                                if (typeof status[data] === 'undefined') {
                                return data;
                                }
                                return '<span class="badge ' + status[data].class +
                                ' text-white rounded-pill">' + status[data].title +
                                '</span>';
                                },
                        },
                        {
                                targets: 10,
                                render: function(data, type, row) {
                                var day = new Date(row['created_at']);

                                date = day.toLocaleDateString();
                                return date;
                                },
                        },
                        {
                                    targets: -1,
                                    title: 'Actions',
                                    orderable: false,
                                    render: function(data, type, row) 
                                    {
                                        url_edit= data;
                                        edit_text=``;
                                        delete_text=``;
                                        @hasrole('Admin')
                                        delete_text=`<a href="#" data-toggle="modal" data-target="#deleteModal" class=" m-2" data-id="`+row['id']+`" data-name="`+row['name']+`"><i aria-hidden="true" class="fas fa-trash"></i></a>`;
                                        @endhasrole
                                    
                                        edit_text= `<a href="`+row['action']+`" class=" m-2"><i aria-hidden="true" class="fa fa-pen"></i></a>`;
                                    

                                        return edit_text + delete_text;
                                    },
                        },
                    
                    ],

                    "language": {
                        "processing":  '<i class="fa fa-sync fa-spin fa-2x fa-fw"></i><span>  Traitement en cours..</span>',
                        "sSearch": "Rechercher&nbsp;:",
                        "sLengthMenu": " _MENU_ ",
                        "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix": "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sPrevious": "Pr&eacute;c&eacute;dent",
                            "sNext": "Suivant",
                            "sLast": "Dernier"
                        },
                        "oAria": {
                            "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                    }
        });

    

        $('#delete').click(function(e) {
              console.log("delete");
              var btn = $('#delete');
              btn.attr('disabled',true);
              var formdata = new FormData();

              formdata.append("id", document.getElementById("id").value);
              console.log(...formdata);
              axios.post("{{ Route('structure.destroy') }}", formdata).then(function(response) {
              var res = response.data;
              
              if (!res.errors) {
              btn.attr('disabled', false);
              swal.fire("success !", "success !!! ", "success");
              table1.ajax.reload();
              $('#deleteModal').modal('hide')


              } else {
              btn.attr('disabled', false);
              swal.fire("Erreur!", res.msg, "error");
              /* removeClassEshowrrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');*/
              }

              }).catch(function(error) {
              btn.attr('disabled', false);
              swal.fire("Erreur!", error, "error");

            });

        });

        $('#deleteModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('id') // Extract info from data-* attributes
                    var name = button.data('name') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text( name)
                    $('#id').val(recipient)
        })


        $('#refrach').click(function(e) {
                                                    console.log("refrach");
                                                    var btn = $('#refrach');
                                                    BtnLoading($(this));                                                    
                                                    var formdata = new FormData();
                                                    
                                                    axios.post("{{ Route('structure.refrach') }}", formdata)
                                                        .then(function(response) {
                                                            var res = response.data;
                                                            
                                                            if (!res.errors) {


                                                                BtnReset(btn);     
                                                                swal.fire("success !", "success !!! ", "success");
                                                                table1.ajax.reload();
                                                                $('#kt_modal_13').modal('hide')
                                                            

                                                            } else {
                                                                BtnReset(btn);     
                                                                swal.fire("Erreur!", res.msg, "error");
                                                                console.log(res.msg);
                                                            }

                                                        }).catch(function(error) {
                                                            BtnReset(btn);     
                                                        });
                                                
        });
        
        $('#importer_depuis_Excel_btn').click(function(e) {
                                                         
                                                         e.preventDefault();
                                                         var btn = $(this);
                                                         var form = $(this).closest('form');
                                                 form.validate({
                                                     // define validation rules
                                                     rules: {
                                                        

                                                        excel_add: {
                                                             required: true
                                                        },

                                                        id_typestructure: {
                                                             required: true
                                                        },
                                                      

                                                     },
                                                     messages: {
                                                        
                                                     },

                                                     //display error alert on form submit  
                                                     invalidHandler: function(event, validator) {
                                                         var alert = $('#kt_form_1_msg');
                                                         alert.removeClass('kt--hide').show();
                                                         KTUtil.scrollTop();
                                                     },

                                                     submitHandler: function(form) {

                                                     }
                                                     });
                                                     if (!form.valid()) {
                                                         return false;
                                                     } else {
                                                        
               
              
                                                         var btn = $('#importer_depuis_Excel_btn');
                                                         BtnLoading($(this));
                                                         var formdata = new FormData();

                                                         formdata.append("fileexcel", $('#excel_add')[0].files[0] ? $('#excel_add')[0].files[0] : '' );
                                                         formdata.append("id_typestructure", document.getElementById("id_typestructure").value);
                                                        axios.post("{{ Route('structure.importer_depuis_Excel') }}", formdata)
                                                             .then(function(response) {
                                                                 var res = response.data;
                                                                 
                                                                if (!res.errors) {
                                                                    BtnReset(btn);                                                                         
                                                                    swal.fire("success !", "success !!! ", "success");
                                                                        table1.ajax.reload();
                                                                        $('#kt_modal_14').modal('hide')
                                                            
                                                                } else {

                                                                    BtnReset(btn);                                                                       
                                                                     swal.fire("Erreur!", res.msg, "error");
                                                                }

                                                            }).catch(function(error) {
                                                                BtnReset(btn);
                                                                 swal.fire("Erreur!", error, "error");
                                                            });


                                                     }
        });


   

    
    


   
    

    
    
    
    
    

    
</script>
@endsection
