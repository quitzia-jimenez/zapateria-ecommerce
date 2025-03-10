@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Agregar categoria</h5>
            <div class="card">
                <div class="card-body">
                  <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nombre de Categoria</label>
                      <input id="name" name="name" type="text" placeholder="Nombre de categoria" class="form-control"  tabindex="0" value="{{old('name')}}"  aria-required="true" required=""> 
                    </div>
                    @error('name') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                      <label for="slug" class="form-label">Descripcion</label>
                      <input class="form-control" type="text" placeholder="Slug categoria" name="slug" tabindex="0" value="{{old('slug')}}"  aria-required="true" required="">
                    </div>
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="image"></label>
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

    function StringToslug(Text){
        return Text.toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-');
    }

</script>
    
@endpush