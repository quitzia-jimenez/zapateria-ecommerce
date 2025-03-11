@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Editar categoria</h5>
            <div class="card">
                <div class="card-body">
                  <form action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="mb-3">
                      <label for="name" class="form-label">Nombre de Categoria</label>
                      <input id="name" name="name" type="text" placeholder="Nombre de categoria" class="form-control"  tabindex="0" value="{{$category->name}}"  aria-required="true" required=""> 
                    </div>
                    @error('name') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                      <label for="slug" class="form-label">Descripcion</label>
                      <input id="slug" class="form-control" type="text" placeholder="Slug categoria" name="slug" tabindex="0" value="{{$category->slug}}"  aria-required="true" required="">
                    </div>
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        @if($category->image)
                        <div class="item" id="imgpreview">
                            <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="#" class="effect8">
                        </div>

                        @endif
                        <div id="upload-file">
                            <label for="myFile">
                                <span>
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </span>
                                <span class="form-label">Arrastra tus archivos aqui o selecciona <span>Click en el browse</span></span>
                                <input class="form-control" type="file" name="image" id="myFile" accept="image/*">

                            </label>
                        </div>
                    </div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                </div>
              </div>

        </div>
    </div>
</div>
    
@endsection

@push('scripts')

<script>
    $(function(){
        $('#myFile').on('change', function(e){
            const photoInp = $('#myFile');
            const [file] = this.files;
            if(file){
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });

        $("input[name='name']").on('change', function(){
            $("input[name='slug']").val(StringToSlug($(this).val()));
        });
    });

    function StringToSlug(Text)
    {
        return Text.toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
    }

</script>
    
@endpush