@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Editar categoria</h5>
            <div class="card">
                <div class="card-body">
                  <form action="{{route('admin.coupon.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$coupon->id}}">
                    <div class="mb-3">
                      <label for="code" class="form-label">Codigo de Cupon</label>
                      <input id="code" name="code" type="text" placeholder="Nombre de categoria" class="form-control"  tabindex="0" value="{{$coupon->code}}"  aria-required="true" required=""> 
                    </div>
                    @error('name') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <label for="name" class="form-label">Tipo de cupon</label>
                    <div class="select flex-grow">
                        <select class="form-select" name="type">
                            <option value="">Select</option>
                            <option value="fixed" {{$coupon->type=='fixed'?'selected':''}}>Fijo</option>
                            <option value="percent" {{$coupon->type=='fixed'?'selected':''}}>Porcentaje</option>
                        </select>
                    </div>
                    @error('type') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                      <label for="value" class="form-label">Valor</label>
                      <input id="value" class="form-control" type="text" placeholder="value categoria" name="value" tabindex="0" value="{{$coupon->value}}"  aria-required="true" required="">
                    </div>
                    @error('value') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="cart_value" class="form-label">Valor de carrito</label>
                        <input id="cart_value" class="form-control" type="text" placeholder="cart_value categoria" name="cart_value" tabindex="0" value="{{$coupon->cart_value}}"  aria-required="true" required="">
                      </div>
                      @error('cart_value') <span class="text-danger">{{ $message }}</span> @enderror
                      
                      <div class="mb-3">
                        <label for="expiry_date" class="form-label">Fecha de expiracion</label>
                        <input id="expiry_date" class="form-label" type="date" placeholder="expiry_date categoria" name="expiry_date" tabindex="0" value="{{$coupon->expiry_date}}"  aria-required="true" required="">
                      </div>
                      @error('expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
  

                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                </div>
              </div>

        </div>
    </div>
</div>
    
@endsection

@push('scripts')


    
@endpush