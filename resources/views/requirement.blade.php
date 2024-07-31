<x-header title="Requirement" keywords="Service,Requirement" description="Rquirement"/>


<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Personal Details</small></p>
            </div>
        </div>
    </div>
    
    <form role="form" action="{{ route('registeruser')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
            
                 <h3 class="panel-title">Personal Details</h3>
            </div>
            <div class="panel-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
                <div class="col-md-3">
                    <label class="control-label">Name</label>
                    <input  type="text"  class="form-control" placeholder="Name" name="name" value="{{ old('name')}}"/>
                    @error('name')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Gender</label>

                    <select class="form-control" aria-label="Default select example" name="gender" >
                        <option value="">-</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Nationality</label>

                    <select class="form-control" aria-label="Default select example" name="nationality" >
                        <option value="">-</option>
                    @foreach ($nationality as $item)
                                 <option value="{{$item->country_name}}">{{$item->country_name}}</option> 
                    @endforeach
                    </select>
                    @error('nationality')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Tel. Nr.</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="Telephone number" name="tel" value="{{ old('tel')}}"/>
                    @error('tel')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Email</label>
                    <input  type="email"  class="form-control" placeholder="Enter  Email" name="email" value="{{ old('email')}}"/>
                    @error('email')<b class="error-message"> {{$message}}</b>@enderror
                </div>

                <div class="col-md-3">
                    <label class="control-label">Birthday</label>
                    <input  type="date"  class="form-control" name="birthday" value="{{ old('birthday')}}"/>
                    @error('birthday')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Disponibility</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="Disponibility" name="disponibility" value="{{ old('disponibility')}}" />
                    @error('disponibility')<b class="error-message"> {{$message}}</b>@enderror
                </div>
        
                <div class="col-md-3">
                    <label class="control-label">Mobility</label>
                   <select class="form-control" aria-label="Default select example" name="mobility">
                        <option value="">-</option>
                        <option value="I have a car">I have a car</option>
                        <option value="I don't have a Car">I don't have a Car</option>
                    </select>
                    @error('mobility')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Start of work</label>
                   <select class="form-control" aria-label="Default select example" name="start_work">
                        <option value="">-</option>
                        <option value="As soon as possible">As soon as possible</option>
                        <option value="Not Now">Not Now</option>
                    </select>
                    @error('start_work')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Work in Warehouse</label>
                   <select class="form-control" aria-label="Default select example" name="work_in">
                        <option value="">-</option>
                        <option value="yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('work_in')<b class="error-message"> {{$message}}</b>@enderror
                </div>

      
                <div class="col-md-6">
                    <label class="control-label">Duration of work</label>
                   <select class="form-control" aria-label="Default select example" name="duration">
                        <option value="">-</option>
                        <option value="Over one year">Over one year</option>
                        <option value="More than 6 months">More than 6 months</option>
                    </select>
                    @error('duration')<b class="error-message"> {{$message}}</b>@enderror
                </div>
             
                <div class="col-md-3">
                    <label class="control-label">Picking systems/licence</label>
                   <select class="form-control" aria-label="Default select example" name="picking_system">
                        <option value="">-</option>
                        <option value="None">None</option>
                        <option value="Manaul Scans">Manaul Scans</option>
                    </select>
                    @error('picking_system')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Shoe size</label>
                    <input  type="number"  class="form-control" name="shoes_size" value="{{ old('shoes_size')}}"/>
                    @error('shoes_size')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                <div class="col-md-3">
                    <label class="control-label">Profile pic</label>
                    <input maxlength="100" type="file"  class="form-control" name="file" />
                    @error('file')<b class="error-message"> {{$message}}</b>@enderror
                </div>
                
                <div class="col-md-3">
                    <label class="control-label">Driver Licence</label>
                    <select   class="form-control" aria-label="Default select example" name="licence" >
                            <option value="">-</option>
                            <option value="I have a driving licence">I have a driving licence</option>
                            <option value="I don't have a driving Licence">I don't have a driving Licence</option>
                            <option value="Categoria B">Categoria B</option>
                    </select>
                    @error('licence')<b class="error-message"> {{$message}}</b>@enderror   
                </div>
                    
                       
                            <div class="col-md-12">
                                <label class="control-label">Langaue</label>
                                <select name="language[]" id="language" class="form-control" multiple>
                                    <option value="English A1">English A1</option>
                                    <option value="English A2">English A2</option>
                                    <option value="English B1">English B1</option>
                                    <option value="English B2">English B2</option>
                                    <option value="English C1">English C1</option>
                                    <option value="English C2">English C2</option>
                                    <option value="Germana A1">Germana A1</option>
                                    <option value="Germana A2">Germana A2</option>
                                    <option value="Germana B1">Germana B1</option>
                                    <option value="Germana B2">Germana B2</option>
                                    <option value="Germana c1">Germana C1</option>
                                    <option value="Germana c2">Germana C2</option>
                                    <option value="Not speaking English">Not speaking English</option>
                                    <option value="Not Speaking Germana">Not Speaking Germana</option>
                                </select>
                    @error('language')<b class="error-message"> {{$message}}</b>@enderror
                                
                    <script>
                        $(document).ready(function() {
                            $('#language').select2({
                                placeholder: "Select languages",
                                allowClear: true
                            });
                        });
                    </script>
                            </div>
                      
                    
                   
                

                <div class="col-md-12">
                    <label class="control-label">Types of goods</label>
                    <select name="goods[]" id="goods" class="form-control"  multiple>
                            <option value="Food">Food </option>
                            <option value="Clothing and accessories">Clothing and accessories</option>
                            <option value="Beverages">Beverages</option>
                            <option value="Something else">Something else</option>
                        </select>
                    @error('goods')<b class="error-message"> {{$message}}</b>@enderror
                                 
                    <script>
                        $(document).ready(function() {
                            $('#goods').select2({
                                placeholder: "Select goods",
                                allowClear: true
                            });
                        });
                    </script>
                </div>
                <div class="col-md-12">
                    <label class="control-label">Kind of activities </label>
                    <select name="activities[]" id="activities" class="form-control"   multiple>
                            <option value="Commissioning">Commissioning </option>
                            <option value="Picking">Picking</option>
                            <option value="Packing">Packing</option>
                            <option value="labeling">labeling</option>
                            <option value="Sorting">Sorting</option>
                        </select>
                    @error('activities')<b class="error-message"> {{$message}}</b>@enderror

                        <script>
                            $(document).ready(function() {
                                $('#activities').select2({
                                    placeholder: "Select activities",
                                    allowClear: true
                                });
                            });
                        </script>
                </div>

                <div class="col-md-12" style="margin-top: 15px;">
                    <button class="btn btn-danger pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer /> 