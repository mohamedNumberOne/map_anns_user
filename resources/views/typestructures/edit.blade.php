@extends('layouts.app')

@section('title', 'Modifier Type de structure')

@section('content')

    <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier Type de structure </h1>
            <div>
                        <a href="{{ route('typestructures.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-arrow-left fa-sm text-white-50"></i>
                            Retour
                        </a>

             

               
             
                    <button class=" d-sm-inline-block btn btn-sm btn-info shadow-sm" id='about_btn'
                        style="display: none !important">
                        About
                    </button>

                    <button class=" d-sm-inline-block btn btn-sm btn-success shadow-sm" id='edit_btn'>
                        Edit
                    </button>
              
            </div>
        </div>

        
        	


        {{-- Alert Messages --}}
        @include('common.alert')
        <section class="section about-section gray-bg" id="about">
            <div class="">

                <div class="row align-items-center flex-row-reverse mb-2 mr-2 ml-2">
                    <div class="col-lg-9" >
                        <div class=""  >
                         
                                <h3 class="dark-color">{{ $typestructures->name }}</h3>
                               
                             
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Nom abrégé :</label>
                                        <p>{{ $typestructures->name_abr}}</p>
                                    </div>
                                    
                                   
                                    <div class="media">
                                        <label>Nom en arabe :</label>
                                        <p>{{ $typestructures->name_ar }}</p>
                                    </div>
                                    
                                    <div class="media">
                                       
                                        <label>Nom en anglais  :</label>
                                        <p>{{ $typestructures->name_en }}
                                            
                                        </p>
                                    </div>

                                   

                                  
                                  
                                    
                                    
                                    
                                    
                                    
                                  
                                  


                                </div>

                              
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                       
                                <div class="col-md-6">
                                   


                                   
                                    
                                    <div class="media">
                                        <label>Statut : </label>
                                        <p>
                                        
                                           

                                            @if($typestructures->status == 0)
                                                <span class="badge bg-danger text-white rounded-pill">Inactive</span>
                                            @endif

                                            @if($typestructures->status == 1)
                                                <span class="badge bg-success text-white rounded-pill">Active</span>
                                            @endif

                                        </p>
                                    </div>
                                   
                                   


                                    <div class="media">
                                        <label>Description  :</label>
                                        <p>{{ $typestructures->description }}</p>
                                    </div>
                                      <div class="media">
                                        <label>Description  en arab :</label>
                                        <p>{{ $typestructures->description_ar }}</p>
                                    </div>
                                      <div class="media">
                                        <label>Description   en anglais:</label>
                                        <p>{{ $typestructures->description_en }}</p>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-2">
                        <div class="about-avatar">
                           
                            
                            <img src="{{ $typestructures->getImage() }}" title="" alt="">
                          
                            
                        </div>
                    </div>
                   
                </div>

               
                <div class="p-5 bg-white rounded shadow mb-5 mt-3">
                    <!-- Bordered tabs-->
                    <ul id="myTab1" role="tablist"
                        class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                       

                            <li class="nav-item flex-sm-fill">
                                <a id="journal-tab" data-toggle="tab" href="#journal" role="tab" aria-controls="journal"
                                    aria-selected="true"
                                    class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Structures
                                </a>
                            </li>

                          
                        
                        


                      

                         
                    </ul>

                    <div id="myTab1Content" class="tab-content">

                       
                        <div id="journal" role="tabpanel" aria-labelledby="journal-tab" class="tab-pane fade px-4 py-5 show active">

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

                    </div>

                  


                     
                    </div>
                    <!-- End bordered tabs -->
                </div>


            </div>
        </section>


        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="edit" style="display: none">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modifier type de structure  {{ $typestructures->name }}</h6>
            </div>


            <form id="add_employee_form" action="" accept-charset="utf-8" enctype="multipart/form-data" method="POST">
                @csrf
              
                <div class="card-body">
                    <div class="form-group row">


                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Nom" name="name"
                                value="{{ $typestructures->name }}" required  >
                        </div>
                    
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Nom abrégé :</label>
                            <input type="text" class="form-control" id="name_abr" placeholder="Nom abrégé" name="name_abr"
                                value="{{ $typestructures->name_abr }}">
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Nom en arabe :</label>
                            <input type="text" class="form-control" id="name_ar" placeholder="Nom en arab" name="name_ar"
                                value="{{ $typestructures->name_ar }}">
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Nom en anglais :</label>
                            <input type="text" class="form-control" id="name_en" placeholder="Nom en anglais"
                                name="name_en" value="{{ $typestructures->name_en }}">
                        </div>

                     





                      
                     






                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Status</label>
                            <select class="form-control form-control-departement @error('status') is-invalid @enderror"
                                id="status" name="status" >
                                <option selected disabled >Select Status</option>
                                <option value="1" @if($typestructures->status==1) selected @endif>Active</option>
                                <option value="0" @if($typestructures->status==0) selected @endif>Inactive</option>
                            </select>
                          
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Image </label>
                            <input type="file" id="image" placeholder="" name="image" value=""
                                class="form-control">

                        </div>

                        <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                            <label> Description </label>
                            <textarea class="form-control" id="description" placeholder="Description" name="description" value=""
                                rows="5">{{ $typestructures->description }}</textarea>

                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en arab </label>
                            <textarea class="form-control" id="description_ar" placeholder="Description en arab" name="description_ar" value=""
                                rows="5">{{ $typestructures->description_ar }}</textarea>

                        </div>

                          <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en anglais </label>
                            <textarea class="form-control" id="description_en" placeholder="Description en anglais" name="description_en" value=""
                                rows="5">{{ $typestructures->description_en }}</textarea>

                        </div>

                        

                      

                    
                    
                    
                    
                        
                    
                    
                    
                  
                    </div>
                </div>

                <div class="card-footer">
                    <button type="button" id="submit_btn"
                        class="btn btn-success btn-user float-right mb-3">Sauvegarder</button>
                </div>

               

            </form>
        </div>



    </div>


@endsection

@section('css')
    <style>
        .section {
            padding: 100px 0;
            position: relative;
        }

        .gray-bg {
            background-color: #f5f5f5;
        }

        img {
            max-width: 100%;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        /* About Me
                ---------------------*/
        .about-text h3 {
            font-size: 45px;
            font-weight: 700;
            margin: 0 0 6px;
        }

        @media (max-width: 767px) {
            .about-text h3 {
                font-size: 35px;
            }
        }

        .about-text h6 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        @media (max-width: 767px) {
            .about-text h6 {
                font-size: 18px;
            }
        }

        .about-text p {
            font-size: 18px;
            max-width: 450px;
        }

        .about-text p mark {
            font-weight: 600;
            color: #20247b;
        }

        .about-list {
            padding-top: 10px;
        }

        .about-list .media {
            padding: 5px 0;
        }

        .about-list label {
            color: #20247b;
            font-weight: 600;
           // width: 88px;
            margin: 0;
            position: relative;
            margin-right:10px;

        }

       

        .about-list p {
            margin: 0;
            font-size: 15px;
        }

        @media (max-width: 991px) {
            .about-avatar {
                margin-top: 30px;
            }
        }

        .about-section .counter {
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        }

        .about-section .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .about-section .counter .count {
            font-weight: 700;
            color: #20247b;
            margin: 0 0 5px;
        }

        .about-section .counter p {
            font-weight: 600;
            margin: 0;
        }

        mark {
            background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
            background-size: 100% 3px;
            background-repeat: no-repeat;
            background-position: 0 bottom;
            background-color: transparent;
            padding: 0;
            color: currentColor;
        }

        .theme-color {
            color: #fc5356;
        }

        .dark-color {
            color: #20247b;
        }

        #module {
  font-size: 1rem;
  line-height: 1.5;
}


#module #collapseExample.collapse:not(.show) {
  display: block;
  height: 20rem;
  overflow: hidden;
}

#module #collapseExample.collapsing {
  height: 10rem;
}

#module #module_a.collapsed::after {
  content: '+ Voir Plus ';
}

#module #module_a:not(.collapsed)::after {
  content: '- Voir moins';
}

.error {
    color: red;
    font-size: 1rem;
    position: relative;
    line-height: 1;
    width: 12.5rem;
    }
    </style>
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
    //text-align: center;
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


 <script  src="{{ asset('js/nv/jquery.validate.min.js') }}"></script> 

    <script>
       

        $('#edit_btn').click(function() {
            $('#about').attr('style', 'display: none !important');
            $('#edit_btn').attr('style', 'display: none !important');
            $('#edit').css("display", "");
            $('#about_btn').css("display", "");
        });


        $('#about_btn').click(function() {
            $('#about').css("display", "");
            $('#edit_btn').css("display", "");
            $('#edit').attr('style', 'display: none !important');
            $('#about_btn').attr('style', 'display: none !important');
        });
    </script>

<script>




    
     
    var table1 = $('#kt_table_1').DataTable({
        
        dom: `<'row'<'col-sm-12 col-md-5 'Bl><'col-sm-12 col-md-7 'f>>
		 	<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
			buttons: [
             
                
                
            
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
                          data._token ='{{ csrf_token() }}' ;
                          data.typestructure = "{{ $typestructures->id }}";
                          data.status        = $('#status').val();
                          data.wilaya        = $('#wilaya').val();
                          data.commune        = $('#commune').val();
                          


                         
                   

                          
                          
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
                        "targets": [7,13,14,11,12],
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
      
    
</script>








<script>
    function validateEmail(email) {
        var emailReg = new RegExp(/^([\w-\.]+)@((?:[\w-\_]+\.)+)([a-zA-Z]{2,4})/i);
        var valid = emailReg.test(email);

        if (!valid) {
            return false;
        } else {
            return true;
        }
    }

    function validatephone(phone) {
        var phoneReg = new RegExp(
            /^(\+{1}\d{2,3}\s?[(]{1}\d{1,3}[)]{1}\s?\d+|\+\d{2,3}\s{1}\d+|\d+){1}[\s|-]?\d+([\s|-]?\d+){1,2}$/);
        var valid = phoneReg.test(phone);

        if (!valid) {
            return false;
        } else {
            return true;
        }
    }







  

 

 





    $('#submit_btn').click(function(e) {

        $.validator.addMethod("time", function(value, element) {
            return this.optional(element) ||
                /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(value);
        }, "Please enter a valid time.");
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            // define validation rules
            rules: {

                    name_abr: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                  




            },
            messages: {
                image: {
                    filesize: 'File size must be less than {0}',
                    extension: 'File extension  must be jpeg|png|jpg|gif|svg'
                },
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                swal.fire({
                    "title": "",
                    "text": "Il y a des erreurs dans votre formulaire. Corrigez s'il vous plaît",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            submitHandler: function(form) {

            }
        });
        if (!form.valid()) {
            return false;
        } else {

            // employee
            // date
            // start
            // end
            // status

           

            var btn = $('#submit_btn');
            btn.attr('disabled', true);

           

                var formdata = new FormData();
                    formdata.append("id", "{{ $typestructures->id}}");
                    formdata.append("name_abr", document.getElementById("name_abr").value);
                    formdata.append("name_ar", document.getElementById("name_ar").value);
                    formdata.append("name_en", document.getElementById("name_en").value);
                    formdata.append("name", document.getElementById("name").value);
                    formdata.append("description", document.getElementById("description").value);
                    formdata.append("description_ar", document.getElementById("description_ar").value);
					formdata.append("description_en", document.getElementById("description_en").value);
                    formdata.append("status", document.getElementById("status").value);
                    formdata.append("image", $('#image')[0].files[0] ? $('#image')[0].files[0] : '');
              
                console.log(...formdata);
                
                axios.post("{{ Route('typestructures.update') }}", formdata).then(function(response) {
                    var res = response.data;
                    if (!res.errors) {
                        btn.attr('disabled', false);
                        swal.fire("success !", "success !!! ", "success");
                        location.reload();
                    } else {
                        btn.attr('disabled', false);
                        swal.fire("Erreur!", res.msg, "error");
                    }
                }).catch(function(error) {
                    btn.attr('disabled', false);
                    swal.fire("Erreur!", error, "error");

                });
               








        }
    });
</script>
@endsection
