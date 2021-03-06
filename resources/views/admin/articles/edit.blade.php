@extends('admin.layout')
@section("title")
Edit Article
@endsection
@section("content")

<div class="row">
   <div class="col-md-12">
        <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-text-o font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Edit Article</span>
                    </div>
                </div>

                <!-- BEGIN FORM-->
                {!!  Form::model($update,['method'=>'PATCH','action'=>['Admin\Articles\ArticleController@update',$update->id],'novalidate'=>'novalidate','files'=>'true']) !!}
          
                      <div class="{{$errors->has('en_title')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                             {{ Form::text('en_title',$update->translation('en')->first()->title,['class'=>'form-control','id'=>'form_control_1']) }}
                            <label for="form_control_1">Article Title English</label>
                        <small class="text-danger">{{ $errors->first('en_title') }}</small>
                        </div>
                      </div>

                      <div class="{{$errors->has('ar_title')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                             {{ Form::text('ar_title',$update->translation('ar')->first()->title,['class'=>'form-control','id'=>'form_control_1']) }}
                            <label for="form_control_1">Article Title Arabic</label>
                        <small class="text-danger">{{ $errors->first('ar_title') }}</small>
                        </div>
                      </div>

                      <div class="{{$errors->has('categorie_id')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                           <label for="form_control_1">Categorys</label>
                           <select class="form-control" name="categorie_id" >
                               <option  value="" >Select Category</option>
                                @if($categorys->count() > 0)
                                 @foreach($categorys as $category)
                                       <option  {{($category->id == $update->categorie_id)?'selected':''}} value="{{$category->id}}" >{{$category->translation('en')->first()->name}}</option>
                                 @endforeach
                                @endif
                           </select>
                           <small class="text-danger">{{ $errors->first('categorie_id') }}</small>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="multiple" class="control-label">Tags</label>
                        <select id="multiple" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" name="tags[]">
                            <optgroup label="All Tags">
                                @if($tags->count() > 0)
                                     @foreach($tags as $tag)
                                        <option  {{(in_array($tag->id,$tagsArticle))?'selected':''}} value="{{$tag->id}}" >{{$tag->translation('en')->first()->name}}</option>
                                     @endforeach
                                  @endif
                            </optgroup>
                       </select>
                     </div>

                      <div class="{{$errors->has('en_description')?'has-error':''}}" >
                          <div class="form-group form-md-line-input form-md-floating-label">
                              {{ Form::textarea('en_description',$update->translation('en')->first()->description,['class'=>'form-control','id'=>'editor_en']) }}
                              <script>
                              // extraPlugins needs to be set too.
                               CKEDITOR.replace('editor_en' );
                              </script>
                              <label for="form_control_1">Description English</label>
                          <small class="text-danger">{{ $errors->first('en_description') }}</small>
                          </div>
                      </div>



                       <div class="{{$errors->has('ar_description')?'has-error':''}}" >
                          <div class="form-group form-md-line-input form-md-floating-label">
                              {{ Form::textarea('ar_description',$update->translation('ar')->first()->description,['class'=>'form-control','id'=>'editor_ar']) }}
                              <script>
                              // extraPlugins needs to be set too.
                               CKEDITOR.replace('editor_ar' );
                              </script>
                              <label for="form_control_1">Description Arabic</label>
                          <small class="text-danger">{{ $errors->first('ar_description') }}</small>
                          </div>
                      </div>

                      @php
                        $explodeImg =  explode(".",$update->image);
                        $pathImg =  '/uploads/articles/'.$update->image;
                      @endphp

                   
                      @if($update->count() != 0 && $update->image != '')
                        <div class="col-md-12" >
                          <div class="box box-success">
                            <div class="box-body text-center">
                             <img style="max-width: 80%; border:1px solid #cecece" src="{{ $explodeImg[0] == 'http://lorempixel' ? $update->image : $pathImg }}">
                            </div>
                          </div>
                        </div>
                      @endif


                      <div class="form-group form-md-line-input has-info {{$errors->has('img')?'has-error':''}}">
                          {!! Form::file('img',['class'=>'form-control']) !!}
                          <label for="form_control_1">Image</label>
                           <span class="help-block">Image</span>
                          <small class="text-danger">{{ $errors->first('img') }}</small>
                      </div>

                      <div style="margin-bottom: 20px" class="text-center">
                          <div class="row">
                              <div class="col-md-12">
                                  <button  class="btn default">Edit Article</button>
                              </div>
                          </div>
                      </div>

                {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection
