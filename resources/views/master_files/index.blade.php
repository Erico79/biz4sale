@extends('layouts.dt-1')
@section('title','Masterfiles')
@section('content')
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">All Master Files</h4>
                            <div class="toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('masterFiles/create') }}" data-toggle="modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px;" >Add New</a>
                                    </div>
                                </div>
                                @include('flash::message')
                                @include('adminlte-templates::common.errors')
                            </div>

                            <div class="material-datatables">

                                @include('master_files.table')
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
       </div>




       <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                           <i class="material-icons">clear</i>
                       </button>
                       <h4 class="modal-title" style="margin-bottom: 10px">Edit masterfile</h4>
                   </div>
                   <div class="modal-body" style="padding: 0;">
                       <div class="wizard-container " style="padding: 0px;margin: 0px;border: 0px;border-radius: 0px;
">
                           <div class="card wizard-card" style="padding: 0;margin: 0; box-shadow: none;" data-color="rose" >
                               <form  action="" method="post" id="edit-form">
                                   {{ csrf_field() }}
                                   <input name="_method" type="hidden" value="PATCH">
                           <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                               {{--<div class="wizard-header">--}}
                               {{--<h3 class="wizard-title">--}}
                               {{--Build Your Profile--}}
                               {{--</h3>--}}
                               {{--<h5>This information will let us know more about you.</h5>--}}
                               {{--</div>--}}
                               <div class="wizard-navigation">
                                   <ul>
                                       <li>
                                           <a href="#about-edit" data-toggle="tab">Basic Details</a>
                                       </li>
                                       <li>
                                           <a href="#address-edit" data-toggle="tab">Other details</a>
                                       </li>
                                       <li>
                                           <a href="#account-edit" data-toggle="tab">Account details</a>
                                       </li>
                                   </ul>
                               </div>
                               <div class="tab-content">
                                   <div class="tab-pane" id="about-edit">
                                       <div class="row">
                                           {{--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>--}}
                                           <div class="col-sm-5 col-sm-offset-1">
                                               <div class="picture-container">
                                                   <div class="picture">
                                                       <img src="" class="picture-src" id="wizardPicturePreview" title="" />
                                                       <input type="file" id="wizard-picture">
                                                   </div>
                                                   <h6>Choose Picture</h6>
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">android</i>
                                                        </span>
                                                   <div class="form-group label-floating">
                                                       <label class="control-label">Surname
                                                           <small>(required)</small>
                                                       </label>
                                                       <input name="surname" value="{{ old('surname') }}" required type="text" class="form-control">
                                                   </div>
                                               </div>

                                               <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                   <div class="form-group label-floating">
                                                       <label class="control-label">First Name
                                                           <small>(required)</small>
                                                       </label>
                                                       <input name="firstname" value="{{ old('firstname') }}"type="text" class="form-control">
                                                   </div>
                                               </div>
                                               <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">record_voice_over</i>
                                                        </span>
                                                   <div class="form-group label-floating">
                                                       <label class="control-label">Middle Name
                                                       </label>
                                                       <input name="middlename"value="{{ old('middlename') }}" type="text" class="form-control">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <div class="col-md-6">
                                                   <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                       <div class="form-group label-floating">
                                                           <label class="control-label">Email
                                                               <small>(required)</small>
                                                           </label>
                                                           <input name="email" id="email" type="email" value="{{ old('email') }}" class="form-control">
                                                       </div>
                                                   </div></div>
                                               <div class="col-md-6">
                                                   <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">payment</i>
                                                        </span>
                                                       <div class="form-group label-floating">
                                                           <label class="control-label">ID/Passport
                                                               <small>(required)</small>
                                                           </label>
                                                           <input name="national_id" value="{{ old('national_id') }}" required type="number" class="form-control">
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>
                                           <div class="col-md-12">
                                               {{--<div class="col-md-6">--}}

                                               {{--</div>--}}
                                               {{--<div class="col-md-8">--}}


                                               {{--<div class="col-md-8">--}}
                                               {{--<div class="col-md-12">--}}
                                               <div class="col-md-3">
                                                   <div class="input-group">
                                                       <label class="label-on-left">
                                                                <span class="input-group-addon" style="padding-top: 0">
                                                                    <i class="material-icons">accessibility</i> Gender
                                                                </span>
                                                       </label>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="radio  radio-inline ">
                                                       <label>
                                                           <input type="radio" name="gender" value="Male" checked="true"> Male
                                                       </label>
                                                   </div></div>
                                               <div class="col-md-4">
                                                   <div class="radio  radio-inline">
                                                       <label>
                                                           <input type="radio" name="gender" value="Female"> Female
                                                       </label>
                                                   </div>
                                               </div>


                                           </div>
                                           {{--</div>--}}
                                           {{--</div>--}}

                                           {{--</div>--}}
                                       </div>
                                   </div>
                                   <div class="tab-pane" id="address-edit">
                                       {{--<div class="row">--}}
                                       <div class="col-md-12">
                                           <div class="form-group label-floating">
                                               <label class="control-label">Phone Number</label>
                                               <input type="number" name="phone_number" value="{{ old('phone_number') }}" required class="form-control">
                                           </div>
                                       </div>
                                       <div class="col-md-12">
                                           <div class="form-group label-floating">
                                               <label class="control-label">Home Address</label>
                                               <input type="text" name="home_address" value="{{ old('home_address') }}"class="form-control">
                                           </div>
                                       </div>
                                       {{--<div class="col-md-12">--}}
                                       {{--<div class="form-group label-floating">--}}
                                       {{--<label class="control-label">Street Name</label>--}}
                                       {{--<input type="number" name="phone_number" class="form-control">--}}
                                       {{--</div>--}}
                                       {{--</div>--}}

                                   </div>
                                   <div class="tab-pane" id="account-edit">
                                       <div class="col-md-12">
                                           <div class="form-group label-floating">
                                               <label class="control-label">Role</label>
                                               <select name="role_id" id="role-id" class="form-control" required>
                                                   <option disabled>Select Role</option>
                                                   @if(count($roles))
                                                       @foreach($roles as $role)
                                                           <option value="{{ $role->id }}">{{$role->name }}</option>
                                                       @endforeach
                                                   @endif
                                               </select>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                               <div class="wizard-footer">
                                   <div class="pull-right">
                                       <input type="hidden" id="editDetails" value="{{ url("/masterFiles") }}">
                                       <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                       <input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='next' value='Next' />
                                   </div>
                                   <div class="pull-left">
                                       <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                   </div>
                                   <div class="clearfix"></div>
                               </div>
                               </form>
                           </div>
                       </div>
                       <!-- wizard container -->
                   </div>
                   {{--<div class="modal-footer">--}}
                   {{--<button type="button" class="btn btn-simple">Nice Button</button>--}}
                   {{--<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>--}}
                   {{--</div>--}}
               </div>
           </div>
       </div>
        {{--delete-modal--}}
       <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form id="delete-form" method="post">
                       <input name="_method" type="hidden" value="DELETE">
                       {{ csrf_field() }}
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                           <i class="material-icons">clear</i>
                       </button>
                       <h4 class="modal-title" style="margin-bottom: 10px">Delete masterfile</h4>
                   </div>
                   <div class="modal-body">
                        <p>Are you sure you want to delete this masterfile?</p>
                   </div>
                   <div class="modal-footer">
                   <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
                       <button type="submit" class="btn btn-simple">Yes</button>
                   </div>
                   </form>
               </div>
           </div>
       </div>
@endsection
@push('js')
    <!--  Plugin for the Wizard -->
    <script src="{{ asset('assets/js/jquery.bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('js/masterfiles/masterfiles.js') }}"></script>
    <script>
//        demo.initMaterialWizard();
    </script>
    @endpush

