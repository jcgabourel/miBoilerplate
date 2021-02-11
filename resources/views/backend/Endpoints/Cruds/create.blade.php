@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


<x-forms.post :action="route('admin.'.strtolower($data['name']).'Store')">
        <x-backend.card>
            <x-slot name="header">
                 'Create Role' 
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.'.strtolower($data['name']).'Index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">

                 
                @foreach ((new  $data['modelo'])->getFillable() as $field)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">{{strtoupper($field)}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="{{$field}}" id="{{$field}}">
                        </div>
                    </div><!--form-group-->

                @endforeach
                
                
               
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Role')</button>
            </x-slot>
            
        </x-backend.card>
    </x-forms.post>

     
@endsection
