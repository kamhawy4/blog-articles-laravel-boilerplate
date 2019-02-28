@extends('admin.layout')
@section("title")
Settings
@endsection
@section("content")


<div class="row ">
<div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark bold uppercase">Settings</span>
            </div>
          
        </div>
        <div class="portlet-body">
                    @if($setting == null)
                      {!! Form::open(['method'=>'post','action'=>'Admin\SettingsController@store','class'=>'form-horizontal form-horizontal form-bordered','files'=>true,]) !!}
                    @else
                    {!! Form::model($setting,['method'=>'PATCH','action'=>['Admin\SettingsController@update',$setting->id],'files'=>true,'class'=>'form-horizontal form-horizontal form-bordered']) !!}
                    @endif

                    <div class="form-group {{ $errors->has('name_site') ? 'has-error' : '' }}">
                        <label for="name_site" class="col-md-1 control-label">Name Site</label>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <input value="{{($setting != null ? $setting->name_site : old('name_site') ) }}" name="name_site" type="text" class="form-control" id="name_site" placeholder="Name Site"> 
                                <span class="text-danger">{{ $errors->first('name_site') }}</span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-1 control-label">Email</label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <input value="{{ ($setting != null  ? $setting->email: old('email')  ) }}" name="email" type="email" class="form-control" id="email" placeholder="Email"> 
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-1 control-label">Phone</label>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <input value="{{ ($setting  != null ? $setting->phone: old('phone') ) }}" name="phone" type="text" class="form-control" id="phone" placeholder="Phone"> 
                                <span class="text-danger">{{ $errors->first('phone') }}</span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-1 control-label">Address</label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <input value="{{ ($setting  != null ? $setting->address: old('address') ) }}" name="address" type="text" class="form-control" id="address" placeholder="Address"> 
                                <span class="text-danger">{{ $errors->first('address') }}</span>

                            </div>
                        </div>
                    </div>
                  

                    <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                            <label class="control-label col-md-1">Meta Keywords</label>
                            <div class="col-md-6">
                                <input value="{{ ($setting  != null ? $setting->meta_keywords: old('meta_keywords') ) }}
                                              
                                "  name="meta_keywords" type="text" class="form-control input-large"  data-role="tagsinput">
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span> 
                            </div>
                    </div>


                    <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                        <label for="meta_description" class="col-md-1 control-label">Meta Description</label>
                        <div class="col-md-6">
                            <div class="input-icon">
                                <textarea name="meta_description"  rows="7"  class="form-control" id="meta_description" placeholder="Meta Description"  >{{($setting  != null ? $setting->meta_description: old('meta_description') ) }}</textarea>
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('brief_site') ? 'has-error' : '' }}">
                        <label for="brief_site" class="col-md-1 control-label">Brief Site</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                 <textarea name="brief_site" rows="7" class="form-control" id="brief_site" placeholder="Brief Site">{{( $setting  != null ? $setting->brief_site: old('brief_site') ) }}</textarea>
                                 <span class="text-danger">{{ $errors->first('brief_site') }}</span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group {{ $errors->has('logo_main') ? 'has-error' : '' }}">
                        <label class="control-label col-md-1">Logo Upload #1</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                       @if(!empty($setting->logo))
                                        <img src="{{url('/')}}/uploads/logo/{{$setting->logo}}" alt="" title="">
                                       @endif
                                </div>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> Select Logo </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="logo_main"> 

                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                                 <span class="text-danger">{{ $errors->first('logo_main') }}</span>
                            </div>
                           
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('name_site') ? 'has-error' : '' }}">
                        <label class="control-label col-md-1">Favicon Upload #1</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                 @if(!empty($setting->fav))
                                    <img src="{{ explode(".",$setting->fav)[0] == 'http://lorempixel'? $setting->fav : url('/')/'uploads/fav'/$setting->fav }}" alt="" title="">
                                  @endif
                                </div>
                                
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> Select Favicon </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="fav_main"> 
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                                <span class="text-danger">{{ $errors->first('fav_main') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn green">Update</button>
                        </div>
                    </div>
             {!! Form::close()  !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
</div>
</div>	

@endsection
