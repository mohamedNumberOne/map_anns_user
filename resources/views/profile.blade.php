@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        {{-- Page Content --}}
        <div class="row">
           
            <div class="col-md-12 ">
                {{-- Profile --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profil</h4>
                    </div>

                    <div class="d-flex flex-column ">
                        {{-- <span class="text-black-50"><i>Role:{{ auth()->user()->roles ? auth()->user()->roles->pluck('name')->first() : 'N/A' }}</i></span> --}}
                      <b>  <span class="text-black-50">Email :  {{ auth()->user()->email }}</span></b>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Nom de famille</label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}"
                                    placeholder="Nom de famille">

                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Prénom</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" placeholder="Prénom"
                                    value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}">

                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label class="labels">Numéro de portable</label>
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                    value="{{ old('mobile_number') ? old('mobile_number') : auth()->user()->mobile_number }}"
                                    placeholder="Numéro de portable">
                                @error('mobile_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Mettre à jour le profil</button>
                        </div>
                    </form>
                </div>

                <hr>
                {{-- Change Password --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Changer le mot de passe</h4>
                    </div>

                    <form action="{{ route('profile.change-password') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Mot de passe actuel</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Mot de passe actuel" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Nouveau mot de passe</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required placeholder="Nouveau mot de passe">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirmez le mot de passe</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" required placeholder="Confirmez le mot de passe">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success profile-button" type="submit">Changer le mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>
@endsection
