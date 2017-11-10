

<div style="margin-left:220px;" class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 85%;" >

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fermer</span></button>

         @if(isset($user))

            <h4 class="modal-title" id="myModalLabel">{{$user->name}}</h4>

         @else

            <h4 class="modal-title" id="smallModalHead">Ajouter un Utilisateur</h4>

         @endif

      </div>

     <div class="modal-body">

               @if(isset($user))

                    {!! Form::model($user, array('class' => 'form-horizontal','route' => array('register', $user->id), 'method' => 'PUT')); !!}

                @else

                    {!! Form::open(array('url' => 'user','class' => 'form-horizontal')) !!}

                @endif

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                             {!! Form::label('Name', Lang::get('Nom') . ' *', array('class' => 'col-md-3 control-label text-left' ))!!}
                            <div class="col-md-9">
                                 {!! Form::text('name', null, array('class' => 'form-control', 'maxlength' => '65', 'required')) !!}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>

