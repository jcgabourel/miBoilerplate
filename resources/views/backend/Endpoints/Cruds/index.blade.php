@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
 

 
    <x-backend.card>
        <x-slot name="header">
        {{$data['name']}}
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.'.strtolower($data['name']).'Create')"
                    text="crear {{$data['name']}}"
                />
            </x-slot>
        @endif

        

        <x-slot name="body">
            <x-backend.crudTableComponent  modelo="{{$data['modelo']}}"/>
        </x-slot>
    </x-backend.card>

     
@endsection
