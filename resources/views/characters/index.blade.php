@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Characters</div>
    
                    <div class="panel-body">
                        Your Characters:
                        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Create new character</button>
                        <!-- Table-to-load-the-data Part -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody id="characters-list" name="characters-list">
                                @foreach ($characters as $character)
                                <tr id="character{{$character->id}}">
                                    <td>{{$character->id}}</td>
                                    <td>{{$character->name}}</td>
                                    <td>{{$character->created_at}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$character->id}}">Edit</button>
                                        <button class="btn btn-danger btn-xs btn-delete delete-character" value="{{$character->id}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End of Table-to-load-the-data Part -->
                        <!-- Modal (Pop up when detail button clicked) -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Character Editor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="frmCharacter" name="frmCharacters" class="form-horizontal" novalidate="">
            
                                            <div class="form-group">
                                                <label for="inputCharacter" class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="name" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCharacter" class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control has-error" id="description" name="description" placeholder="description" value="">
                                                </div>
                                            </div>
                                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                                        <input type="hidden" id="character_id" name="character_id" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                             
                
                
            </div>
        </div>
    </div>
@endsection
@section("meta")
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection