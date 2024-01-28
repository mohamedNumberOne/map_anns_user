@extends('layouts.app')

@section('title', 'Ajouter un nouveau type de structure')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajouter un nouveau type de structure</h1>
       
                <a href="{{ route('typestructures.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Retour </a>
           
        </div>

      

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ajouter un nouveau type de structure</h6>
            </div>



            <form id="kt_form_1">
                <div class="card-body">
                    <div class="form-group row">

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Nom" name="name"
                                value="" required>
                        </div>
                         <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Nom abrégé</label>
                            <input type="text" class="form-control" id="name_abr" placeholder="Nom abrégé" name="name_abr"
                                value="" required>
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                           <label>Nom en arabe</label>
                            <input type="text" class="form-control" id="name_ar" placeholder="Nom en arabe" name="name_ar"
                                value="" >
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label>Nom en anglais</label>
                            <input type="text" class="form-control" id="name_en" placeholder="Nom en anglais" name="name_en"
                                value="" >
                        </div>
                       
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span><label>Status</label>
                            <select class="form-control form-control-departement @error('status') is-invalid @enderror"
                                id="status" name="status">
                                <option selected disabled>Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Image </label>
                            <input type="file" id="image" placeholder="" name="image" value=""
                                class="form-control">
                        </div>

                        <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                            <label> Description </label>
                            <textarea class="form-control" id="description" placeholder="Description" name="description" value=""
                                rows="5"></textarea>

                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en arab</label>
                            <textarea class="form-control" id="description_ar" placeholder="description en arab" name="description_ar" value=""
                                rows="5"></textarea>

                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <label> Description en anglais </label>
                            <textarea class="form-control" id="description_en" placeholder="Description en anglais" name="description_en" value=""
                                rows="5"></textarea>
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
    <link rel="stylesheet" href="{{ asset('js/nv/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/nv/time_range/normalize.min.css') }}">
    <link href="{{ asset('js/nv/time_range/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/nv/time_range/ion.rangeSlider.skinModern.min.css') }}" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 1rem;
            position: relative;
            line-height: 1;
            width: 12.5rem;
        }
    </style>
    
@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/nv/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/nv/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/nv/select2.min.js') }}"></script>


    <script src="{{ asset('js/nv/time_range/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/nv/time_range/script.js') }}"></script>
    <script src="{{ asset('js/nv/jquery.validate.min.js') }}"></script>
    <script>
    
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

                
               

                var btn = $('#submit_btn');
                btn.attr('disabled', true);

               

                    var formdata = new FormData();
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
                    
                    axios.post("{{ Route('typestructures.store') }}", formdata).then(function(response) {
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
