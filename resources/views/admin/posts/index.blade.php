@extends('admin.plantilla.dashboard')
@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h1>Listado de todos los post</h1>
    </div>
    <div class="col-md-6">
        <a href="/post/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear nuevo post</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tabla de ejemplo
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Creado por</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Foto</th>
                        <th>Herramientas</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No. </th>
                        <th>Creado por</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Foto</th>
                        <th>Herramientas</th>
                    </tr>
                </tfoot>
                <tbody>
                    @isset($posts)
                        
                    
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post['id']}}</td>
                            <td>{{$post->user['email']}}</td>
                            <td>{{$post['titulo']}}</td>
                            <td>{{ getShorterString($post['descripcion'], 100)}}</td>
                            <td>{{$post['fecha']}}</td>
                            <td><img src="{{asset('/storage/images/posts_images/'.$post['foto'])}}" alt="{{$post['foto']}}" width="100"></td>
                            <td align="center">
                                <a href="/post/{{$post['id']}}/edit"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$post['id']}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">¿Esta seguro que desea eliminar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                @if(isset($post['id']))
                    <form action="/post/{{$post['id']}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="post_id" name="post_id" value="">
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('js_post_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var post_id = button.data('postid'); 

            console.log(post_id);
            
            var modal = $(this)
            modal.find('.modal-footer #post_id').val(post_id);
            //modal.find('form').attr('action','/posts/' + post_id);
        })
    </script>
@endsection