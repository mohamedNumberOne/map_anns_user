@extends('layouts.app')

@section('title', 'type de structure')

@section('content')
    <div class="container-fluid">
        @php 
     
        @endphp
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Type de structure</h1>

           
                <a href="{{route('typestructures.create')}}" class="btn btn-sm btn-primary" >
                    <i class="fas fa-plus"></i> Ajouter nouveau
                </a>

            @php 
        
        @endphp

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">type de structure
                </h6>

            </div>
            <div class="card-body">
              

                <div class="kt-portlet__body">
					
                <div class="row mb-3">
                    
                 
                    
                   

                 
                    

                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile ">
                        <label><b>Staut   :</b></label>
                        <select class="form-control  " name="status" id='status'>
                            <option  value="" ></option>
                            <option value="1">Actif</option>
                       
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                   



                </div>
                
                    <input type="hidden" class="form-control datatable-input" id="min1" name="min">
                    <input type="hidden"  class="form-control datatable-input" id="max1" name="max">
                    
					<table class="table table-striped- table-bordered table-hover responsive no-wrap table-checkable mt-3" width="100%" id="kt_table_1">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Image</th>
								<th>Nom</th>
                                <th>Nom abrégé</th>
								<th>Staut</th>   
                                <th>Ajouté Par</th>
                                <th>date </th>
                                <th>Date</th>
                                <th>Date</th>
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
                                <div class="modal-body"> Voulez-vous vraiment supprimer cet date? </div>
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
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}"  />
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
<script>
    sessionStorage.setItem('selectedModel', "gestion_employees");
</script> 
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

<script>


  
      

       

     


 
    

 
    $('#status').change(function () {
                table1.draw();
    });

   

   
    
    
    var table1 = $('#kt_table_1').DataTable({
        @if (auth()->user()->hasAnyPermission(['bon_de_sortie-export']))
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
            @else
            dom: `<'row'<'col-sm-12 col-md-5 'l><'col-sm-12 col-md-7 'f>>
		 	<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
            @endif
			    responsive: true,
                lengthMenu:[ [5, 10, 30 , 100 ,500, 1000 ], [5 , 10 , 30 ,500, 1000] ],
                pageLength: 10,
                processing: true,
                serverSide: true,
				"order": [ 5, 'desc' ],
                'ajax': {
                        type: 'POST',
                        'url':"{{ Route('typestructures.show') }}",
                        'data': function(data){
                          data._token ='{{ csrf_token() }}' ;
                          data.status        = $('#status').val();
                       
                        }
                },
                 
                
                columns: [
					{
                    data: 'id'
                    },
                    {
                    data: 'logo'
                    },
                    {
                    data: 'name'
                    },
                    
                    {
                       data: 'name_abr'
                    },
                    {
                    data: 'status'
                    },
                    {
                    data: 'created_by'
                    },
                    {
                    data: 'user_creator'
                    },
                    {
                    data: 'created_at'
                    },
                    {
                        data:'getImage'
                    },
                    {
                    data: 'action'
                    }

                    
                ],
             
                columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            
                        var output = '';
                        img_src =row['getImage'] ;
                        

                        output = '' +
                        '<div class="kt-user-card-v2">' +
                        '<div class="kt-user-card-v2__pic">' +
                        '<img style="height:40px;" src="'+img_src+'">' +
                        '</div>' +
                        '</div>';
                            
                    
                        return output;


                        },
                    },
                   
                    {
                        targets: 5,
                        render: function(data, type, row) {
                        return row['user_creator'];
                        },
                    },
                    {
                        "targets": [8,6],
                        "visible": false,
                        "searchable": false
                    },
                    {
                            targets: 4,
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
                            targets: 7,
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
                                   
                                   
                                        delete_text=`<a href="#" data-toggle="modal" data-target="#deleteModal" class=" m-2" data-id="`+row['id']+`" data-name="`+row['name']+`"><i aria-hidden="true" class="fas fa-trash"></i></a>`;
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
              axios.post("{{ Route('typestructures.destroy') }}", formdata).then(function(response) {
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


   

    
    


   
    

    
    
    
    
    

    
</script>
@endsection
