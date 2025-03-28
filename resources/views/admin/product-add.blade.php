@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Agregar producto</h5>
            <div class="card">
                <div class="card-body">
                  <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del producto</label>
                        <input id="name" name="name" type="text" placeholder="Nombre del producto" class="form-control"  tabindex="0" value="{{old('name')}}"  aria-required="true" required=""> 
                        <div class="text-tiny">No excedas los 100 caracteres</div>
                    </div>
                    @error('name') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input id="slug" class="form-control" type="text" placeholder="Slug del producto" name="slug" tabindex="0" value="{{old('slug')}}"  aria-required="true" required="">
                    </div>
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select class="form-select" name="category_id">
                            <option selected>Selecciona una categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Descripción corta</label>
                    <input id="short_description" class="form-control" type="text" placeholder="Ingresa una breve descripción" name="short_description" tabindex="0" value="{{old('short_description')}}"  aria-required="true" required="">
                    </div>
                    @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror

                    
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <input id="description" class="form-control" type="text" placeholder="Ingresa una descripción" name="description" tabindex="0" value="{{old('description')}}"  aria-required="true" required="">
                    </div>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label class="form-label" for="image">Carga imagen</label>
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

                    <div class="mb-3">
                        <label class="form-label" for="image">Carga imagenes</label>
                        <div id="galUpload" class="item up-load">
                            <label for="gFile" class="uploadfile">
                                <span>
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </span>
                                <span class="form-label">Arrastra tus archivos aqui o selecciona <span>Click en el browse</span></span>
                                <input class="form-control" type="file" name="images[]" id="gFile" accept="image/*" multiple="">

                            </label>
                        </div>
                    </div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="regular_price" class="form-label">Precio regular</label>
                        <input id="regular_price" class="form-control" type="text" placeholder="Ingresa el precio regular" name="regular_price" tabindex="0" value="{{old('regular_price')}}"  aria-required="true" required="">
                    </div>
                    @error('regular_price') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="sale_price" class="form-label">Precio de descuento</label>
                        <input id="sale_price" class="form-control" type="text" placeholder="Ingresa el precio de descuento" name="sale_price" tabindex="0" value="{{old('sale_price')}}"  aria-required="true" required="">
                    </div>
                    @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="SKU" class="form-label">SKU</label>
                        <input id="SKU" class="form-control" type="text" placeholder="Ingresa el SKU" name="SKU" tabindex="0" value="{{old('SKU')}}"  aria-required="true" required="">
                    </div>
                    @error('SKU') <span class="text-danger">{{ $message }}</span> @enderror


                    <div class="form-group">
                        <label for="sizes">Tallas</label>
                        <div>
                            @foreach($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sizes[]" id="size_{{ $size->id }}" value="{{ $size->id }}" onchange="toggleQuantityInput({{ $size->id }})">
                                    <label class="form-check-label" for="size_{{ $size->id }}">{{ $size->size }}</label>
                                    <input type="number" name="quantities[{{ $size->id }}]" id="quantity_{{ $size->id }}" class="form-control" placeholder="Cantidad" style="display: none; margin-top: 10px;" min="0">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('sizes') <span class="text-danger">{{ $message }}</span> @enderror
                    
                    

                    <button type="submit" class="btn btn-primary">Guardar</button>

                                
                  </form>
                </div>

                <div class="card-body">

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

        $('#gFile').on('change', function(e){
            const photoInp = $('#gFile');
            const gphotos = this.files;
            $.each(gphotos,function(key,val){
                $("#galUpload").prepend('<div class="item gitems"><img src="${URL.createObjectURL(val)}"/></div>');
            })
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

    function toggleQuantityInput(sizeId) {
    var checkbox = document.getElementById('size_' + sizeId);
    var quantityInput = document.getElementById('quantity_' + sizeId);
    if (checkbox.checked) {
        quantityInput.style.display = 'block';
    } else {
        quantityInput.style.display = 'none';
        quantityInput.value = ''; // Clear the quantity input when the checkbox is unchecked
    }
}
</script>

    
@endpush