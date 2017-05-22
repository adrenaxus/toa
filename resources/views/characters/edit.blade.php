@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $character->name }}{{ $character->id }}</div>
    
                    <div class="panel-body">
                        You have the following items in your inventory:
                        
                        <ul class="inventory">
                        @foreach($character->items as $item)
                                <li id="">
                                    <img class="inventory icon" src="/toa/public/images/icons/png/{{ $item->icon }}">
                                    <span class="item_name">{{ $item->name }}</span>
                                    <button type="button" class="btn btn-primary remove-item" id="btn-save" value="add"><span class="glyphicon glyphicon-remove"></span></button>
                                </li>
                        @endforeach
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
