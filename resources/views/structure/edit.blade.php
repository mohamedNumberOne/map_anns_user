@extends('layouts.app')

@section('title', 'Modifier structure')

@section('content')

    <div class="container-fluid">
      
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier structure </h1>
            <div>
              

                        <a href="{{ route('structure.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-arrow-left fa-sm text-white-50"></i>
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
                    <div class="col-lg-9" id="module">
                        <div class="about-text go-to collapse"  id="collapseExample" aria-expanded="false">
                         
                                <h3 class="dark-color">{!! $structures->name!!}</h3>
                                <h6 class="theme-color lead">
                                    {{ $structures->wilayaent ? $structures->wilayaent->name : '' }}
                                    {{ $structures->communeent ?"( ". $structures->communeent->name ." )": '' }}
                                    
                                </h6>
                           
                             
                            <div class="row about-list">
                                <div class="col-md-6">
                                   
                                 
                                    
                                    <div class="media">
                                        <label>Adresse :</label>
                                        <p>{!! $structures->adresse !!}</p>
                                    </div>
                                    <div class="media">
                                       
                                        <label>Latitude :</label>
                                        <p>{{ $structures->latitude }}
                                            
                                        </p>
                                    </div>
                                    
                                    <div class="media">
                                       
                                        <label>Longitude  :</label>
                                        <p>{{ $structures->longitude }}
                                            
                                        </p>
                                    </div>

                                    <div class="media">
                                        <label>Adresse en arabe :</label>
                                        <p>{{ $structures->adresse_en }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Adresse en anglais: </label>
                                        <p>{{ $structures->adresse_en }}</p>
                                    </div>

                                    <div class="media">
                                       
                                        <label>Email   :</label>
                                        <p>
                                            <ul>
                                            @if($structures->email)
                                            @foreach ($structures->email as $item)
                                            <dl> {{ $item}} </dl>
                                             @endforeach
                                           @endif
                                            </ul>
                                        </p>
                                    </div>

                                    <div class="media">
                                        <label>Site web  :</label>
                                        <p>{{ $structures->siteweb }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Téléphone :</label>
                                        <p> <ul>
                                            @if($structures->telfix)
                                            @foreach ($structures->telfix as $item)
                                            <dl> {{ $item}} </dl>
                                           @endforeach
                                           @endif
                                        </ul>

                                           </p>
                                    </div>
                                  
                                    <div class="media">
                                        <label>Fax  : </label>
                                        <p><ul>
                                            @if($structures->fax)
                                            @foreach ($structures->fax as $item)
                                            <dl> {{ $item}} </dl>
                                           @endforeach
                                           @endif
                                        </ul></p>
                                    </div>
                                 
                                    
                                    
                                    
                                    
                                 
                                  


                                </div>
                       
                                <div class="col-md-6">

                                    <div class="media">
                                        <label>Type de structure   :</label>
                                        <p>{{ $structures->typestructure ? $structures->typestructure->name : '' }}</p>
                                    </div>
                                   
                                    <div class="media">
                                        <label>Nom en arabe  :</label>
                                        <p>{{ $structures->name_ar }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Nom en anglais  :</label>
                                        <p>{{ $structures->name_en }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Statut : </label>
                                        <p>
                                        
                                           

                                            @if($structures->status == 0)
                                                <span class="badge bg-danger text-white rounded-pill">Inactive</span>
                                            @endif

                                            @if($structures->status == 1)
                                                <span class="badge bg-success text-white rounded-pill">Active</span>
                                            @endif

                                        </p>
                                    </div>
                                   
                                
                                    <div class="media">
                                        <label>Description  :</label>
                                        <p>{{ $structures->description }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Description en arabe :</label>
                                        <p>{{ $structures->description_ar }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Description en anglais :</label>
                                        <p>{{ $structures->description_en }}</p>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <a role="button" id='module_a' class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>
                    </div>
                    <div class="col-lg-2">
                        <div class="about-avatar">
                           
                            
                            <img src="{{ $structures->getImage() }}" title="" alt="">
                          
                          
                        </div>
                    </div>
                   
                </div>

           

               

            </div>

            @if($structures->latitude  !="" && $structures->longitude  !="")

                <div id ="map" style="height: 500px" >
            @endif

                
        </section>


        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="edit" style="display: none">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modifier structure {!! $structures->name !!}</h6>
            </div>


            <form id="add_employee_form" action="" accept-charset="utf-8" enctype="multipart/form-data" method="POST">
                @csrf
              
                <div class="card-body">
                    <div class="form-group row">


                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Nom" name="name"
                                value="{!! $structures->name !!}" required >
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Type de structure :</label>
                            <select class="form-control  " name="typestructure" id='typestructure'
                            required >
                                <option value=""></option>
                                @foreach ($typestructures as $typestructure)
                                    <option value="{{ $typestructure->id }}"
                                         @if( $structures->type_structure == $typestructure->id ) selected @endif
                                         >{{ $typestructure->name }}
                                        </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Nom en arabe</label>
                            <input type="text" class="form-control" id="name_ar" placeholder="Nom en arabe" name="name_ar"
                            value="{{ $structures->name_ar }}" >
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                           <label>Nom  en anglais</label>
                            <input type="text" class="form-control" id="name_en" placeholder="Nom en anglais" name="name_en"
                            value="{{ $structures->name_en }}" >
                        </div>


                        <div class="  col-12 row">
                        
                            <div class="col-xl-6">
                                
                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                    <span style="color:red;">*</span><label>Wilaya</label>
                                    <select class="form-control select2  " id="wilaya" style="width:100% !important" required
                                
                                        name="wilaya">
                                        @if($structures->wilayaent)
                                        <option  selected  value="{{ $structures->wilaya }}">{{  $structures->wilayaent    ?     $structures->wilayaent->name     : ''  }}</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                    <span style="color:red;">*</span><label>Commune</label>
                                    <select class="form-control select2  " id="commune" style="width:100% !important" required
                                
                                        name="commune">
                                        @if($structures->communeent)
                                        <option  selected  value="{{ $structures->commune }}">{{  $structures->communeent    ?     $structures->communeent->name     : ''  }}</option>
                                        @endif
                                    </select>
                                </div>

                                
                                <div class="col-xl-12 row">
                                    <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span><label>Adresse :</label>
                                        <input type="text" class="form-control" id="adresse" placeholder="Adresse " name="adresse"
                                        value="{!! $structures->adresse !!}" required>
                                    </div>

                                    <div class="col-sm-4 mb-3 mt-5 mb-sm-0">
                                        <button class="btn  btn-sm  btn-info"  id="find_long"  >Trouver</button>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                   <label>Adresse en arabe:</label>
                                    <input type="text" class="form-control" id="adresse_ar" placeholder="Adresse en arabe" name="adresse_ar"
                                    value="{{ $structures->adresse_ar }}">
                                </div>

                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                  <label>Adresse  en anglais:</label>
                                    <input type="text" class="form-control" id="adresse_en" placeholder="Adresse  en anglais" name="adresse_en"
                                    value="{{ $structures->adresse_en }}">
                                </div>

                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                    <label>Latitude :</label>
                                    <input type="text" class="form-control" id="latitude" placeholder="Latitude" name="latitude"
                                    value="{{ $structures->latitude }}">
                                </div>
                                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                    <label>Longitude :</label>
                                    <input type="text" class="form-control" id="longitude" placeholder="Longitude"
                                        name="longitude" value="{{ $structures->longitude }}">
                                </div>
                            </div>


                            <div class="col-xl-6 mt-5">
                                <div id="mapid"></div>

                              
                            </div>

                        </div>


                      

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Email :</label>
                            <select class="form-control kt-select2 select-2-email" name="email" id='email'
                                style="width:100% !important" multiple="multiple">
                                @if($structures->email)
                                @foreach ($structures->email as $item)
                                    @if($item!="")
                                            <option  selected  value="{{ $item }}">{{ $item}} </option>
                                    @endif
                                @endforeach
                               @endif
                            </select>
                        </div>


                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Site web :</label>
                            <input type="text" class="form-control" name="siteweb" id="siteweb" placeholder="" value="{{ $structures->siteweb }}">
                        </div>


                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Téléphone  :</label>
                            <select class="form-control kt-select2 select-2-phone" id="telfix" name="telfix"
                                style="width:100% !important" multiple="multiple">
                                @if($structures->telfix)
                                @foreach ($structures->telfix as $item)
                                @if($item!="")
                                <option  selected  value="{{ $item }}">{{ $item}} </option>
                                @endif
                                 @endforeach
                               @endif
                            </select>
                        </div>

                      


                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Fax :</label>
                            <select class="form-control kt-select2 select-2-phone" id="fax" name="fax"
                                style="width:100% !important" multiple="multiple">
                                @if($structures->fax)
                                @foreach ($structures->fax as $item)
                                    @if($item!="")
                                    <option  selected  value="{{ $item }}">{{ $item}} </option>
                                    @endif                                
                                 @endforeach
                               @endif
                            </select>


                        </div>
                        


                       
                        
                     





                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Status</label>
                            <select class="form-control form-control-departement @error('status') is-invalid @enderror"
                                id="status" name="status" >
                                <option selected disabled >Select Status</option>
                                <option value="1" @if($structures->status==1) selected @endif>Active</option>
                                <option value="0" @if($structures->status==0) selected @endif>Inactive</option>
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
                                rows="5">{{ $structures->description }}</textarea>

                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en arabe </label>
                            <textarea class="form-control" id="description_ar" placeholder="Description" name="description_ar" value=""
                                rows="5">{{ $structures->description_ar }}</textarea>

                        </div>
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en anglais </label>
                            <textarea class="form-control" id="description_en" placeholder="Description en anglais" name="description_en" 
                                rows="5">{{ $structures->description_en }}</textarea>

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

#mapid {
            width: 100%;
            height: 400px;
			z-index: 0 !important;
			position: relative !important;
			margin-left: auto !important;
    		margin-right: auto !important;
    		margin-top: 10% !important;
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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>


 <script  src="{{ asset('js/nv/jquery.validate.min.js') }}"></script> 

    <script>
         var start =  moment().startOf('month');
         var end =  moment().endOf('month');
         $('#min1').val( start.format('MM/DD/YYYY')) ;
         $('#max1').val( end.format('MM/DD/YYYY')) ;

        $('#edit_btn').click(function() {

             

            
            $('#about').attr('style', 'display: none !important');
            $('#edit_btn').attr('style', 'display: none !important');
            $('#edit').css("display", "");
            $('#about_btn').css("display", "");

           try{
				map2.invalidateSize() ;
			}catch (e){

			}
           
        });


        $('#about_btn').click(function() {
            $('#about').css("display", "");
            $('#edit_btn').css("display", "");
            $('#edit').attr('style', 'display: none !important');
            $('#about_btn').attr('style', 'display: none !important');
           
        });
    </script>

<script>









    
     

      
  
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


    $(".select-2-email").select2({
        /*tags : true,
                placeholder : "Enter Business Email",
              
                selectOnBlur: true*/
        tags: true,
        //tokenSeparators : [ ',', ' ' ],
        createTag: function(params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            } else {
                if (validateEmail(term)) {
                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                } else {
                    return null;
                }
            }
        }
    });
    $(".select-2-phone").select2({
        /*tags : true,
                placeholder : "Enter Business Email",
              
                selectOnBlur: true*/
        tags: true,
        //tokenSeparators : [ ',', ' ' ],
        createTag: function(params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            } else {
                if (validatephone(term)) {
                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                } else {
                    return null;
                }
            }
        }
    });




  


    $("#wilaya").select2({
        placeholder: "Sélectionnez wilaya",
        allowClear: true,
        ajax: {
            url: "{{ route('wilaya.getWilayas') }}",
            type: "post",

            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    _token: '{{ csrf_token() }}',
                    status: 5,
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

    $('#wilaya').change(function () {
            $('#commune').empty();        
    });

    $("#commune").select2({
            placeholder: "Sélectionnez commune",
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






    $('#submit_btn').click(function(e) {

        
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            // define validation rules
            rules: {

                name: {
                        required: true
                    },
                    typestructure: {
                        required: true
                    },

                    adresse: {
                        required: true
                    },
                  
                    status: {
                        required: true
                    },
                    wilaya: {
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


           

            var btn = $('#submit_btn');
            btn.attr('disabled', true);
            BtnLoading($(this));
           

                var formdata = new FormData();





                
                  
                    formdata.append("id", "{{ $structures->id}}");
                    formdata.append("name", document.getElementById("name").value);
                    formdata.append("name_ar", document.getElementById("name_ar").value);
                    formdata.append("name_en", document.getElementById("name_en").value);

                    formdata.append("adresse_ar", document.getElementById("adresse_ar").value);
                    formdata.append("adresse_en", document.getElementById("adresse_en").value);
                    formdata.append("adresse", document.getElementById("adresse").value);
					
                   
                    formdata.append("description", document.getElementById("description").value);
                    formdata.append("description_ar", document.getElementById("description_ar").value);
                    formdata.append("description_en", document.getElementById("description_en").value);

					formdata.append("wilaya", document.getElementById("wilaya").value);
                    formdata.append("commune", document.getElementById("commune").value);
                    formdata.append("latitude", document.getElementById("latitude").value);
                    formdata.append("longitude", document.getElementById("longitude").value);
                    formdata.append("type_structure", document.getElementById("typestructure").value);
                    formdata.append("status", document.getElementById("status").value);
                    formdata.append("email",    $("#email").val().toString()   );
                    formdata.append("siteweb", document.getElementById("siteweb").value);
                    formdata.append("telfix",   $("#telfix").val().toString()  );
                    formdata.append("fax",      $("#fax").val().toString()  );
                    formdata.append("image", $('#image')[0].files[0] ? $('#image')[0].files[0] : '');
                    console.log(...formdata);

                        axios.post("{{ Route('structure.update') }}", formdata).then(function(response) {
                            var res = response.data;
                            if (!res.errors) {
                                BtnReset(btn);
                                btn.attr('disabled', false);
                                swal.fire("success !", "success !!! ", "success");
                                location.reload();
                            } else {
                                BtnReset(btn);
                                btn.attr('disabled', false);
                                swal.fire("Erreur!", res.msg, "error");
                            }
                        }).catch(function(error) {
                            BtnReset(btn);
                            btn.attr('disabled', false);
                            swal.fire("Erreur!", error, "error");

                        });
                    
               








        }
    });

    $('#find_long').click(function(e) {
            var btn = $('#find_long');
            btn.attr('disabled', true);
            var formdata = new FormData();
            formdata.append("adresse", document.getElementById("adresse").value);
            console.log(...formdata);
            BtnLoading($(this));

                axios.post("{{ Route('structure.find_long') }}", formdata).then(function(response) {
                    var res = response.data;
                    if (!res.errors) {
                        btn.attr('disabled', false);
                        BtnReset(btn);
                        console.log(res.data);
                        const coordinatesString = res.data;

                        if(coordinatesString!="ko"){
                             const [latitudeString, longitudeString] = coordinatesString.split(',');
                            // Convert strings to numbers
                            const latitude = parseFloat(latitudeString);
                            const longitude = parseFloat(longitudeString);

                            $("#latitude").val(latitude) ;
                            $("#longitude").val(longitude) ;

                            updateMapWithCoordinates(coordinatesString);
                            //google.maps.event.addDomListener(window, 'load', initMap(coordinatesString));

                            swal.fire("success !", res.data, "success");
                        }else{
                            swal.fire("Erreur!", "Je n'ai pas trouvé cette adresse", "error");  
                        }
                       
                        

                       
                       // location.reload();
                    } else {
                        btn.attr('disabled', false);
                        BtnReset(btn);
                        swal.fire("Erreur!", res.msg, "error");
                    }
                }).catch(function(error) {
                    btn.attr('disabled', false);
                    BtnReset(btn);
                    swal.fire("Erreur!", error, "error");

                });
            
        
    });
       
</script>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@2.5.0/dist/esri-leaflet.js"
integrity="sha512-ucw7Grpc+iEQZa711gcjgMBnmd9qju1CICsRaryvX7HJklK0pGl/prxKvtHwpgm5ZHdvAil7YPxI1oWPOWK3UQ=="
crossorigin=""></script>

<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
<script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css'
rel='stylesheet' />


<script>





    @if($structures->latitude  !="" && $structures->longitude  !="")
    var map2 = L.map('mapid').setView(['{{$structures->latitude}}', '{{$structures->longitude}}'], 17);
    @else
    var map2 = L.map('mapid').setView(['36.700', '3.217'], 10);
    @endif
    map2.addControl(new L.Control.Fullscreen());


            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map2);
            marker = new L.marker(['36.700', '3.217'], {
                draggable: 'true',
              
            });
  
            marker.on('dragend', function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                map2.eachLayer(function(layer) {
                    if (!!layer.toGeoJSON) {
                        map2.removeLayer(layer);
                    }
                });
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng))
                getAddress(position);
            });
 
    map2.addLayer(marker);

 
    var searchControl = L.esri.Geocoding.geosearch({
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                countries: ['DZ'], // search only US, Guan, Virgin Islands and Puerto Rico
                //    categories: ['Professional and Other Places','Address', 'Postal', 'Populated Place' ] // Don't search POIs
            })
        ]
    }).addTo(map2);
  

    var results = L.layerGroup().addTo(map2);

    searchControl.on('results', function(data) {
        map2.eachLayer(function(layer) {
            if (!!layer.toGeoJSON) {
                map2.removeLayer(layer);
            }
        });
        for (var i = data.results.length - 1; i >= 0; i--) {



            marker = new L.marker(data.results[i].latlng, {
                draggable: 'true'
            });

            marker.on('dragend', function(event) {
                map2.eachLayer(function(layer) {
                    if (!!layer.toGeoJSON) {
                        map2.removeLayer(layer);
                        map2
                    }
                });
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng))
                getAddress(position);
            });

            //map.panTo(new L.LatLng(data.results[i].latlng))
            map2.panTo(new L.LatLng(data.results[i].latlng.lat, data.results[i].latlng.lng))
            getAddress(data.results[i].latlng);
            map2.addLayer(marker);
            
            

        }
    });


    $("#longitude").focusout(function() {
        if ($("#longitude").val() != '' && $("#latitude").val() != "") {

            map2.eachLayer(function(layer) {
                if (!!layer.toGeoJSON) {
                    map2.removeLayer(layer);
                }
            });

            marker = new L.marker([$("#latitude").val(), $("#longitude").val()], {
                draggable: 'true'
            });
            marker.on('dragend', function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng))
                getAddress(position);
            });
            //map.panTo(new L.LatLng(data.results[i].latlng))
            map2.panTo(new L.LatLng($("#latitude").val(), $("#longitude").val()))
            getAddress([$("#latitude").val(), $("#longitude").val()]);
            map2.addLayer(marker);

        }
    });

    $("#latitude").focusout(function() {
        if ($("#longitude").val() != '' && $("#latitude").val() != "") {

            map2.eachLayer(function(layer) {
                if (!!layer.toGeoJSON) {
                    map2.removeLayer(layer);
                }
            });
            marker = new L.marker([$("#latitude").val(), $("#longitude").val()], {
                draggable: 'true'
            });
            marker.on('dragend', function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng))
                getAddress(position);
            });
            //map.panTo(new L.LatLng(data.results[i].latlng))
            map2.panTo(new L.LatLng($("#latitude").val(), $("#longitude").val()))
            getAddress([$("#latitude").val(), $("#longitude").val()]);
            map2.addLayer(marker);

        }
    });


    var geocodeService = L.esri.Geocoding.geocodeService();

    function getAddress(position) {

        geocodeService.reverse().latlng(position).language("fr")
            .run(function(error, result) {
                if (error) {
                    return;
                }
                
                $("#adresse").val(result.address.Match_addr);
                $("#longitude").val(result.latlng.lng);
                $("#latitude").val(result.latlng.lat);
            });

        geocodeService.reverse().latlng(position).language("ar")
            .run(function(error, result) {
                if (error) {
                    return;
                }
              
                $("#adresse_ar").val(result.address.Match_addr);

            });

        geocodeService.reverse().latlng(position).language("eng")
            .run(function(error, result) {
                if (error) {
                    return;
                }
                //  alert(result.address.Match_addr);
                //console.log(result.latlng);

                //console.log(result.address.Match_addr);
                //console.log(result.address);
                //console.log(result);
                //  
               // $("#adresse_en").val(result.address.Match_addr);

            });
    }

    var gcs = L.esri.Geocoding.geocodeService();
    map2.on('click', (e) => {


        map2.eachLayer(function(layer) {
            if (!!layer.toGeoJSON) {
                map2.removeLayer(layer);
            }
        });

        gcs.reverse().latlng(e.latlng).run((err, res) => {
            if (err) return;
            
            marker = new L.marker(res.latlng, {
                draggable: 'true'
            });
            marker.on('dragend', function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng))
                getAddress(position);
            });
            map2.panTo(new L.LatLng(res.latlng.lat, res.latlng.lng))
            getAddress(res.latlng);
            map2.addLayer(marker);
        });
    });



    function addMarkerToMap(position) {
                    marker = new L.marker(position, {
                        draggable: 'true'
            });

            marker.on('dragend', function (event) {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng), {
                    draggable: 'true'
                });
                map2.panTo(new L.LatLng(position.lat, position.lng));
               // getAddress(position);
            });

           // map2.panTo(position);
            map2.setView(position, 18);
         //   getAddress(position);
            map2.addLayer(marker);
    }

    // Function to remove all markers from the map
    function removeAllMarkersFromMap() {
        map2.eachLayer(function (layer) {
            if (!!layer.toGeoJSON) {
                map2.removeLayer(layer);
            }
        });
    }
    // Function to update the map with new coordinates
    function updateMapWithCoordinates(coordinatesString) {
        // Parse the coordinates from the string
        const [latitudeString, longitudeString] = coordinatesString.split(',');
        const latitude = parseFloat(latitudeString);
        const longitude = parseFloat(longitudeString);

        // Remove all existing markers from the map
        removeAllMarkersFromMap();

        // Add a new marker with the updated coordinates
        addMarkerToMap([latitude, longitude]);
    }


      // Initialize the map
      function initMap(coordinatesString) {
        const [latitudeString, longitudeString] = coordinatesString.split(',');
        const latitude = parseFloat(latitudeString);
        const longitude = parseFloat(longitudeString);
        var coordinates = { lat: latitude, lng: longitude };

        var map = new google.maps.Map(document.getElementById('map'), {
            center: coordinates,
            zoom: 15 // You can adjust the zoom level as needed
        });

        // Add a marker to the map
        var marker = new google.maps.Marker({
            position: coordinates,
            map: map,
            title: '' // Replace with your desired marker title
        });
    }

    // Call the initMap function when the page is loaded
   
</script>

@if($structures->latitude  !="" && $structures->longitude  !="")
    <script language="javascript" type="text/javascript">
        var map;
        var geocoder;
        function InitializeMap() {

            var latlng = new google.maps.LatLng({{$structures->latitude}},{{ $structures->longitude}});
            var myOptions =
            {
                zoom: 17,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true
            };
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            
            // Add a marker to the map
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: "{{$structures->name}}"  
            });
        }
        window.onload = InitializeMap;
    </script>
@endif
@endsection
