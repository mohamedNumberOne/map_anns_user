@extends('layouts.app')

@section('title', 'Bon de sortie')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bon de sortie / Autorisations d'absence en attente</h1>

            @if (auth()->user()->hasAnyPermission(['bon_de_sortie-create']))
                <a href="{{route('bon_de_sortie.create')}}" class="btn btn-sm btn-primary" >
                    <i class="fas fa-plus"></i> Ajouter nouveau
                </a>
            @endif

            @php 
            $type_user=Auth()->user()->getType() ; 
            $enterprise  = Auth()->user()->getEnteprise();
        @endphp

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Bon de sortie /Autorisations d'absence en attente
                </h6>

            </div>
            <div class="card-body">
              

                <div class="kt-portlet__body">
					
                <div class="row mb-3">
                    @if($type_user!=3)
                    <div class="form-group row col-12">  
                        <label class="col-form-label col-lg-3 col-sm-12"><b>Employees	</b></label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <select class="form-control select2" id="employee" style="width:100% !important"  required  name="employee" >
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label><b>Date  :</b></label>
                        <div class='input-group' id='kt_daterangepicker_6'>
                            <input type='text' class="form-control datatable-input" readonly  />
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label><b>Jour  :</b></label>
                        <select class="form-control  " name="type" id='type'>
                            <option  value="" ></option>
                            <option value="0"> Dimanche </option>
                            <option value="1"> Lundi   </option>
                            <option value="2"> Mardi </option>
                            <option value="3"> Mercredi   </option>
                            <option value="4"> Jeudi </option>
                            <option value="5"> Vendredi   </option>
                            <option value="6"> Samedi   </option>
                        </select>
                    </div>
                    @if($type_user==1)
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label><b>Direction  :</b></label>
                        <select class="form-control  " name="departement" id='departement'>
                            <option  value="" ></option>
                            @foreach($departements as $departement)
                                    <option value="{{$departement->id}}" >{{$departement->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if($type_user!=3)
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label><b>Profil  :</b></label>
                        <select class="form-control  " name="profil" id='profil'>
                            <option  value="" ></option>
                        </select>
                    </div>
                    @endif
                    

              
                    


                    
                   
                   

                  
                    
                    

                    



                </div>
                
                    <input type="hidden" class="form-control datatable-input" id="min1" name="min">
                    <input type="hidden"  class="form-control datatable-input" id="max1" name="max">
                    
					<table class="table table-striped- table-bordered table-hover responsive no-wrap table-checkable mt-3" width="100%" id="kt_table_1">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Code</th>
								<th>Employee</th>
                                <th>Direction</th>
								<th>Jour</th>
								<th>Date</th>   
                                <th>Heure de sortir</th>
                                <th>Heure d'entrée </th>
                             
                                <th>Staut</th>
                                <th>Motif</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
                                <th>data</th>
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

                    <div class="modal fade" id="refuseModal" tabindex="-1" role="dialog" aria-labelledby="refuseModalExample" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="refuseModalExample"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body"> Voulez-vous vraiment refuse cet date? </div>
                                <div class="modal-footer"> 
                                    <form id="test-form"> 
                                        @csrf
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <button class="btn btn-info" type="button"  id='btn_refuse'>
                                        Oui
                                    </button>
                                    <input type="hidden" class="form-control" name="id_refuse" id="id_refuse" >
                                
                                    
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="valideModal" tabindex="-1" role="dialog" aria-labelledby="valideModalExample" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="valideModalExample"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body"> Voulez-vous vraiment valide cet date? </div>
                                <div class="modal-footer"> 
                                    <form id="test-form"> 
                                        @csrf
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <button class="btn btn-info" type="button"  id='btn_valide'>
                                        Oui
                                    </button>
                                    <input type="hidden" class="form-control" name="id_valide" id="id_valide" >
                                
                                    
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                   

                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateExample" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateExample"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="test-form"> 
                                        @csrf
                                <div class="modal-body"> 
                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>date</label>
                                         <input type="date" class="form-control" id="date" name="date"  required>
                                    </div>

                                    
                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>Heure de sortir</label>
                                         <input type="time" class="form-control" id="hour_in" name="hour_in"  required>
                                    </div>

                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>Heure d'entrée</label>
                                         <input type="time" class="form-control" id="hour_out" name="hour_out"  required>
                                    </div>

                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>Status</label>
                                        <select class="form-control " id="status_update"  name="status_update">

                                            <option selected disabled>Select Status</option>
                                            <option value="1">Approuvé</option>
                                            <option value="2">En attente</option>
                                            <option value="3">Refusé</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>Motif</label>
                                         <input type="text" class="form-control" id="motif" name="motif"  required>
                                    </div>

                                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                        <label> Justificatif </label>
                                        <input type="file" id="copie_papier" name="copie_papier"
                                         class="form-control"
                                          autocomplete="off">
                                     </div>

                                </div>
                                <div class="modal-footer"> 
                                    

                                        {{--
                                            update 
                                        id_update
                                        hour_in
                                        hour_out
                                        status_update 
                                        --}}


                                    

                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <button class="btn btn-info" type="button"  id='update'>
                                        Oui
                                    </button>
                                    <input type="hidden" class="form-control" name="id_update" id="id_update" >
                                
                                    
                                    
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>


                    
                    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="updateExample" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateExample"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body"> 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="row">
                                          <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Heure de sortir</label>
                                            <input type="time" class="form-control" id="hour_in_info" name="hour_in_info"  disabled>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Heure d'entrée</label>
                                            <input type="time" class="form-control" id="hour_out_info" name="hour_out_info"  disabled>
                                        </div>

                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Motif</label>
                                            <input type="text" class="form-control" id="motif_info" name="motif_info"  disabled>
                                        </div>

                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                          <label>Status</label>
                                            <p id="status_update_info" name="status_update_info"  > </p>
                                        </div>
                                        @if(auth()->user()->hasAnyPermission(['bon_de_sortie-infosup']))
                                            <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                                <label>Créé par</label>
                                                <p id="created_by_info" name="created_by_info"  > </p>
                                            </div>
                                        @endif

                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Créé à</label>
                                            <p id="created_at_info" name="created_at_info"  > </p>
                                        </div>

                                        @if(auth()->user()->hasAnyPermission(['bon_de_sortie-infosup']))
                                            <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                                <label>édité par</label>
                                                <p id="edited_by_info" name="edited_by_info"  > </p>
                                            </div>
                                        @endif

                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>édité à</label>
                                            <p id="updated_at_info" name="updated_at_info"  > </p>
                                        </div>

                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Approuvé par</label>
                                            <p id="approuve_par_info" name="approuve_par_info"  > </p>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                            <label>Justificatif</label>
                                            <p id="copie_papier_info" name="copie_papier_info"  > </p>
                                        </div>


                                       

                                    </div>
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

//$("#min1").datepicker({ onSelect: function () { table1.draw(); }, changeMonth: true, changeYear: true , dateFormat:"yy-mm-dd"});
        //$("#max1").datepicker({ onSelect: function () { table1.draw(); }, changeMonth: true, changeYear: true, dateFormat:"yy-mm-dd" });
  
      $('#min1, #max1').change(function () {
            table1.draw();
        });

        var start = moment().subtract(29, 'days');
        var end = moment();

        $('#kt_daterangepicker_6').daterangepicker({
          buttonClasses: ' btn',
          "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Valider",
                "cancelLabel": "Annuler",
                "fromLabel": "De",
                "toLabel": "à",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Dim",
                    "Lun",
                    "Mar",
                    "Mer",
                    "Jeu",
                    "Ven",
                    "Sam"
                ],
                "monthNames": [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"
                ],
                "firstDay": 1
          },
          applyClass: 'btn-primary',
          cancelClass: 'btn-secondary',
          startDate: start,
          endDate: end,
          ranges: {
              "Aujourd'hui": [moment(), moment()],
              'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
              'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
              'Ce mois': [moment().startOf('month'), moment().endOf('month')],
              'Le mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
          }, function(start, end, label) {
            $('#min1').val( start.format('MM/DD/YYYY')) ;
            $('#max1').val( end.format('MM/DD/YYYY')) ;
            $('#kt_daterangepicker_6 .form-control').val( start.format('DD/MM/YYYY') + ' / ' + end.format('DD/MM/YYYY'));
            table1.draw();
        });


        $( "#employee" ).select2({
            placeholder: " Select Employees ",
            allowClear: true,
            ajax: { 
            url: "{{route('employee.getEmployees')}}",
            type: "post",
            
            dataType: 'json',
            delay: 250,
            data: function (params) {
            return {
                _token: '{{ csrf_token() }}',
                @if($type_user==2)
                    departement : "{{Auth()->user()->getDirection()}}",
                @else
                    departement : $('#departement').val(),
                @endif
                status : 5,
                search: params.term // search term
            };
            },
            processResults: function (response) {
            return {
                results: response
            };
            },
            cache: true
        }

        });

    $('#employee').change(function () {
                table1.draw();
    });
    $('#type').change(function () {
                table1.draw();
    });
    $('#departement').change(function () {
                table1.draw();
    });
    $('#profil').change(function () {
                table1.draw();
    });
    

 
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
                        'url':"{{ Route('bon_de_sortie.show') }}",
                        'data': function(data){
                          data._token ='{{ csrf_token() }}' ;
                          data.min = $('#min1').val();
                          data.max = $('#max1').val();
                          data.employee = $('#employee').val();
                          data.type = $('#type').val();
                          data.departement = $('#departement').val();
                          data.profil = $('#profil').val();
                          data.status        = 2;


                         
                   

                          
                          
                        }
                },
                 
                columns: [
					{
                        data: 'id'
                    },
                    {
                        data: 'user_id'
                    },
					{
                        data: 'name'
                    },
                    {
                        data: 'department'
                    },
                    {
                        data: 'dayOfWeek'
                    },
					{
                        data: 'date'
                    },
                    {
                        data: 'hour_in'
                    },
                   
                    {
                        data: 'hour_out'
                    },
                    {
                        data: 'status'
                    },

                    {
                        data: 'motif'
                    },
                
                    {
                        data: 'day'
                    },
                    {
                        data: 'department_name'
                    },
                    {
                        data: 'approuve_par'
                    },
                    {
                        data: 'copie_papier'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'updated_at'
                    },
                    {
                        data: 'edited_by'
                    },
                    {
                        data: 'user_editor'
                    },
                    {
                        data: 'created_by'
                    },
                    {
                        data: 'user_creator'
                    },
                    {
                        data: 'approuve'
                    },
                    {
                        data: 'file'
                    },
             
                    {
                        data: 'action'
                    },

                    

                    
                ],
             
                columnDefs: [
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            var status = {
                                0: {'title': 'Dim', 'class': ' bg-danger'},
                                1: {'title': 'Lun', 'class': ' bg-success'},
                                2: {'title': 'Mar', 'class': 'bg-primary'},
                                3: {'title': 'Mer', 'class': 'bg-info'},
                                4: {'title': 'Jeu', 'class': 'bg-warning'},
                                5: {'title': 'Ven', 'class': ' bg-dark'},
                                6: {'title': 'Sam', 'class': 'bg-secondary'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="badge ' + status[data].class + ' text-white rounded-pill">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 8,
                        render: function(data, type, full, meta) {
                            
                    
                    
                            var status = {
                                0: {'title': '', 'class': ' bg-danger'},
                                1: {'title': "Approuvé", 'class': ' bg-success'},
                                3: {'title': 'Refusé', 'class': 'bg-danger'},
                                4: {'title': '', 'class': 'bg-info'},
                                2: {'title': 'En attente', 'class': 'bg-warning '},
                                6: {'title': '', 'class': 'bg-secondary'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="badge ' + status[data].class + ' text-white rounded-pill">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 6,
                        render: function(data, type, row) {
                        
                            if(row['status']!=3){
                                return data;
                            }else{
                                return '<span style="color:red ; " >'+data+'</span>';
                            }

                        },
				    },
                    {
                        targets: 7,
                        render: function(data, type, row) {
                        
                            if(row['status']!=3){
                                return data;
                            }else{
                                return '<span style="color:red ; " >'+data+'</span>';
                            }

                        },
				    },
                    {
                            targets: 5,
                            render: function(data, type, row) {
                            
                                return row['day'];
                            },
                    },
                    {
                        targets: 3,
                        render: function(data, type, row) {
                        
                            return row['department_name'];
                        },
				    },
                    {
                        "targets": [10,11,12,13,14,15,16,17,18,19,20,21],
                        "visible": false,
                    },
                    @if($type_user==2)
                    {
                        "targets": [3],
                        "visible": false,
                    },
                    @endif

                    @if($type_user==3)
                    {
                        "targets": [0,1,2,3],
                        "visible": false,
                    },
                    @endif

                    {
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, row) 
                        {
                            url_edit= data;
                            edit_text=``;
                            info_text=``;
                            delete_text=``;
                            valide_text=``;
                            refuse_text=``;
                            status= row['status'] ;
                            

                            @if(auth()->user()->hasAnyPermission(['bon_de_sortie-delete']))
                            delete_text=`<a href="#" data-toggle="modal" data-target="#deleteModal" class=" ml-2" data-id="`+row['id']+`" data-name="`+row['name']+`(`+row['day']+`)"><i aria-hidden="true" class="fas fa-trash"></i></a>`;
                            @endif

                            @if(auth()->user()->hasAnyPermission(['bon_de_sortie-edit']))
                            edit_text=`<a href="#" data-toggle="modal" data-target="#updateModal" class=" ml-2"  data-motif="`+row['motif']+`"   data-hour_in="`+row['hour_in']+`"  data-hour_out="`+row['hour_out']+`"   data-status="`+row['status']+`"    data-date="`+row['day']+`"      data-id="`+row['id']+`" data-name="`+row['name']+`(`+row['day']+`)"><i aria-hidden="true" class="fas fa-pen"></i></a>`;
                            @endif
                            

                            if(status ==2){
                                @if(auth()->user()->hasAnyPermission(['bon_de_sortie_valide']))
                                valide_text=`<a href="#" data-toggle="modal" data-target="#valideModal" class=" ml-2" data-id="`+row['id']+`" data-name="`+row['name']+`(`+row['day']+`)"><i aria-hidden="true" class="fas fa-check"></i></a>`;
                                @endif
                                @if(auth()->user()->hasAnyPermission(['bon_de_sortie_refuse']))
                                refuse_text=`<a href="#" data-toggle="modal" data-target="#refuseModal" class=" ml-2" data-id="`+row['id']+`" data-name="`+row['name']+`(`+row['day']+`)"><i aria-hidden="true" class="fas fa-times"></i></a>`;
                                @endif
                            }

                            info_text=`<a href="#" data-toggle="modal" data-target="#infoModal" class=" ml-2" data-hour_in="`+row['hour_in']+`" data-hour_out="`+row['hour_out']+`"   data-status="`+row['status']+`" data-motif="`+row['motif']+`" data-approuve_par="`+row['approuve_par']+`" data-copie_papier="`+row['copie_papier']+`" data-created_at="`+row['created_at']+`" data-updated_at="`+row['updated_at']+`"  data-edited_by="`+row['edited_by']+`"   data-user_editor="`+row['user_editor']+`" data-created_by="`+row['created_by']+`" data-user_creator="`+row['user_creator']+`"  data-approuve="`+row['approuve']+`"  data-file="`+row['file']+`" data-id="`+row['id']+`" data-name="`+row['name']+`(`+row['day']+`)"><i aria-hidden="true" class="fas fa-info"></i></a>`;
                           
                           
                            return valide_text + refuse_text+edit_text + delete_text +info_text;
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

        $('#btn_valide').click(function(e) {
              console.log("btn_valide");
              var btn = $('#btn_valide');
              btn.attr('disabled',true);
              var formdata = new FormData();

              formdata.append("id", document.getElementById("id_valide").value);
              console.log(...formdata);
              axios.post("{{ Route('bon_de_sortie.valide') }}", formdata).then(function(response) {
              var res = response.data;
              
              if (!res.errors) {
              btn.attr('disabled', false);
              swal.fire("success !", "success !!! ", "success");
              table1.ajax.reload();
              $('#valideModal').modal('hide')


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


        $('#btn_refuse').click(function(e) {
              console.log("btn_refuse");
              var btn = $('#btn_refuse');
              btn.attr('disabled',true);
              var formdata = new FormData();

              formdata.append("id", document.getElementById("id_refuse").value);
              console.log(...formdata);
              axios.post("{{ Route('bon_de_sortie.refuse') }}", formdata).then(function(response) {
              var res = response.data;
              
              if (!res.errors) {
              btn.attr('disabled', false);
              swal.fire("success !", "success !!! ", "success");
              table1.ajax.reload();
              $('#refuseModal').modal('hide')


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



        $('#update').click(function(e) {

              console.log("update");
              var btn = $('#update');
              btn.attr('disabled',true);
              var formdata = new FormData();
              formdata.append("id", document.getElementById("id_update").value);
              formdata.append("hour_in", document.getElementById("hour_in").value);
              formdata.append("hour_out", document.getElementById("hour_out").value);
              formdata.append("status", document.getElementById("status_update").value);
              formdata.append("date", document.getElementById("date").value);
              formdata.append("motif", document.getElementById("motif").value);
              formdata.append("copie_papier", $('#copie_papier')[0].files[0] ? $('#copie_papier')[0].files[0] : '' );
              
              console.log(...formdata);
              axios.post("{{ Route('bon_de_sortie.update') }}", formdata).then(function(response) {
              var res = response.data;
                if (!res.errors) {
                    btn.attr('disabled', false);
                    swal.fire("success !", "success !!! ", "success");
                    table1.ajax.reload();
                    $('#updateModal').modal('hide');
                }else {
                    btn.attr('disabled', false);
                    swal.fire("Erreur!", res.msg, "error");
                }
              }).catch(function(error) {
              btn.attr('disabled', false);
              swal.fire("Erreur!", error, "error");

            });

        });


        $('#delete').click(function(e) {
              console.log("delete");
              var btn = $('#delete');
              btn.attr('disabled',true);
              var formdata = new FormData();

              formdata.append("id", document.getElementById("id").value);
              console.log(...formdata);
              axios.post("{{ Route('bon_de_sortie.destroy') }}", formdata).then(function(response) {
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


    $('#valideModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('id') // Extract info from data-* attributes
                var name = button.data('name') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text( name)
                $('#id_valide').val(recipient)
    })


    $('#refuseModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('id') // Extract info from data-* attributes
                var name = button.data('name') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text( name)
                $('#id_refuse').val(recipient)
    })


    
    


    $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('id') // Extract info from data-* attributes
                var name = button.data('name') // Extract info from data-* attributes
                var hour_in = button.data('hour_in') // Extract info from data-* attributes
                var hour_out = button.data('hour_out') // Extract info from data-* attributes
                var status = button.data('status') // Extract info from data-* attributes
                var date = button.data('date') // Extract info from data-* attributes
                var motif = button.data('motif') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text( name)
                $('#id_update').val(recipient)
                $('#hour_in').val(hour_in)
                $('#hour_out').val(hour_out)
                $('#date').val(date)
                $('#status_update').val(status)
                $('#motif').val(motif)
    })

    $('#infoModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('id') // Extract info from data-* attributes
                var name = button.data('name') // Extract info from data-* attributes
                var hour_in = button.data('hour_in') // Extract info from data-* attributes
                var hour_out = button.data('hour_out') // Extract info from data-* attributes
                var status = button.data('status') // Extract info from data-* attributes

                var motif = button.data('motif') // Extract info from data-* attributes
                var approuve_par = button.data('approuve_par') // Extract info from data-* attributes
                var copie_papier = button.data('copie_papier') // Extract info from data-* attributes
                var created_at = button.data('created_at') // Extract info from data-* attributes
                var updated_at = button.data('updated_at') // Extract info from data-* attributes
                var edited_by = button.data('edited_by') // Extract info from data-* attributes
                var user_editor = button.data('user_editor') // Extract info from data-* attributes
                var created_by = button.data('created_by') // Extract info from data-* attributes
                var user_creator = button.data('user_creator') // Extract info from data-* attributes
                var approuve = button.data('approuve') // Extract info from data-* attributes
                var file = button.data('file') // Extract info from data-* attributes

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text( name)

                
                
                
                $('#id_update').val(recipient)
                $('#hour_in_info').val(hour_in)
                $('#hour_out_info').val(hour_out)


                if(status=="1"){
                    $('#status_update_info').html('<span class="badge  bg-success text-white rounded-pill">Approuvé</span>')
                }

                if(status=="2"){
                    $('#status_update_info').html('<span class="badge  bg-warning text-white rounded-pill">En attente</span>')
                }
                if(status=="3"){
                    $('#status_update_info').html(' <span class="badge bg-danger text-white rounded-pill">Refusé</span>')
                }

            
               
                $('#motif_info').val(motif)

                if(user_creator!="NULL"){
                    $('#created_by_info').html(user_creator)
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var d = new Date(created_at);
                    $('#created_at_info').html(d.toLocaleDateString("fr-FR", options)+" "+ d.toLocaleTimeString())
                }else{
                    $('#created_by_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                    $('#created_at_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                }

                if(user_editor!="NULL"){
                    $('#edited_by_info').html(user_editor)
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var d = new Date(updated_at);
                    $('#updated_at_info').html(d.toLocaleDateString("fr-FR", options)+" "+ d.toLocaleTimeString())
                }else{
                    $('#edited_by_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                    $('#updated_at_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                }

                if(file!="NULL"){
                    $('#copie_papier_info').html('<a href="'+file+'" class=" btn btn-info"> Télécharger </a>')
                }else{
                    $('#copie_papier_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                }

                if(approuve!="NULL"){
                    $('#approuve_par_info').html(approuve)
                }else{
                    $('#approuve_par_info').html('<span class="badge bg-warning text-white rounded-pill">NULL</span>')
                }

                
                
                /*
                
                
                
                
                
                */


    })


    
    
    
    
    

    
</script>
@endsection
