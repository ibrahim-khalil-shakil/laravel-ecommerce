@extends('Backend.Layouts.app')
@section('title', 'Permissions')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Permissions</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card px-3 pb-3">
                            <h4>{{$role->type}}</h4>
                            @php
                            $routes=array();
                            $auto_accept=array('GET',"DELETE");
                            $permissions=array();
                            foreach($permission as $perm){
                            $permissions[$perm->name]=$perm->name;
                            }
                            @endphp
                            @foreach(Illuminate\Support\Facades\Route::getRoutes() as $v)
                            @if($v->getPrefix()=="/admin")
                            @php
                            $rl=explode('.',$v->getName());
                            if(isset($rl[1]))
                            $routes[$rl[0]][]=array("method"=>$v->methods[0],"function"=>$rl[1]);
                            @endphp
                            @endif
                            @endforeach
                            <form action="{{route('permission.save',encryptor('encrypt',$role->id))}}" method="post">
                                @csrf
                                <div class="row p-2">
                                    @forelse($routes as $k=>$r)
                                    <div class="col-6 col-sm-3 col-md-2">
                                        <input type="checkbox" onchange="checkAll(this)"> {{__($k)}}
                                        @if($r)
                                        <ul class="list-group">
                                            @foreach($r as $name)
                                            @if(in_array($name['method'],$auto_accept))
                                            <li class="list-group-item">
                                                @if(in_array($k.'.'.$name['function'],$permissions))
                                                <input type="checkbox" checked name="permission[]"
                                                    value="{{$k.'.'.$name['function']}}">
                                                {{__($name['function'])}}
                                                @else
                                                <input type="checkbox" name="permission[]"
                                                    value="{{$k.'.'.$name['function']}}">
                                                {{__($name['function'])}}
                                                @endif
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                    @empty

                                    @endforelse
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary"> Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>
    .list-group-collapse li>ul li:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .list-group-collapse li>ul {
        margin-left: 16px;
        margin-right: 16px;
        margin-bottom: 11px;
    }
</style>
@endpush
@push('scripts')
<!-- bs-custom-file-input -->
<script src="{{ asset('public/Backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('public/Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- Page specific script -->
<script>
    function checkAll(e){
        if($(e).prop('checked')==true)
            $(e).next('.list-group').find('input').attr('checked','checked');
        else
            $(e).next('.list-group').find('input').removeAttr('checked','checked');
    }

</script>
@endpush